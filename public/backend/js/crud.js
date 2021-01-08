function Crud (options) {

    var _ = this, _btn;
    _.options = options;
    _.currentItem = null;
    _.datatable = null;
    _.progressBar = $('.js-progress-bar');
    _.editData = [];

    _.prepareDatatable = function() {
        var obj = {
            pageLength: _.options.list.datatable.pageLength || 10,
            order: _.options.list.datatable.order || [[0, 'desc']],
            processing: true,
            serverSide: true,
            responsive: true,
            stateSave : true,
            stateLoadParams: function (settings, data) {
                _.stateLoadParams(data);
            },
            ajax: {
                url: _.options.list.url,
                data: function ( d ) {
                    return $.extend( {}, d, _.options.list.data || {});
                }
            },
            columns: _.options.list.datatable.columns,
            columnDefs: _.options.list.datatable.columnDefs
        };

        var _lang = document.documentElement.lang;
        if (_lang != 'en') {
            obj.language = {
                'url': '/backend/plugins/datatables/lang/'+ _lang +'.json'
            };
        }
        
        if (_.options.list.datatable.rowCallback) {
            obj['rowCallback'] = _.options.list.datatable.rowCallback
        }

        if (_.options.list.datatable.rowsGroup) {
            obj['rowsGroup'] = _.options.list.datatable.rowsGroup
        }
        
        return obj;
    }

    /**
     * Init datatable Filter by their column index
     */
    _.initDatableFilter = function() {
        $("#datatable thead input, #datatable thead select").on('keyup change', function () {
            _.datatable
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    }

    /**
    * Make a button
    * 
    * @param  obj data
    * @param  string classes
    * @param  string inner  
    * @param  Array dataArr  
    *  
    * @return string
    */
    _.makeButton = function(data, classes, inner, dataArr) {
        var dataArr = typeof dataArr !== 'undefined' ?  dataArr : [],
            dataHtml = 'data-id="' + data.id + '"';

        $.each(dataArr, function(i, val) {
            if(Array.isArray(val)) {
                dataHtml += ' data-' + val[0] + '="' + val[1] + '"';
            }else {
                dataHtml += ' data-' + val + '="' + data[val] + '"';
            }
        });

        return '<button class="btn '+ classes + '"'
            + dataHtml
            + '>'
            + inner
            + '</button> ';
    }

    _.cleanError = function () {
        $('.text-danger').remove();
        $('.has-error').removeClass('has-error');
    }

    _.resetProgressBar = function () {
        _.progressBar
            .addClass('d-none')
            .find('.progress-bar')
            .css("width", "0%")
            .text("0%");
    }

    _.onClickAddBtn = function() {
        $('body').on('click', '.btn-add', function(e){
            var form = $('#form');
            form.find('input[type=text], input[type=number], input[type=email], input[type=hidden], input[type=password], textarea').not('.js-non-editable').val('');
            form.find('input[type=checkbox], input[type=radio]').prop('checked', false);
            form.find('input[type=file]').val('');
            form.find('select option').prop('selected', false).trigger("change");
            form.find('select').find('option:eq(0)').prop('selected', true);
            $('.js-form-image').remove();
            _.cleanError();
        });
    }

    _.onClickEditBtn = function() {
        var _type, _name, _element, _val;

        $('body').on('click', '.btn-edit', function(e) {
            _btn = $(this);
            // Data
            _.editData = _.datatable.row(_btn.closest("tr")).data();

            $('.js-form-image').remove();
            $('input[type=file]').val('');
            // Set Value
            $('#form').find(':input').each(function(i, elem) {

                _element = $(this);
                _type = this.type || this.tagName.toLowerCase();
                _name = _element.attr('name');

                // Skip to next iteration
                if (typeof _name == 'undefined') {
                    return true;
                }
         
                _val = _.editData[_name.replace(/\[\]/, '')];

                if ((_type == 'checkbox' || _type == 'radio')) {
                    if ($.isArray(_val)) {
                        if ($.inArray(isNaN(_element.val()) ? _element.val() : parseInt(_element.val()),
                            _val) == -1) {
                            _element.prop('checked', false);
                        } else {
                            _element.prop('checked', true);
                        }
                    } else {
                        if (_val == _element.val()) {
                            _element.prop('checked', true);
                        } else {
                            _element.prop('checked', false);
                        }
                    }
                } else if (_type == 'select-multiple') {
                    if (_element.next().is('.select2')) {
                        _element.val(_val).trigger("change");
                    } else {
                        _element.find('option').prop('selected', false);
                        $.each(_val, function(i, el){
                            _element.find('option[value='+ el.id +']').prop('selected', true);
                        });
                    }

                } else if (_type == 'file') {
                    
                    if(_val != null && _val != '') {
                        _element.parent().before('<div class="form-group js-form-image"><img src="'+ _val +'" alt="" style="width:200px;" class="img-thumbnail" /></div>');
                    }
                } else {
                    _val = $('<textarea />').html(_val).text();
                    _element.val(_val);
                }
            });
            _.cleanError();
        });
    }

    _.onClickFormBtn = function() {
        $('body').on('click', '.ajax-form', function (e) {
            e.preventDefault();
            _btn = $(this);
            _btn.prepend('<i class="fa fa-spinner fa-spin"></i> ');
            _btn.prop('disabled', true);
            _.progressBar.removeClass('d-none');

            var form_data = new FormData(document.getElementById('form'));
            $.ajax({
                url : _.options.form.url,
                type: "POST",
                data : form_data,
                contentType: false,
                cache: false,
                processData:false,
                xhr: function(){

                    // Upload Progress
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function(event) {
                            var percent = 0;
                            var position = event.loaded || event.position;
                            var total = event.total;
                        
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }

                            // Update progressbar
                            _.progressBar.find('.progress-bar').css("width", + percent +"%").text(percent +"%");
                        }, true);
                    }

                    return xhr;
                },
                mimeType:"multipart/form-data"

            }).done(function(response) {
                var res = JSON.parse(response);                
                if (res.status == 'error') {
                    _.cleanError();
                    $.each(res.errors, function(elem, item){
                        $.each(item, function(i, error) {
                            $('[name='+elem+']').after('<span class="text-danger">' + error + '</span>').parent().addClass('has-error');
                        });
                    });
                } else {
                    _.datatable.draw();
                    $('#formModal').modal('hide');
                    swal({
                        title: '<i class="fa fa-thumbs-up"></i>',
                        text: res.message,
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    })
                }

                // Reset
                _btn.prop('disabled', false);
                _btn.find('i').remove();
                _.resetProgressBar();

            }).fail(function(response) {
                if (response.status == 422) {
                    var res = JSON.parse(response.responseText);
                    _.cleanError();
                    $.each(res.errors, function(elem, item){
                        $.each(item, function(i, error) {
                            $('[name='+elem+']').after('<span class="text-danger">' + error + '</span>').parent().addClass('has-error');
                        });
                    });
                } else {
                    // Reset
                    $('#formModal').modal('hide');
                    _.cleanError();
                    alert('Ошибка!');
                }
                _btn.prop('disabled', false);
                _btn.find('i').remove();
                _.resetProgressBar();
            });
        });
    }

    _.onClickRemoveBtn = function() {
        $('body').on('click', '[data-target="#removeModal"]', function(e){
            $('#delete_id').val($(this).data('id'));
        });
    }

    _.onClickAjaxRemoveBtn = function() {
        $('body').on('click', '.ajax-remove', function (e) {
            e.preventDefault();
            _btn = $(this);
            _btn.prepend('<i class="fa fa-spinner fa-spin"></i> ');
            _btn.prop('disabled', true);
            $.ajax({
                type: "POST",
                url: _.options.remove.url,
                data: $('#delete_form').serialize(),
                async : true,
                success: function(response) {
                    if (response.status == 'success') {
                        _.datatable.draw();
                        swal({
                            title: '<i class="fa fa-thumbs-up"></i>',
                            text: response.message,
                            type: 'success',
                            confirmButtonColor: '#4fa7f3'
                        })
                    } else if (response.status == 'error') {
                        alert(response.message);
                    } else {
                        alert('Пожалуйста, обновите страницу');
                    }
                    _btn.prop('disabled', false);
                    _btn.find('i').remove();
                    $('#removeModal').modal('hide');
                }
            });
        });
    },

    /**
     * Get query string value by name
     * 
     * @param  string name
     * @param  string url
     * @return string
     */
    _.getParameterByName = function(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    /**
     * Go to current page
     * 
     * @return void
     */
    _.stateLoadParams = function(data) {
        $("#datatable thead input, #datatable thead select").each(function (i, item) {
            $(item).val(data.columns[$(this).parent().index()].search.search);
        });
    },

    /**
    * Intialize events
    * 
    * @return void
    */
    _.init = function() {
        _.onClickAddBtn();
        _.onClickFormBtn();
        _.onClickRemoveBtn();
        _.onClickAjaxRemoveBtn();
        _.onClickEditBtn();
        _.datatable = $("#datatable").DataTable(_.prepareDatatable());
        $(_.datatable.table().container()).removeClass('form-inline');
        if (_.options.filter) {
            _.initDatableFilter();
        }
    }

    _.init();

    return _;
}
