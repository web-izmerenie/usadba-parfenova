/**
 * Navigation section (like "homestead" or "activities") width background resize module
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val'], function ($, getVal) {

	var bindSuffix = '.resize_columns';

	var $topSide;
	var $head;
	var headerH;
	var footerH;

	return function exports() {

		var $columnsBlock = $(this);
		var colM = parseInt($columnsBlock.css('margin-bottom'), 10);

		$(function domReady() {
			if (!$topSide) $topSide = $('.top_side');
			if (!$head) $head = $topSide.find('.head');
			if (!headerH) headerH = $('header').height();
			if (!footerH) footerH = $('footer').height();

			var headH = $head.innerHeight();

			function resizeColumns() {
				$columnsBlock.css('height', '');

				var colH = $columnsBlock.innerHeight();
				var wsH = $topSide.height() - headerH - footerH; // workspace height

				if (headH + colH + colM < wsH) {
					$columnsBlock.css('height', (wsH - headH - colM) + 'px');
				}
			} // resizeColumns()

			$(window).on('resize' + bindSuffix, resizeColumns);
			setTimeout(resizeColumns, 1);

		}); // domReady();

	}; // return exports()

}); // define()
