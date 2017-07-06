/* ----------------- Start Document ----------------- */
(function ($) {
	"use strict";

	$(document).ready(function () {

		$('form.tooltips input[type="text"],form.tooltips input[type="password"],form.tooltips input[type="email"],form.tooltips textarea').tooltipster({
			trigger: 'custom', // default is 'hover' which is no good here
			onlyOne: false, // allow multiple tips to be open at a time
			position: 'right', // display the tips to the right of the element
			content: 'Revise este campo',
			contentCloning: false
		});

		//seleccion de form de registro
		$(".mi-cuenta input[type=radio]").click(function () {

			var $this = $(this);
			var $formCo = $(".mi-cuenta .register-container form.company");
			var $formCa = $(".mi-cuenta .register-container form.candidate");

			if ($this.val() === "candidate") {
				$formCo.fadeOut(150, function () {
					$formCa.fadeIn(150);
				});

			} else {
				$formCa.fadeOut(150, function () {
					$formCo.fadeIn(150);
				});
			}
		});

		// bind submit handler to form
		$('form.ajax-submit').on('submit', function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();

			var $form = $(this),
				$container = $form.find("div.form-container"),
				$messages_container = $form.find("div.form-messages").html("").removeClass("success error"),
				$message_delay = ($form.attr("message-delay"))?$form.attr('message-delay'):3000;

			$form.find('.tooltipstered').tooltipster('hide');
			
			$('.notification').hide();

			var token = $form.find($("#token")).val();

			$container.block({message: null});

			// submit the form
			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'POST',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					$messages_container.addClass(response.status);
					$messages_container.html(response.message).slideDown().delay($message_delay).slideUp(1000, function () {						
						$container.unblock();
						if (response.status === "success") {
							$form[0].reset();
							if (response.redirect === undefined || !response.redirect === "") {								
								window.location.replace("/"); 
							}
						}
					});

				},
				error: function (response) {
					var msg;
					$messages_container.addClass("error");
					$container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
							$form.find(':input[name="' + key + '"]').tooltipster('content', value);
							$form.find(':input[name="' + key + '"]').tooltipster('show');
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente"
					}

					$messages_container.html(msg).slideDown().delay(5000).slideUp();

				}
			});

		});

		$("div.form-candidate-resume a.save-candidate").click(function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();

			var resume_html = $('textarea[name=resume_content]').sceditor('instance').val();

			var $form = $(this).parents('form'),
				container = $(this).parents('div.form-candidate-resume'),
				messages_container = $("#form-messages").html("").removeClass("success error");

			$form.find('.tooltipstered').tooltipster('hide');

			container.block({message: null});

			$form[0]["resume_content"].value = resume_html;

			var token = $form.find($("#token")).val();

			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'POST',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					messages_container.addClass(response.status);
					messages_container.html(response.message).slideDown().delay(3000).slideUp(1000, function () {
						if (response.status === "success") {
							$form[0].reset();
							container.unblock();
							window.location.replace("/resume");
						}
					});
				},
				error: function (response) {

					var msg;
					messages_container.addClass("error");
					container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
							$form.find(':input[name="' + key + '"]').tooltipster('content', value);
							$form.find(':input[name="' + key + '"]').tooltipster('show');
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente";
					}

					messages_container.html(msg).slideDown().delay(5000).slideUp();
				}
			});

		});

		$("div.form-company-job a.save-job").click(function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();

			var $form = $(this).parents('form'),
				container = $(this).parents('div.form-company-job'),
				messages_container = $("#form-messages").html("").removeClass("success error");				

			$form.find('.tooltipstered').tooltipster('hide');

			container.block({message: null});
			
			var description_html = $('textarea[name=description]').sceditor('instance').val();
			if( $('textarea[name=profile_detail]').length ) {
				var profile_detail_html = $('textarea[name=profile_detail]').sceditor('instance').val();
				$form[0]["profile_detail"].value = profile_detail_html;
			}			

			$form[0]["description"].value = description_html;

			var token = $form.find($("#token")).val();

			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'POST',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					messages_container.addClass(response.status);
					messages_container.html(response.message).slideDown().delay(3000).slideUp(1000, function () {
						if (response.status === "success") {
							$form[0].reset();
							container.unblock();
							window.location.replace("/jobs/manage");
						}
					});
				},
				error: function (response) {

					var msg;
					messages_container.addClass("error");
					container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
							$form.find(':input[name="' + key + '"]').tooltipster('content', value);
							$form.find(':input[name="' + key + '"]').tooltipster('show');
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente";
					}

					messages_container.html(msg).slideDown().delay(5000).slideUp();
				}
			});

		});

		$("div.form-company-edit a.save").click(function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();

			var profile_detail_html = $('textarea[name=profile_detail]').sceditor('instance').val();

			var $form = $(this).parents('form'),
				$container = $form.find("div.form-container"),
				$messages_container = $form.find("div.form-messages").html("").removeClass("success error");


			$form.find('.tooltipstered').tooltipster('hide');

			$container.block({message: null});

			$form[0]["profile_detail"].value = profile_detail_html;

			var token = $form.find($("#token")).val();

			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'POST',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					$messages_container.addClass(response.status);
					$messages_container.html(response.message).slideDown().delay(3000).slideUp(1000, function () {
						if (response.status === "success") {
							$form[0].reset();
							$container.unblock();
							window.location.replace("/company/profile");
						}
					});
				},
				error: function (response) {

					var msg;
					$messages_container.addClass("error");
					$container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
							$form.find(':input[name="' + key + '"]').tooltipster('content', value);
							$form.find(':input[name="' + key + '"]').tooltipster('show');
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente";
					}

					$messages_container.html(msg).slideDown().delay(5000).slideUp();
				}
			});

		});
		
		$("form.search-jobsd").on('submit', function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();
			
			var $form = $(this),
				$container = $form.find("div.form-container"),
				$messages_container = $form.find("div.form-messages").html("").removeClass("success error");

			$form.find('.tooltipstered').tooltipster('hide');

			var token = $form.find($("#token")).val();

			$container.block({message: null});

			// submit the form
			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'GET',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					//$messages_container.addClass(response.status);
					console.log(response.data);
					$('#jobs-list').empty().append($(response.data));
					/*$messages_container.html(response.message).slideDown().delay(3000).slideUp(1000, function () {						
						$container.unblock();
						if (response.status === "success") {
							$form[0].reset();
							console.log(response.data);
						}
					});*/

				},
				error: function (response) {
					var msg;
					$messages_container.addClass("error");
					$container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
							$form.find(':input[name="' + key + '"]').tooltipster('content', value);
							$form.find(':input[name="' + key + '"]').tooltipster('show');
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente"
					}

					$messages_container.html(msg).slideDown().delay(5000).slideUp();

				}
			});
			
		});

		// ------------------ End Document ------------------ //
	});

	$(function () {
		$("input.candidate-photo:file").change(function () {
			var file = $(this).val();
			var fileName = file.slice(12, file.length);
			$("span.candidate-photo").html(fileName);
		});
	});

	$(function () {
		$("input.candidate-resume:file").change(function () {
			var file = $(this).val();
			var fileName = file.slice(12, file.length);
			$("span.candidate-resume").html(fileName);
		});
	});

	$(function () {
		$("input.company-logo:file").change(function () {
			var file = $(this).val();
			var fileName = file.slice(12, file.length);
			$("span.company-logo").html(fileName);
		});
	});

	$(function () {
		$("input.candidate-application-resume:file").change(function () {
			var file = $(this).val();
			var fileName = file.slice(12, file.length);
			$("span.candidate-application-resume").html(fileName);
		});
	});

	$(".date").each(function (index) {
		// You can get and set dates with moment objects
		var picker = new Pikaday(
				{
					field: $(this)[0],
					firstDay: 1,
					minDate: new Date(2000, 0, 1),
					maxDate: new Date(2020, 12, 31),
					yearRange: [2000, 2020],
					format: "DD/MM/YYYY",
					i18n: {
						previousMonth: 'Anterior Mes',
						nextMonth: 'Siguiente Mes',
						months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
						weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
						weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']
					}
				});
	});

	$(function () {
		$("#applicationStatusFilter").change(function () {
			
			var $cbo = $(this),
				$form = $cbo.parents("form");
			
			$form.submit();
			
		});
	});

})(this.jQuery);

