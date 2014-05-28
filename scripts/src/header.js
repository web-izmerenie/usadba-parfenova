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

	var separatorBindSuffix = '.header_separator_percent_width';
	var scrollBindSuffix = '.header_fixed_scroll';

	var sepMinWidth = parseInt($mainMenuSep.css('min-width'), 10);
	var sepMaxWidth = parseInt($mainMenuSep.css('max-width'), 10);
	var sepDenominator = sepMaxWidth - sepMinWidth;
	var firstLineMaxWidth = 842;
	var firstLineMinWidth = 762;
	var firstLineDenominator = firstLineMaxWidth - firstLineMinWidth;

	$(window).on('resize' + separatorBindSuffix, function () { // separator percent width {{{1

		$mainMenuSep.css('width', ''); // reset before get width of menu

		var numerator = $firstLine.width() - firstLineMinWidth;
		var percent = numerator * 100 / firstLineDenominator;

		$mainMenuSep.css('width', ( (percent * sepDenominator / 100) + sepMinWidth ) + 'px');

	}).trigger('resize' + separatorBindSuffix); // separator percent width }}}1

	$(window).on('scroll' + scrollBindSuffix, function () { // scroll for fixed position {{{1

		$header.css('left', (-$document.scrollLeft()) + 'px');

	}).trigger('scroll' + scrollBindSuffix); // scroll for fixed position }}}1

}); // domReady()
}); // define()
