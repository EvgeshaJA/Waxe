"use strict";

var myFullpage = new fullpage('#fullpage', {
	//Navigation
	menu: '#menu',
	lockAnchors: false,
	anchors:['firstPage', 'secondPage'],
	navigation: true,
	navigationPosition: 'right',
	fitToSection: true,
	fitToSectionDelay: 1000,
});

(function ($) {

	$(document).ready(function () {
		$('.main-navigation__form-link').click(function(){
			$('.navigation-form').toggleClass('active');
		});

	});

	const btnOk = document.querySelector('.btn__play');
	const wrapperVideo = document.getElementById('fon');
	btnOk.addEventListener('click',function(){
		wrapperVideo.play();
	});
	$(".btn__play").click(function(){
		$(this).hide();
	});
})(jQuery);