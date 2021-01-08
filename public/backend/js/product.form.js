var ProductForm = {
	f_container: $('.js-feature-container'),
	f_group_orders: $('.js-feature_group_orders')
};

ProductForm.initLang = function() {
	$('.js-lang-selector').on('change', function(e) {
        $('.js-lang').removeClass('active in');
        $('.js-lang-' +$(this).val()).addClass('active in');
    });
    
    $('.js-lang-' +$('.js-lang-selector :selected').val()).addClass('active in');
}

ProductForm.initList = function() {
	var _parent;

	$(".js-nested-list-item").on('click', function(e) {

		if (e.target.tagName.toLowerCase() == "a") {
			_parent = $(this).parent();
			_parent.toggleClass('nested-list__item--active');
			_parent.find('> ul').eq(0).animate({
	            height: 'toggle'
	        });
	        e.preventDefault();
	    }   
    });
}

/**
 * Initialize uploaded product images 
 */
ProductForm.initThumbnails = function() {
	var _this,
		type,
		element = $('.js-product-img'),
		remove = $('.js-product-remove'),
		elementText = '<span class="badge badge-success product-label">основной</span>',
		input = $('.js-main-image'),
		trash = [];

	/**
	 * Set main image for cover
	 * 
	 * @param int key
	 */
	function setMain(key) {
		$('.product-label').remove();
		element.parent().eq(key).append(elementText);
		input.val(key);
	}

	// /**
	//  * Reset all keys after delete
	//  */
	// function resetKeys() {
	// 	element = $('.js-product-img');
	// 	element.each(function(i, elem){
	// 		$(elem).parent().data('key', i);
	// 	});
	// }

	element.on('click', function(e) {
		_this = $(this).parent();
		setMain(_this.data('key'));
		e.preventDefault();
	});

	remove.on('click', function(e) {
		e.preventDefault();
		_this = $(this).parent();
        trash.push(_this.data('key'));
        $('.js-removed-images').val(trash.join(','));
        
        var _this = _this.hide();
    	// resetKeys();

   		if (_this.data('key') == input.val()) {
	    	input.val(0);
   		} 

	});

	setMain(0);
}

ProductForm.init = function(options) {
	this.o = options;	
	this.initLang();
	this.initList();
	this.initThumbnails();
}




        
