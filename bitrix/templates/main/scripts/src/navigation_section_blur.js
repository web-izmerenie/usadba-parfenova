/**
 * Navigation section (like "homestead" or "activities") background in left side blur module
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val'], function ($, getVal) {

	var bindSuffix = '.resize_columns_blur';

	return function exports() {

		var $columnsBlock = $(this);

		var bg = $columnsBlock.attr('data-background');
		if (!bg) return;

		$(function domReady() {
			
			var $lBlock = $columnsBlock.find('.left_block');
			var $bgWrap = $('<div/>').addClass('blur_bg_wrap');
			var $bg = $('<div/>').addClass('blur_bg');
			var $img = $('<img/>');

			$bgWrap.html( $bg ).css('top', $lBlock.offset().top + 'px');

			$lBlock.prepend( $bgWrap );

			function blur() {
				require(['libs/jquery.blur'], function () {
					$img.on('load', function () {
						$img.css('background-image', 'url("'+ bg +'")');
						$bg.blurjs({
							source: $img,
							radius: 20,
							overlay: 'rgba(0, 0, 0, 0.5)',
						});
					}).attr('src', bg);
				}); // require(['libs/jquery.blur']...
			} // blur()

			blur();

			function resizeColumns() {
				$bgWrap.css({
					width: $lBlock.width() + 'px',
					height: $lBlock.height() + 'px',
				});
				$bg.css({
					width: $columnsBlock.width() + 'px',
					height: $columnsBlock.height() + 'px',
				});
			} // resizeColumns()

			$(window).on('resize' + bindSuffix, resizeColumns);
			setTimeout(resizeColumns, 1);

		}); // domReady();

	}; // return exports()

}); // define()
