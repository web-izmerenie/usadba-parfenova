/**
 * Main module
 *
 * @author Viacheslav Lotsmanov
 */

define(['basics/get_val', 'jquery'], function (getVal, $) {
$(function domReady() {

	require.config({
		map: {
			'*': {

				/* short name aliases */

				// outsource modules
				'jquery.cookie': 'libs/jquery.cookie-1.4.0',

				// basics aliases
				'get_local_text': 'basics/get_local_text',
				'get_val': 'basics/get_val',

			}
		}
	});

	require(['header']);

	if ($('html').hasClass('main_page')) {
		require(['pages/main']);
	}

	if ($('html').hasClass('homestead_page') && $('section.homestead').size() > 0) {
		require(['pages/homestead']);
	}

}); // domReady()
}); // define()
