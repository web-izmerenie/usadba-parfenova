/**
 * "activities" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['get_val', 'jquery'], function (getVal, $) {
$(function domReady() {

	var $html = $('html');

	if (!$html.hasClass('activities_page')) return;

	$('.section_wrap .columns').each(function () { // {{{1

		var $columnsBlock = $(this);

		(function isolate() { // set background {{{2

			var bg = $columnsBlock.attr('data-background');
			if (!bg) return;

			$columnsBlock.css('background-image', 'url("'+ bg +'")');
			require(['navigation_section_blur'], function (handler) {
				$columnsBlock.each(handler);
			});

		})(); // set background }}}2

		// resize height
		require(['navigation_section_resize'], function (navigationSectionResize) {
			$columnsBlock.each(navigationSectionResize);
		});

	}); // .columns $.each() }}}1

}); // domReady()
}); // define()
