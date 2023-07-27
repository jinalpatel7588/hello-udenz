
$(function () {
	'use strict'

	$(".alert").fadeTo(3000, 500).slideUp(500, function () {
		$(".alert").slideUp(500);
	});

	$(".image-popup-no-margins").magnificPopup({
		type: "image",
		closeOnContentClick: !0,
		closeBtnInside: !1,
		fixedContentPos: !0,
		mainClass: "mfp-no-margins mfp-with-zoom",
		image: {
			verticalFit: !0
		},
		zoom: {
			enabled: !0,
			duration: 300
		}
	});

	$(document).ready(function() {
		// $(".select2").select2();

		$(".select2").select2({             
			placeholder: "Select Tags"               
	   });
	})

});