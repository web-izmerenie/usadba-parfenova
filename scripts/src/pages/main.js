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

	var $backgrounds = $mainPage.find('.card .background, .card_1');

	var resizeCardsBindSuffix = '.main_page_resize_cards';

	$window.on('resize' + resizeCardsBindSuffix, function () {
		$backgrounds.css('height', $window.height() + 'px');
	}).trigger('resize' + resizeCardsBindSuffix);

	// scroll down on .card_1 button {{{1

		$card1ScrlDn.click(function () {

			$page.animate({
				scrollTop: $card1.height() + 'px'
			}, getVal('animationSpeed')*6);

			return false;

		});

	// scroll down on .card_1 button }}}1

	setTimeout(function () { // .card_1 sroll down jitter {{{1

		var speed = getVal('animationSpeed');
		var bottom = parseInt($card1ScrlDn.css('bottom'), 10);

		setInterval(function () {

			$card1ScrlDn.stop().animate({
				'bottom': (bottom - getVal('card1ScrollDownJitterValue')) + 'px'
			}, speed, function () {
				$card1ScrlDn.stop().animate({
					'bottom': (bottom + getVal('card1ScrollDownJitterValue')) + 'px'
				}, speed*2, function () {
					$card1ScrlDn.stop().animate({ 'bottom': bottom + 'px' }, speed);
				});
			});

		}, getVal('card1ScrollDownJitterInterval') * 1000);

	}, 1); // .card_1 sroll down jitter }}}1

}); // domReady()
}); // define()
