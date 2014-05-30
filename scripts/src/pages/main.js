/**
 * "Main" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val', 'jquery.easing'], function ($, getVal) {
$(function domReady() {

	var $mainPage = $('section.main_page');
	var $card1 = $mainPage.find('.card.card_1');
	var $card1LogoWrap = $card1.find('.logo_wrap');
	var $card1ScrlDn = $card1.find('.scroll_down');
	var $window = $(window);
	var $document = $(document);
	var $page = $('html,body');

	var $backgrounds = $mainPage.find('.card .background, .card_1');

	var resizeCardsBindSuffix = '.main_page_resize_cards';
	var paralaxBindSuffix = '.main_page_paralax';

	var scrollDownSpeed = getVal('animationSpeed') * 6;

	// paralax {{{1

	$mainPage.css('overflow', 'hidden');
	$card1LogoWrap.css('position', 'relative');
	$backgrounds.css('position', 'relative');

	var scrollDownLeft = parseInt($card1ScrlDn.css('margin-left'), 10);

	var pv = getVal('mainPageParalax'); // paralax value

	function paralaxUpdate() {
		$backgrounds.each(function () {

			var $bg = $(this);
			var lo = $bg.offset().top;
			var st = $document.scrollTop();
			var wh = $window.height();

			if (startPoint < lo || startPoint > hi) return;

			var wwh = ((lo < wh) ? (wh - (wh - lo)) : wh);
			var startPoint = st + wwh;
			var w = $mainPage.width();
			var h = $bg.height();
			var hi = lo + h + wwh;
			var numerator = startPoint - lo;
			var denominator = hi - lo;

			var pvl = w * pv / 100; // paralax value local

			if (wwh !== wh) {
				var den = wh + h;
				var num = den - (wh - wwh);
				pvl = pvl * (num * 100 / den) / 100;
			}

			$bg.css('padding-left', pvl + 'px');

			var v = pvl * (numerator * 100 / denominator) / 100;
			var isCard1 = $bg.hasClass('card_1');

			if (numerator <= 0) {
				v = 0;
			} else if (numerator >= denominator) {
				v = pvl;
			}

			$bg.css('left', (-v) + 'px');
			if ($bg.hasClass('card_1')) $card1LogoWrap.css('left', (-(pvl - v)) + 'px');

			if ($bg.hasClass('card_1')) {
				$card1ScrlDn.css('left', ( (w/2) + v ) + 'px');
			}

		});
	} // paralaxUpdate()

	$window.on('scroll' + paralaxBindSuffix, paralaxUpdate);
	$window.on('resize' + paralaxBindSuffix, function () {
		setTimeout(paralaxUpdate, 1);
	});
	setTimeout(paralaxUpdate, 1);

	// paralax }}}1

	$window.on('resize' + resizeCardsBindSuffix, function () {
		$backgrounds.css('height', $window.height() + 'px');
	}).trigger('resize' + resizeCardsBindSuffix);

	setTimeout(function () {

		var jitterTimer = null;
		var bottom = parseInt($card1ScrlDn.css('bottom'), 10);
		var speed = getVal('animationSpeed');
		var scrollDownBindSuffix = '.card_1_scroll_down';
		var curve = 'easeInOutSine';

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
			}, speed, curve, function () {
				$card1ScrlDn.stop().animate({
					'bottom': (bottom + getVal('card1ScrollDownJitterValue')) + 'px'
				}, speed*2, curve, function () {
					$card1ScrlDn.stop().animate({
						'bottom': bottom + 'px'
					}, speed, curve);
				});
			});

		}, getVal('card1ScrollDownJitterInterval') * 1000);

		// .card_1 sroll down jitter }}}1

		$card1ScrlDn.click(function () { // scroll down on .card_1 button {{{1

			clearInterval(jitterTimer);
			$card1ScrlDn.stop().animate({ 'bottom': bottom + 'px' }, speed);

			$page.animate({
				scrollTop: $card1.height() + 'px'
			}, {
				duration: scrollDownSpeed,
				easing: 'easeInOutQuad'
			});

			return false;

		}); // scroll down on .card_1 button }}}1

	}, 1);

}); // domReady()
}); // define()
