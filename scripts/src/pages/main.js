/**
 * "Main" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val'], function ($, getVal) {
$(function domReady() {

	var $mainPage = $('section.main_page');
	var $topArea = $mainPage.find('.top_area');
	var $topAreaScrlDn = $topArea.find('.scroll_down');
	var $window = $(window);
	var $page = $('html,body');

	var resizeAreasBindSuffix = '.main_page_resize_areas';

	// resizing areas {{{1

		function resizeAreas() {

			var wndHeight = $window.height();

			$topArea.css('height', wndHeight + 'px');

		} // resizeAreas()

		$window.on('resize' + resizeAreasBindSuffix, resizeAreas);
		resizeAreas();

	// resizing areas }}}1

	// scroll down on top area button {{{1

		$topAreaScrlDn.click(function () {

			$page.animate({
				scrollTop: $topArea.height() + 'px'
			}, getVal('animationSpeed')*6);

			return false;

		});

	// scroll down on top area button }}}1

}); // domReady()
}); // define()
