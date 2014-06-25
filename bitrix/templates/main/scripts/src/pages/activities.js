/**
 * "activities" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['get_val', 'jquery'], function (getVal, $) {
$(function domReady() {

	var $html = $('html');

	if (!$html.hasClass('activities_page')) return;

	$('.section_wrap .columns').each(function () {

		var $columnsBlock = $(this);

		var bg = $columnsBlock.attr('data-background');
		if (!bg) return;
		$columnsBlock.css('background-image', 'url("'+ bg +'")');

		// resize height
		require(['navigation_section_resize'], function (navigationSectionResize) {
			$columnsBlock.each(navigationSectionResize);
		});

	});

}); // domReady()
}); // define()
