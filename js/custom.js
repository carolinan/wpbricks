var $ = jQuery;

jQuery(document).ready(function($) {
	TopMenuSticky();

	if (! jQuery('.widget-area').length) {
		jQuery('.site-content').addClass('site-content-without-sidebar');
	}

	/* site header */
	$(document).on('click', '.menu-toggle', function() {
		jQuery('.site-header .main-navigation>div').slideToggle();
	});

	if ( $(window).width() < 767 ) {
		jQuery( '.site-header .nav-menu .menu-item-has-children' ).prepend( '<button class=\'menu-btn\' aria-expanded="false"></button>' );
	}

	$(document).on('click', '.menu-btn', function() {
		jQuery(this).toggleClass('open').siblings('.sub-menu').slideToggle();

		if (jQuery(this).hasClass('open') ) {
			jQuery(this).attr('aria-expanded', 'true');
		} else {
			jQuery(this).attr('aria-expanded', 'false');
		}
		
	});
	
	responsiveMenu();
	
	headerTransparent();

});

 /* site header */
function TopMenuSticky() {
	'use strict';
	var headerHeight;
	headerHeight = jQuery('.site-header .site-header-inner').outerHeight();
	if ($('#page').hasClass('sticky-header')) {
		if (jQuery('#page').hasClass('transparent-header')) {
			jQuery('#page').css('padding-top', '0');
		} else {
			jQuery('#page').css('padding-top', headerHeight);
		}
	}
}

jQuery(window).scroll(function(){
	TopMenuSticky();
	headerTransparent();
});

jQuery(window).resize(function(){
	responsiveMenu();
});

function responsiveMenu(){
	if (767 < $(window).width()){
		$('.site-header .main-navigation>div').removeAttr('style');
		$('.site-header .nav-menu li ul.sub-menu').removeAttr('style');
		$('.site-header .nav-menu li .menu-btn').removeClass('open');
	} else {
		if ($('.menu-toggle').hasClass('toggled-on')) {
			$('.site-header .main-navigation>div').css('display', 'block');
		}
	}
}

/* site header */
function headerTransparent() {
	'use strict';
	var scrollTop;
	scrollTop = $(window).scrollTop();
	if ($('#page').hasClass('sticky-header')) {
		if (10 < scrollTop) {
			$('#page').addClass('header-scroll');
		} else {
			$('#page').removeClass('header-scroll');
			setInterval(function(){
				TopMenuSticky();
			}, 100);
		}
	}
}
