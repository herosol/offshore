var optsuccess = {
	closeButton: true,
	debug: false,
	positionClass: "toast-bottom-right",
	onclick: null,
	showDuration: "300",
	hideDuration: "5000",
	timeOut: "5000",
	extendedTimeOut: "1000",
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "slideDown",
	hideMethod: "slideUp",
};

var opterror = {
	closeButton: true,
	debug: false,
	positionClass: "toast-bottom-right",
	onclick: null,
	showDuration: "300",
	hideDuration: "5000",
	timeOut: "5000",
	extendedTimeOut: "1000",
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "slideDown",
	hideMethod: "slideUp",
};
/*_____ Upload File _____*/
$(document).on("change", "#country", function () {
	let country_id = $(this).val();
	$.ajax({
		url: base_url + "Ajax/get_states/" + country_id,
		dataType: "JSON",
		method: "GET",
		success: function (rs) {
			if (rs != "") {
				$("#state").html(rs);
			}
		},
		error: function (rs) {
			console.log(rs);
		},
		complete: function (rs) {
			console.log(rs);
		},
	});
});
$(document).on("click", ".popBtn[data-store]", function () {
	var vcode = $(this).data("store");
	console.log(vcode);
	var type = $(this).data("video_type");
	if (type != "") {
		if (type == "vimeo") {
			$("#vidBlk").html(
				'<iframe src="https://player.vimeo.com/video/' +
					vcode +
					'" allow="autoplay;" frameborder="0" wmode="Opaque"></iframe>'
			);
		} else {
			$("#vidBlk").html(
				'<iframe src="https://www.youtube.com/embed/' +
					vcode +
					'?autoplay=1&loop=1&rel=0&wmode=transparent&modestbranding=1" allow="autoplay;" frameborder="0" wmode="Opaque"></iframe>'
			);
		}
	} else {
		$("#vidBlk").html(
			'<iframe src="https://www.youtube.com/embed/' +
				vcode +
				'?autoplay=1&loop=1&rel=0&wmode=transparent&modestbranding=1" allow="autoplay;" frameborder="0" wmode="Opaque"></iframe>'
		);
	}
});
$(document).on("keyup", "#query", function (e) {
	e.preventDefault();
	let query = $(this).val();
	// console.log(query.length);
	if (query != "" && query.length > 4) {
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: base_url + "ajax/searchResults",
			data: { query: query, page_name: page_name },
			error: function (rs) {
				console.log(rs);
			},
			success: function (data) {
				// console.log(data);
				$("#search_results").addClass("active");
				$("#search_results").html(data);
			},
		});
	} else {
		$("#search_results").removeClass("active");
		$("#search_results").html("");
	}
});

$(document).ready(function () {
	$(window).on("load", function () {
		// Remove the # from the hash, as different browsers may or may not include it
		var hash = location.hash.replace("#", "");
		// console.log(hash);
		if (hash != "") {
			// Clear the hash in the URL
			// location.hash = '';   // delete front "//" if you want to change the address bar
			$(".faq_lst > .faq_blk").removeClass("active");
			$("#" + hash).addClass("active");
			$("html, body").animate(
				{ scrollTop: $("#" + hash).offset().top - 100 },
				1000
			);
		}
	});
});
$(document).ready(function () {
	if (typeof recaptcha !== "undefined" && recaptcha) {
		var frmAjax = "";
		$(document).on("click", '.frmAjax button[type="submit"]', function (e) {
			e.preventDefault();
			frmAjax = $(this).parents(".frmAjax");

			if (frmAjax.valid()) {
				if ($("#g-recaptcha-response").val()) {
					frmAjax.submit();
				} else grecaptcha.execute();
			}
		});
		onSubmit = function (token) {
			frmAjax.submit();
		};
	} else {
		$(document).on("click", '.frmAjax button[type="submit"]', function (e) {
			let frm = $(this).parents(".frmAjax");
			$(frm).validate({
				errorPlacement: function () {
					return false; // suppresses error message text
				},
			});
		});
	}

	$(document).on("submit", ".frmAjax", function (e) {
		e.preventDefault();
		needToConfirm = true;
		var frmbtn = $(this).find("button.webBtn");
		var frmIcon = frmbtn.find("i");
		frmIcon.removeClass("hidden");
		frmbtn.attr("disabled", true);
		// console.log(frmIcon); return;
		var frmMsg = $(this).find("div.alertMsg:first");
		var frm = this;

		frmMsg.hide();

		$.ajax({
			url: $(this).attr("action"),
			data: new FormData(frm),
			processData: false,
			contentType: false,
			dataType: "JSON",
			method: "POST",

			error: function (rs) {
				console.log(rs);
			},
			success: function (rs) {
				// console.log(rs); return;
				if (rs.session_login === 1) {
					localStorage.setItem("session_arr", rs.session_arr);
				}
				if (rs.status == 1) {
					if (rs.formSuccess == 1) {
						frm.reset();
						$(".popup").fadeOut();
						$("body").removeClass("flow");
						// $(this).parents('.popup').find('form').attr('action', '');
						setTimeout(function () {
							location.reload();
						}, 1000);
					}
					toastr.success(rs.msg, "", optsuccess);
					setTimeout(function () {
						frm.reset();
						frmIcon.addClass("hidden");
						if (rs.redirect_url) {
							window.location.href = rs.redirect_url;
						} else {
							frmbtn.attr("disabled", false);
						}
					}, 3000);
				} else {
					toastr.error(rs.msg, opterror);
					setTimeout(function () {
						if (rs.hide_msg) frmMsg.slideUp(500);
						frmbtn.attr("disabled", false);
						frmIcon.addClass("hidden");
						if (rs.redirect_url) window.location.href = rs.redirect_url;
					}, 3000);
				}
			},
			complete: function (rs) {
				needToConfirm = false;
			},
		});
	});
	$(document).on("submit", ".frmSearch", function (e) {
		e.preventDefault();
		needToConfirm = true;
		$("#sort_vehicles").html('<div id="loading" style="" ></div>');
		var frmbtn = $(this).find("button.site_btn");
		// console.log(frmbtn);
		var frmIcon = frmbtn.find("i");
		frmIcon.removeClass("hidden");
		frmbtn.attr("disabled", true);
		// console.log(frmIcon); return;
		var frmMsg = $(this).find("div.alertMsg:first");
		var frm = this;

		frmMsg.hide();

		$.ajax({
			url: $(this).attr("action"),
			data: new FormData(frm),
			processData: false,
			contentType: false,
			dataType: "JSON",
			method: "POST",

			error: function (rs) {
				console.log(rs);
			},
			success: function (rs) {
				console.log(rs);
				frmIcon.addClass("hidden");
				frmbtn.attr("disabled", false);
				$("#sort_vehicles").html(rs);
			},
			complete: function (rs) {
				needToConfirm = false;
			},
		});
	});
});

$(document).ready(function () {
	// Detect pagination click
	$("#pagination").on("click", "a", function (e) {
		e.preventDefault();
		var pageno = $(this).attr("data-ci-pagination-page");

		loadPagination(pageno);
	});

	loadPagination(0);

	// Load pagination
	function loadPagination(pagno) {
		$("#newsSec").html(
			'<div class="appLoad"><div class="appLoader"><span class="spiner"></span></div></div>'
		);
		$.ajax({
			url: base_url + "/page/loadRecord/" + pagno,
			type: "get",
			dataType: "json",
			success: function (response) {
				$("#pagination").html(response.pagination);
				$("#newsSec").html(response.result);
				if (
					$("#pagination a[data-ci-pagination-page = " + pagno + "]").length > 0
				) {
					$("#pagination a").removeClass("active");
					$("#pagination a[data-ci-pagination-page = " + pagno + "]").addClass(
						"active"
					);
				}
			},
		});
	}
});
