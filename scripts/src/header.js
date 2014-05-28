/**
 * Header behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['get_val', 'jquery'], function (getVal, $) {
$(function domReady() {

	var $header = $('header');
	var $document = $(document);
	var $firstLine = $header.find('.first_line');
	var $mainMenu = $header.find('.main_menu');
	var $mainMenuSep = $header.find('.separator');
	var $subMenu = $header.find('.sub_menu');
	var $subMenuItems = $subMenu.find('a, span');

	// skip first element (because no margin-left for first element)
	$subMenuItems = $subMenuItems.get();
	$subMenuItems.shift();
	$subMenuItems = $( $subMenuItems );

	var separatorBindSuffix = '.header_separator_percent_width';
	var scrollBindSuffix = '.header_fixed_scroll';

	var sepMinWidth = parseInt($mainMenuSep.css('min-width'), 10);
	var sepMaxWidth = parseInt($mainMenuSep.css('max-width'), 10);
	var sepDenominator = sepMaxWidth - sepMinWidth;
	var firstLineMaxWidth = 842;
	var firstLineMinWidth = 762;
	var firstLineDenominator = firstLineMaxWidth - firstLineMinWidth;
	var subMenuMin = parseInt($subMenuItems.css('margin-left'), 10);
	var subMenuMax = 22;
	var subMenuDenominator = subMenuMax - subMenuMin;

	$(window).on('resize' + separatorBindSuffix, function () { // dynamic separator width {{{1

		// reset before get width
		$mainMenuSep.css('width', '');
		$subMenuItems.css('margin-left', '');

		var firstLineWidth = $firstLine.width();

		var numerator = firstLineWidth - firstLineMinWidth;
		var percent = numerator * 100 / firstLineDenominator;

		$mainMenuSep.css('width', ( (percent * sepDenominator / 100) + sepMinWidth ) + 'px');
		$subMenuItems.css('margin-left', ( (percent * subMenuDenominator / 100) + subMenuMin ) + 'px');

	}).trigger('resize' + separatorBindSuffix); // dynamic separator width }}}1

	$(window).on('scroll' + scrollBindSuffix, function () { // scroll for fixed position {{{1

		$header.css('left', (-$document.scrollLeft()) + 'px');

	}).trigger('scroll' + scrollBindSuffix); // scroll for fixed position }}}1

}); // domReady()
}); // define()
