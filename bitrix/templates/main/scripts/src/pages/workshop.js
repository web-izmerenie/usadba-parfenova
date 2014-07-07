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
		var $panorama = $wrap.find('.panorama');
		var $detailPicture = $wrap.find('.detail_picture');

		require(['panorama_blocks'], function (handler) {
			handler($panorama, $detailPicture);
		});

	}); // $wrap.each(... }}}1

}); // domReady()
}); // define()
