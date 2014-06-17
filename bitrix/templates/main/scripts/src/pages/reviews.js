/**
 * "reviews" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['get_val', 'jquery'], function (getVal, $) {
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

			$label.find('input, textarea').focus(focus).blur(blur).trigger('blur');

		}); // $.each()
		// placeholders }}}2

		$s.find('.write_a_review').on('click', function () {
			require(['popup'], function (popup) {
				popup.show({ $container: $form });
			});
			return false;
		});

	}); // $section.each()

}); // domReady()
}); // define()
