/**
 * Main module
 *
 * @author Viacheslav Lotsmanov
 */

define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {

	var $html = $('html');

	require.config({

		baseUrl: getVal('tplPath') + '/scripts',

		paths: {
			'threejs': 'libs_not_build/three-r67.min.amd'
		},

		map: {
			'*': {

				/* short name aliases */

				// outsource modules
				'jquery.cookie': 'libs/jquery.cookie-1.4.0',
				'jquery.mousewheel': 'libs/jquery.mousewheel-3.1.11',
				'modernizr': 'libs/modernizr-2.7.2.amd',
				'sphere_panorama': 'libs/sphere_panorama',

				// basics aliases
				'get_local_text': 'basics/get_local_text',
				'get_val': 'basics/get_val',
				'load_img': 'basics/load_img',
				'grayscale_img': 'basics/grayscale_img',
				'json_answer': 'basics/json_answer',
				'dialog_box': 'basics/dialog_box',
				'dynamic_api': 'basics/dynamic_api',

			}
		}
	}); // require.config()

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

	if ($('form.add_question').size() > 0) {
		require(['ask_a_question']);
	}

	if ($('section.contacts').size() > 0) {
		require(['pages/contacts']);
	}

	if ($html.hasClass('nature_page') && $('section.nature').size() > 0) {
		require(['pages/nature']);
	}

}); // domReady()
}); // define()
