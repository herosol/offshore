/*_____ Toggle _____*/
$(document).on("click", ".toggle", function () {
	$(".toggle").toggleClass("active");
	$("body").toggleClass("flow");
	$("nav").toggleClass("active");
	$(".upperlay").toggleClass("active");
	$("nav > ul > li > .sub").slideUp();
});
w = $(window).width();
if (w <= 991) {
	$(document).on("click", "nav > ul > li.drop > a", function (e) {
		e.preventDefault();
		$(".sub").not($(this).parent().children(".sub").slideToggle()).slideUp();
	});
}
$(window).on("resize", function () {
	$("nav > ul > li > .sub").removeAttr("style");
});

let offset = 0;
$(function () {
	// header fix
	offSet = $("body").offset().top;
	offSet = offSet + 5;
	$(window).scroll(function () {
		scrollPos = $(window).scrollTop();
		if (scrollPos >= offSet) {
			$("header").addClass("fix");
		} else {
			$("header").removeClass("fix");
		}
	});
});

// map-carousel
$(".map-carousel").owlCarousel({
	autoplay: true,
	nav: false,
	navText: [
		'<i class="fa-solid fa-circle-chevron-left"></i>',
		'<i class="fa-solid fa-circle-chevron-right"></i>',
	],
	// navText: [ 'prev', 'next' ],
	dots: true,
	loop: true,
	autoWidth: false,
	autoHeight: true,
	smartSpeed: 1000,
	autoplayTimeout: 10000,
	margin: 20,
	autoplayHoverPause: true,
	responsive: {
		0: {
			items: 1,
			autoplay: true,
			autoHeight: true,
			dots: true,
			nav: false,
		},
		600: {
			items: 1,
		},
		991: {
			items: 2,
		},
		1000: {
			items: 2,
		},
	},
});

// popup

$(document).on("click", ".popBtn", function () {
	var popUp = $(this).data("popup");
	var link = $(this).data("link");
	$("#videoContainer").attr("src", "");
	$("#videoContainer").attr("src", link);
	$("body").addClass("flow");
	$(".popup[data-popup= " + popUp + "]").fadeIn();
});

$(document).on("click", ".crosBtn", function () {
	$("#videoContainer").attr("src", "");
	$(".popup").fadeOut();
	$("body").removeClass("flow");
});
