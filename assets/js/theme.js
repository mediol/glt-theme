document.addEventListener('DOMContentLoaded', function () {

	//===STEPS===
	$('.steps').slick({
		arrows: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		mobileFirst: true,
		dots: true,
		responsive: [
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 3,
					dots: false
				}
			}]
	});

	$('.testimonials-slider').slick({
		arrows: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		// autoplay: true,
		mobileFirst: true,
		dots: true,
		responsive: [
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			}]
	});

});

$('.easy-notification-bar__close').click( function() {
	$('header').css('top', '0')
})
