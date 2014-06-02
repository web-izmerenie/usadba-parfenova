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
		headerSubMenuItemMaxMarginLeft: 22, // px

		card1ScrollDownJitterInterval: 5, // sec
		card1ScrollDownJitterValue: 20, // px

		mainPageBackgroundsRatio: [4, 3], // ratio
		mainPageParalaxValue: 100 // % of height

	};

	/** Required set before "getVal" */
	exports.required = [
		'lang',
		'revision'
	];

	return exports;

}); // define()
