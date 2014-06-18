/**
 * Main module
 *
 * @author Viacheslav Lotsmanov
 */

define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {

	var $html = $('html');

	require.config({
		map: {
			'*': {

				/* short name aliases */

				// outsource modules
				'jquery.cookie': 'libs/jquery.cookie-1.4.0',

				// basics aliases
				'get_local_text': 'basics/get_local_text',
				'get_val': 'basics/get_val',
				'load_img': 'basics/load_img',
				'grayscale_img': 'basics/grayscale_img',
				'json_answer': 'basics/json_answer',
				'dialog_box': 'basics/dialog_box',

			}
		}
	});

	require(['header']);

	if ($html.hasClass('main_page')) {
		require(['pages/main']);
	}

	if ($html.hasClass('homestead_page') && $('section.homestead').size() > 0) {
		require(['pages/homestead']);
	}

	if ($html.hasClass('homestead_subpage')) {
		require(['pages/homestead_subpage']);
	}

	if ($html.hasClass('activities_page')) {
		require(['pages/activities']);
	}

	if ($html.hasClass('activities_subpage')) {
		require(['pages/activities_subpage']);
	}

	if ($('section.reviews').size() > 0) {
		require(['pages/reviews']);
	}

}); // domReady()
}); // define()
