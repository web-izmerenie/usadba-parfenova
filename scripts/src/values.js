/**
 * Values for "get_val" module
 *
 * @author Viacheslav Lotsmanov
 */

define(function () {

	/** @public */ var exports = {};

	exports.values = {

		animationSpeed: 200, // ms
		cookieExpires: 365 // days

	};

	/** Required set before "getVal" */
	exports.required = [
		'lang',
		'revision'
	];

	return exports;

}); // define()
