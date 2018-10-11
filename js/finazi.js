(function($){
	var pull=$('#topbar-toggle');
	var menu = $('.top_menu');
	$(pull).on('click',function(){
		menu.slideToggle();
	});
	$(window).resize(function(){
		var w = $(window).width();
		if (w>960 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
	var icon=$('.collapse-button ');
	var main_menu = $('#navbar');
	$(icon).on('click',function(){
		main_menu.slideToggle();
	})
	$(window).resize(function(){
		var w = $(window).width();
		if (w>960 && main_menu.is(':hidden')) {
			main_menu.removeAttr('style');
		}
	});
	 $(".scroll-to-top").on('click', function() {
        $('html, body').animate({
            scrollTop: $("html").offset().top
        }, 500);
    });
	$('.search-button-icon').on('click',function(){
		$('.form-search-header').addClass('x-code');
		$('.header_form_search').focus();
		$('.close-form-search').on('click',function(){
			$('.form-search-header').removeClass('x-code');

		})
	});


	jQuery('.quantity').each(function() {
		var spinner = jQuery(this),
		input = spinner.find('input[type="number"]'),
		btnUp = spinner.find('#inc-button'),
		btnDown = spinner.find('#dec-button'),
		min = input.attr('min'),
		max = input.attr('max');
		btnUp.click(function() {
			var oldValue = parseFloat(input.val());
			if (oldValue > max) {
				var newVal = oldValue;
			} else {
				var newVal = oldValue + 1;
			}
			var newVal = oldValue + 1;

			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});

		btnDown.click(function() {
			var oldValue = parseFloat(input.val());
			if (oldValue <= min) {
			  var newVal = oldValue;
			} else {
			  var newVal = oldValue - 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});

	});

	// 
	// slider gally product image
	$( '#primary' ).addClass('container');


	 $('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: true,
		centerMode: true,
		focusOnSelect: true
	});

})(jQuery);