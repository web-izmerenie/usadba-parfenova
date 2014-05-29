/**
 * "Main" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val'], function ($, getVal) {
$(function domReady() {

	var $mainPage = $('section.main_page');
	var $card1 = $mainPage.find('.card.card_1');
	var $card1ScrlDn = $card1.find('.scroll_down');
	var $window = $(window);
	var $page = $('html,body');

	var resizeCardsBindSuffix = '.main_page_resize_cards';

	// resizing cards {{{1

		function resizeCards() {

			var wndHeight = $window.height();

			$card1.css('height', wndHeight + 'px');

		} // resizeCards()

		$window.on('resize' + resizeCardsBindSuffix, resizeCards);
		resizeCards();

	// resizing cards }}}1

	// scroll down on .card_1 button {{{1

		$card1ScrlDn.click(function () {

			$page.animate({
				scrollTop: $card1.height() + 'px'
			}, getVal('animationSpeed')*6);

			return false;

		});

	// scroll down on .card_1 button }}}1

}); // domReady()
}); // define()
