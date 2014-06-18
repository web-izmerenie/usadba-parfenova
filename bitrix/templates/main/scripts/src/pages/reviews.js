/**
 * "reviews" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['get_val', 'jquery', 'get_local_text'], function (getVal, $, getLocalText) {
$(function domReady() {

	var $section = $('section.reviews');

	if ($section.size() <= 0) return;

	$section.each(function () {

		var $s = $(this);
		var $form = $s.find('form.add_review');

		$form.detach().prependTo('body');

		// placeholders {{{1
		var placeholdersBindSuffix = '.write_a_review_form_placeholders';
		$form.find('label.text, label.textarea').each(function () {

			var $label = $(this);
			var $placeholder = $label.find('>span');

			function blur() {
				if ($(this).val() === '') {
					$placeholder.stop().fadeIn(getVal('animationSpeed'));
				} else if ($(this).val() !== '') {
					$placeholder.stop().fadeOut(getVal('animationSpeed'));
				}
			}

			function focus() {
				if ($(this).attr('name') !== 'subject') {
					$placeholder.stop().fadeOut(getVal('animationSpeed'));
				}
			}

			$label.find('input, textarea')
				.on('focus' + placeholdersBindSuffix, focus)
				.on('blur' + placeholdersBindSuffix, blur)
				.trigger('blur' + placeholdersBindSuffix);

		}); // $.each()
		// placeholders }}}1

		// focus class {{{1
		var focusClassBindSuffix = '.write_a_review_form_placeholders';
		$form.find('label.text, label.textarea').each(function () {

			var $label = $(this);

			function blur() { $label.removeClass('focused'); }
			function focus() { $label.addClass('focused'); }

			$label.find('input, textarea')
				.on('focus' + focusClassBindSuffix, focus)
				.on('blur' + focusClassBindSuffix, blur);

		}); // $.each()
		// focus class }}}1

		// submit {{{1

		function ajaxReq(url, responseCallback, dataToSend, $form/*optional*/) { // {{{2

			if ($form) {
				if ($form.hasClass('ajax_process')) return false;
				$form.addClass('ajax_process');
			}

			function end() { if ($form) $form.removeClass('ajax_process'); }

			$.ajax({
				url: url,
				type: 'POST',
				cache: false,
				dataType: 'text',
				data: dataToSend,
				success: function (data) {
					require(['json_answer'], function (jsonAnswer) {
						jsonAnswer.validate(data, function (err, json) {
							if (err)
								responseCallback(err, null, end, jsonAnswer);
							else
								responseCallback(null, json, end, jsonAnswer);
						});
					});
				},
				error: function () {
					require(['dialog_box_wrapper'], function (showDialogBox) {
						showDialogBox({
							messages: [ getLocalText('err', 'forms', 'ajax_req') ],
							closeCallback: function () { end(); }
						});
					});
				}
			}); // $.ajax()

		} // ajaxReq() }}}2

		$form.submit(function () {

			var url = $form.attr('action');
			var dataArr = $form.serializeArray();
			var dataObj = {};

			$.each(dataArr, function (i, val) {
				dataObj[val.name] = val.value;
			});

			ajaxReq(url, function (err, json, end, jsonAnswer) {
				require(['dialog_box_wrapper'], function (showDialogBox) {

					if (err) {
						if (err instanceof jsonAnswer.exceptions.ErrorStatus) {
							if (
								!$.isPlainObject(err.json) || (
									// check for incorrect type of "error_code"
									$.type(err.json.error_code) !== 'undefined' &&
									$.type(err.json.error_code) !== 'string'
								) || (
									// if has "error_code" but no "fields_names" or incorrect type
									$.type(err.json.error_code) === 'string' &&
									(!$.isArray(err.json.fields_names) || err.json.fields_names.length <= 0)
								)
							) {
								// parse error message
								showDialogBox({
									messages: [ getLocalText('err', 'forms', 'unknown_parse') ],
									closeCallback: function () { end(); },
								});
								return;
							}

							if (
								$.type(err.json.error_code) !== 'string' || (
									// unknown "error_code"
									err.json.error_code !== 'required_fields' &&
									err.json.error_code !== 'incorrect_fields'
								)
							) {
								// unknown server error
								showDialogBox({
									messages: [ getLocalText('err', 'forms', 'unknown_server_error') ],
									closeCallback: function () { end(); },
								});
								return;
							}

							var bindSuffix = '.write_a_review_error_field';

							$.each(err.json.fields_names, function (i, fieldName) {
								var $f = $form.find('input[name="'+ fieldName +'"], textarea[name="'+ fieldName +'"]');
								$f.each(function () { $f.closest('label').addClass('error'); });
								$f.on('focus' + bindSuffix, function () {
									$(this).off('focus' + bindSuffix).closest('label').removeClass('error');
								});
							});

							switch (err.json.error_code) {
							case 'required_fields':
								end();
								break;
							case 'incorrect_fields':
								showDialogBox({
									messages: [ getLocalText('err', 'forms', 'incorrect_fields') ],
									closeCallback: function () { end(); },
								});
								break;
							} // switch
						} else {
							// parse error message
							showDialogBox({
								messages: [ getLocalText('err', 'forms', 'unknown_parse') ],
								closeCallback: function () { end(); },
							});
						}
						return;
					}

					// success!
					showDialogBox({
						messages: [
							getLocalText('forms', 'write_a_review_success_1'),
							getLocalText('forms', 'write_a_review_success_2'),
						],
						closeCallback: function () {
							$form.find('input, textarea').val('').trigger('blur' + placeholdersBindSuffix);
							end();
							$form.find('.closer').trigger('click');
						},
					}, null, true);

				}); // require(['dialog_box_wrapper'])
			}, $.extend({
				action: 'add_review',
				lang: getVal('lang'),
			}, dataObj), $form); // ajaxReq()

			return false;

		});

		// submit }}}1

		$s.find('.write_a_review').on('click', function () {
			require(['popup'], function (popup) {
				popup.show({ $container: $form });
			});
			return false;
		});

	}); // $section.each()

}); // domReady()
}); // define()
