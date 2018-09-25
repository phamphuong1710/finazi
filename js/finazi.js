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
})(jQuery);