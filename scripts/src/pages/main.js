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

	var scrollDownSpeed = getVal('animationSpeed') * 4;

	$window.on('resize' + resizeCardsBindSuffix, function () {
		$backgrounds.css('height', $window.height() + 'px');
	}).trigger('resize' + resizeCardsBindSuffix);

	setTimeout(function () {

		var jitterTimer = null;
		var bottom = parseInt($card1ScrlDn.css('bottom'), 10);
		var speed = getVal('animationSpeed');
		var scrollDownBindSuffix = '.card_1_scroll_down';

		// .card_1 sroll down jitter {{{1

		$card1ScrlDn
			.on('mouseenter' + scrollDownBindSuffix, function () {
				$card1ScrlDn.addClass('hover');
			}).on('mouseleave' + scrollDownBindSuffix, function () {
				$card1ScrlDn.removeClass('hover');
			});

		jitterTimer = setInterval(function () {

			if ($card1ScrlDn.hasClass('hover')) return;

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

		// .card_1 sroll down jitter }}}1

		$card1ScrlDn.click(function () { // scroll down on .card_1 button {{{1

			clearInterval(jitterTimer);
			$card1ScrlDn.stop().animate({ 'bottom': bottom + 'px' }, speed);

			$page.animate({
				scrollTop: $card1.height() + 'px'
			}, scrollDownSpeed);

			return false;

		}); // scroll down on .card_1 button }}}1

	}, 1);

}); // domReady()
}); // define()
