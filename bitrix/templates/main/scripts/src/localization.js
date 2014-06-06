/**
 * Localization values
 *
 * @author Viacheslav Lotsmanov
 * @encoding utf-8
 */

define(['get_val'], function (getVal) {

	var locals = {

		'ru': {

			'err': {
				'limited_functional': 'Функционал сайта работает неполностью.',
				'recommend_update_your_browser': 'Рекомендуем обновить ваш браузер.',
			},

		},

		'defaultLocal': getVal('lang')

	};

	return locals;

}); // define()
