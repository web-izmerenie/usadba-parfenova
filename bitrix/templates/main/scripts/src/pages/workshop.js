/**
 * "Workshop" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['get_val', 'jquery'], function (getVal, $) {
$(function domReady() {

	// values
	// ...

	var $html = $('html');
	var $wrap = $('section.workshop');

	if (!$html.hasClass('workshop_page') || $wrap.size() <= 0) return;

	$wrap.each(function () { // {{{1

		var $wrap = $(this);

		// ...

	}); // $wrap.each(... }}}1

}); // domReady()
}); // define()
