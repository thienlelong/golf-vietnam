(function () {

	//jQuery for page scrolling feature - requires jQuery Easing plugin
	jQuery(function() {
		jQuery('.navbar-nav li a').bind('click', function(event) {
			var jQueryanchor = jQuery(this);
			jQuery('html, body').stop().animate({
				scrollTop: jQuery(jQueryanchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
		jQuery('.page-scroll a').bind('click', function(event) {
			var jQueryanchor = jQuery(this);
			jQuery('html, body').stop().animate({
				scrollTop: jQuery(jQueryanchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
	});

})(jQuery);
