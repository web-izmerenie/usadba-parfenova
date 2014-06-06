/**
 * "homestead" sub-page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val'], function ($, getVal) {
$(function domReady() {

	var $quantity = $('html.homestead_subpage main .prices .quantity');

	function fill() {
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
	} // fill()

	$(window).load(function () { setTimeout(fill, 1); });
	setTimeout(fill, 1);

}); // domReady()
}); // define()
