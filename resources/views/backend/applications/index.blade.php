@extends('layouts.backend')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('content')
<main class="container-fluid mt--8">
  <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#">Запросы</a></li>
              </ol>
          </nav>
      </div>
  </div>
  <!-- Table -->
  <div class="row">
      <div class="col">
          <div class="card">
              <!-- Card header -->
              <div class="card-header">
                  <h3 class="mb-0 h2">ЗАПРОСЫ</h3>
              </div>
              <div class="table-responsive py-4">
                  <table class="table table-flush" id="datatable" style="width: 100%">
                      <thead class="thead-light">
                          <tr>
                              <th>ID</th>
                              <th>Имя</th>
                              <th>Номер телефона</th>
                              <th>ID Квартиры</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</main>

  <!-- Modal -->
  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog apartment-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Сообщение</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label form-control-label">Имя</label>
                                <input class="form-control" type="text" id="name" name="name">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="col-form-label form-control-label">Номер телефона</label>
                                <input class="form-control" type="text" id="phone" name="phone">
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="col-form-label form-control-label">Сообщение</label>
                                <textarea name="message" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
  </div>

  @include('partials.remove')
@endsection

@section('script')
<script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/crud.js')}}"></script>  
<script>
  var crud = new Crud({
    filter: true,
    list: {
      url: "{{route('backend.applications.data')}}",
      datatable: {            
        columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'phone', name: 'phone'},
          {data: 'apartment_id', name: 'apartment_id'}
        ],
        columnDefs: [                    
            {
                targets: 4,
                data: null,
                searchable:false, 
                render: function (row, type, val, meta) {                        
                    return '<div class="d-flex justify-content-end align-items-center">'
                         + crud.makeButton(val, (val.seen ? 'btn-outline-default' : 'btn-outline-dark') + ' ' + 'read-btn ajax-read', (val.seen ? 'прочитано' : 'не прочитано')
                        )+ crud.makeButton(val, 'btn-default btn-edit btn-view', '<i class="fa fa-eye"></i>', [
                            ['toggle', 'modal'],
                            ['target', '#viewModal']
                        ]) + crud.makeButton(val, 'btn-danger', '<i class="fa fa-trash"></i>', [
                            ['toggle', 'modal'],
                            ['target', '#removeModal']
                        ]) + '</div>';
                }                        
            }
        ]
      }
    },

    remove: {
      url: "{{ route('backend.applications.delete') }}",
    }
  })
//   $('body').on('click', '.btn-view', function(e) {
//         e.preventDefault();
//         var data = crud.datatable.row($(this).closest('tr')).data();     
//         $('.js-description').html(data.message)
//         $("#showModal").modal('show');
//     })

    $(document).on('click', '.ajax-read', function(){
        var data = crud.datatable.row($(this).closest('tr')).data(),
            _ = $(this);
        $.ajax({
            url : "{{route('backend.applications.read')}}",
            type: "POST",
            data: data,
            success: function(data){
                if(data.data.app.seen == 1){
                    _.removeClass('btn-outline-dark').addClass('btn-outline-default');
                    _.html('прочитано');
                    // _.css('width', '136px');
                } else{
                    _.addClass('btn-outline-dark').removeClass('btn-outline-default');
                    _.html('не прочитано');
                    // $('.ajax-read').css('width', '136px');
                }
            }
            
        })
    })
</script>
@endsection