/**
 * "homestead" sub-page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val', 'get_local_text'], function ($, getVal, getLocalText) {
$(function domReady() {

	if (!$('html').hasClass('homestead_subpage')) return;

	var $s = $('.section_wrap');
	var $main = $s.find('main');

	var $quantity = $main.find('.prices .quantity');
	var $activeRooms = $s.find('.sub_menu_line nav.rooms > span');
	var $panorama = $main.find('.panorama');

	function fill() { // {{{1
		$quantity.each(function () {

			var $q = $(this);
			var $f = $q.find('.fill');
			var $u = $q.find('.unit');

			var w = $q.width();
			var uw = $u.eq(0).width() + parseInt($u.eq(0).css('margin-right'), 10);
			var uall = uw * $u.size();
			var avalW = w - uall;

			$f.css('margin-left', '').text('');

			while ($f.width() < avalW) {
				$f.append('.');
			}

			$f.text( $f.text().slice(0, -1) );
			$f.css('margin-left', (avalW - $f.width()) + 'px');

		});
	} // fill() }}}1

	$(window).load(function () { setTimeout(fill, 1); });
	setTimeout(fill, 1);

	$activeRooms.each(function () { // {{{1

		var $room = $(this);
		var $img = $room.find('img');

		var src = $img.attr('src');

		function toGray() {
			require(['grayscale_img'], function (grayscaleImg) {
				grayscaleImg(src, function (err, dataURL) {
					if (err) {
						require(['load_img'], function (loadImg) {
							if (err instanceof loadImg.exceptions.Timeout) {
								// retry
								toGray();
							} else {
								alert(
									getLocalText('err', 'limited_functional') + '\n\n' +
									getLocalText('err', 'recommend_update_your_browser')
								);
							}
						});
						return;
					}

					$img.attr('src', dataURL);
				});
			});
		} // toGray()

		toGray();

	}); // $activeRooms.each() // }}}1

	// panorama block ratio resize {{{1
	(function isolate() {

		var bindSuffix = '.panorama_ratio_resize';
		var ratio = getVal('panoramaRatio');

		function handler() {
			$panorama.each(function () {
				$(this).css('height', ($(this).width() * ratio[1] / ratio[0]) + 'px');
			}); // $panorama.each()
		} // handler()

		$(window).on('resize' + bindSuffix, handler);
		setTimeout(handler, 1);

	})(); // isolate()
	// panorama block ratio resize }}}1

	setTimeout(function () { // panorama init {{{1
		$panorama.each(function () {
			var $p = $(this);
			require(['sphere_panorama'], function (Panorama) {
				new Panorama(
					$p,
					{
						textureUrl: $p.attr('data-texture'),
						onlyWebGL: true,
						minFov: 60,
					},
					function (err) {
						if (err) {
							require(['dialog_box_wrapper'], function (showDialogBox) {
								showDialogBox({ messages: [ getLocalText('err', 'panorama_init') ] });
							});
							return;
						}
						this.animationLoop();
						$p.addClass('loaded');
					}
				);
			});
		});
	}, 1); // panorama init }}}1

}); // domReady()
}); // define()
