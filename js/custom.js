/*global jQuery:false */
jQuery(document).ready(function($) {
"use strict";

		$(".box").hover(
			function () {
			$(this).find('.icon').addClass("animated fadeInDown");
			$(this).find('p').addClass("animated fadeInUp");
			$(this).find('.w3-card-2').addClass("animated bounceInLeft");
			},
			function () {
			$(this).find('.icon').removeClass("animated fadeInDown");
			$(this).find('p').removeClass("animated fadeInUp");
			$(this).find('.w3-card-2').removeClass("animated bounceInLeft");
			}
		);
		
	

});
