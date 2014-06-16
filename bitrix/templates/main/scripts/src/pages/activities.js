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
		var bg = $(this).attr('data-background');
		if (!bg) return;
		$(this).css('background-image', 'url("'+ bg +'")');
	});

}); // domReady()
}); // define()
