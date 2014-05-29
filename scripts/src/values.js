/**
 * Values for "get_val" module
 *
 * @author Viacheslav Lotsmanov
 */

define(function () {

	/** @public */ var exports = {};

	exports.values = {

		animationSpeed: 200, // ms
		cookieExpires: 365, // days

		headerHeight: 87, // px
		headerFirstLineMaxWidth: 842, // px
		headerFirstLineMinWidth: 762, // px
		headerSubMenuItemMaxMarginLeft: 22 // px

	};

	/** Required set before "getVal" */
	exports.required = [
		'lang',
		'revision'
	];

	return exports;

}); // define()
