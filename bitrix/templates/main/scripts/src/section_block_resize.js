/**
 * Section block resize handler
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val'], function ($, getVal) {

	var bindSuffix = '.resize_section_block';

	var $topSide;
	var $head;
	var $h1;
	var headerH;
	var footerH;

	return function exports(params) {

		params = $.extend({
			minusH1: false,
		}, (($.isPlainObject(params)) ? params : {}));

		var $sectionBlock = $(this);
		var marginB = parseInt($sectionBlock.css('margin-bottom'), 10);

		$(function domReady() {

			if (!$topSide) $topSide = $('.top_side');
			if (!$head) $head = $topSide.find('.head');
			if (!$h1) $h1 = $topSide.find('h1');
			if (!headerH) headerH = $('header').height();
			if (!footerH) footerH = $('footer').height();

			var headH = $head.innerHeight();

			function resizeColumns() {
				$sectionBlock.css('height', '');

				var colH = $sectionBlock.innerHeight();
				var wsH = $topSide.height() - footerH; // workspace height

				if (params.minusH1) {
					wsH -= $h1.innerHeight();
				} else {
					wsH -= headerH;
				}

				if (headH + colH + marginB < wsH) {
					$sectionBlock.css('height', (wsH - headH - marginB) + 'px');
				}
			} // resizeColumns()

			$(window).on('resize' + bindSuffix, resizeColumns);
			setTimeout(resizeColumns, 1);

		}); // domReady();

	}; // return exports()

}); // define()
