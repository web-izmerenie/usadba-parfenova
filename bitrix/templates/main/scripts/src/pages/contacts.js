/**
 * "contacts" page behavior
 *
 * @author Viacheslav Lotsmanov
 */

define(['jquery', 'get_val', 'get_local_text'], function ($, getVal, getLocalText) {
$(function domReady() {

	var $section = $('section.contacts');

	if ($section.size() <= 0) return;

	$section.each(function (i) {
		var $s = $(this);
		var $maps = $s.find('.interactive_map');
		$maps.each(function (n) {
			var $mapWrap = $(this);
			var $map = $mapWrap.find('.map');
			var id = 'interactive_yandex_map_n_' + i + '_' + n;
			$map.attr('id', id);

			var mapCenterX = parseInt($mapWrap.attr('data-center-x'), 10);
			var mapCenterY = parseInt($mapWrap.attr('data-center-y'), 10);
			var mapZoom = parseInt($mapWrap.attr('data-zoom'), 10);
			var mapRoute = null;

			if (isNaN(mapCenterX) || isNaN(mapCenterY) || isNaN(mapZoom)) {
				require(['dialog_box_wrapper'], function (showDialogBox) {
					showDialogBox({ messages: [ getLocalText('err', 'interactive_map_params') ] });
				});
				return;
			}

			try {
				mapRoute = JSON.parse($mapWrap.attr('data-route'));
			} catch (err) {
				require(['dialog_box_wrapper'], function (showDialogBox) {
					showDialogBox({ messages: [ getLocalText('err', 'interactive_map_params') ] });
				});
				return;
			}

			require(['dynamic_api'], function (dynamicLoadApi) {
				var mapLang = (getVal('lang') === 'ru') ? 'ru-RU' : 'en-US';
				dynamicLoadApi(
					'http://api-maps.yandex.ru/2.0/?load=package.standard&lang=' + mapLang,
					'ymaps',
					function cb(err, ymaps) {

						if (err) {
							require(['dialog_box_wrapper'], function (showDialogBox) {
								showDialogBox({ messages: [ getLocalText('err', 'interactive_map_init') ] });
							});
							return;
						}

						// load modules
						ymaps.load(['package.route']);

						ymaps.ready(function () {

							var map = new ymaps.Map(id, {
								center: [ mapCenterY, mapCenterX ],
								zoom: mapZoom,
							});

							// controls
							map.controls
								.add('zoomControl', { left: 15, top: 15 })
								.add('typeSelector', { right: 15, top: 15 });

							$.each(mapRoute, function (i, path) {
								ymaps.route(path).then(function success(route) {
									map.geoObjects.add(route);
								}, function error(err) {
									require(['dialog_box_wrapper'], function (showDialogBox) {
										showDialogBox({ messages: [ getLocalText('err', 'interactive_map_route') ] });
									});
								});
							});

							$(window).on('resize', function () {

								$mapWrap.css(
									'height', (
										(getVal('panoramaRatio')[1] * $mapWrap.innerWidth()) /
										getVal('panoramaRatio')[0]
									) + 'px'
								);

								map.container.fitToViewport();

							}).trigger('resize');

						}); // ymaps.ready()

					} // dynamicLoadApi cb()
				); // dynamicLoadApi()
			}); // require(['dynamic_api']...
		}); // $maps.each()
	}); // $section.each()

}); // domReady()
}); // define()
