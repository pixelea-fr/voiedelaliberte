jQuery(document).ready(function($) {
	 jQuery('.single-item').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.single-text'
	});
	$('.single-text').slick({
	  arrows: false,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  asNavFor: '.single-item',
	  dots: true,
	  fade: true,
	  centerMode: true,
	  focusOnSelect: true
	});
});

jQuery(document).ready(function($) {
	 jQuery('.slider_menu').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  dots: true,
	  autoplay: true,
	  arrows: false,
	  fade: true,
	});
});