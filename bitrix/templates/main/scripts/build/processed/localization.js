;(function isolate() { function define() { var args = Array.prototype.slice.call(arguments, 0); if (typeof args[0] !== 'string') { args.unshift('localization'); } window.define.apply(this, args); } define.amd = { jQuery: true }; 
/**
 * Localization values
 *
 * @author Viacheslav Lotsmanov
 * @encoding utf-8
 */

define(['get_val'], function (getVal) {

	var locals = {

		'ru': {

			// ...

		},

		'defaultLocal': getVal('lang')

	};

	return locals;

}); // define()

})();