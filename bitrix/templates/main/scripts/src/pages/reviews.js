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

		$s.find('.write_a_review').on('click', function () {
			require(['popup'], function (popup) {
				popup.show({ $container: $form });
			});
			return false;
		});

	}); // $section.each()

}); // domReady()
}); // define()
