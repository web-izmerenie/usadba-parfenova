/**
 * "homestead" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val'], function ($, getVal) {
$(function domReady() {

	$('html.homestead_page section.homestead').each(function () {

		var $sect = $(this);

		function resizeRoomsNames() {
			$sect.find('nav.rooms a > span').each(function () {

				var $span = $(this);
				var $inside = $span.find('>span');
				var srcW = $inside.width();
				var p = parseInt($span.css('padding-left'), 10) + parseInt($span.css('padding-right'), 10);
				$span.css('width', (srcW + p) + 'px');

			});
		} // resizeRoomsNames()

		$(window).load(resizeRoomsNames);
		setTimeout(resizeRoomsNames, 1);

	});

}); // domReady()
}); // define()
