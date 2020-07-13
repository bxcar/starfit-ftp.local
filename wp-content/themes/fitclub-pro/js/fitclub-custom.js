/* global google, map_object */
jQuery(document).ready(function() {
	// search
	jQuery('.search-wrapper .search-icon').click(function() {
		jQuery('.search-wrapper .header-search-box').toggleClass('active');
	});

	jQuery('.search-wrapper .header-search-box .close').click(function() {
		jQuery('.search-wrapper .header-search-box').removeClass('active');
	});
	// manu
	jQuery('#site-navigation .menu-toggle').click(function() {
	  jQuery('#site-navigation .menu').slideToggle('slow');
	});

	jQuery('#site-navigation .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');

	jQuery('#site-navigation .sub-toggle').click(function() {
		jQuery(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
		jQuery(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
		jQuery(this).toggleClass('active');
	});

	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scrollup').fadeIn();
		} else {
			jQuery('.scrollup').fadeOut();
		}
	});

	jQuery('.scrollup').click(function() {
		jQuery('html, body').animate({
			scrollTop: 0
		}, 2000);
		return false;
	});

	//  Panel for FAQ Section
	jQuery('.content .panel').hide();
	jQuery('.content .flip').click(function () {
		jQuery(this).next('.panel').slideToggle('slow');
		jQuery(this).toggleClass('current');
		jQuery(this).siblings('.panel').removeClass('current');
	});

	if ( typeof jQuery.fn.bxSlider !== 'undefined' ) {
	   jQuery('#home-slider .bxslider').bxSlider({
			auto: false,
			mode: 'fade',
			caption: true,
			pagerCustom: '#bx-pager',
			controls: false,
			speed: 0,
			touchEnabled: false
		});

		jQuery('.widget_testimonial_block .bxslider').bxSlider({
			auto: false,
			pager: false,
			caption: true
		});

		jQuery('.blog-slider').bxSlider({
			minSlides: 1,
			maxSlides: 8,
			slideWidth: 380,
			slideMargin: 30,
			pager: false,
			nextText: '<i class="fa fa-angle-right"></i>',
			prevText: '<i class="fa fa-angle-left"></i>'
		});

		jQuery('.client-slider').bxSlider({
			auto: true,
			pager: true,
			controls: true,
			speed: 1000,
			pause: 5000,
			adaptiveHeight: true,
			minSlides: 3,
			maxSlides: 5,
			slideWidth: 220,
			slideMargin: 20
		});
	}

	if ( typeof jQuery.fn.counterUp !== 'undefined' ) {
		jQuery('.counter').counterUp({
            delay: 10,
            time: 1000
        });
	}

	// Google Map
	if (typeof google === 'object' && typeof google.maps === 'object') {
		google.maps.event.addDomListener(window, 'load', function() {
			var myCenter = new google.maps.LatLng(map_object.latitude, map_object.longitude);

			var map = new google.maps.Map(document.getElementById('googleMap'), {
				center: myCenter,
				zoom: 10,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var marker = new google.maps.Marker({
				position: myCenter
			});

			marker.setMap(map);
		});
	}
});
