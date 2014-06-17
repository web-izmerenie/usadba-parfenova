/**
 * Popup module
 *
 * @author Viacheslav Lotsmanov
 */

define(['get_val', 'jquery'], function (getVal, $) {

	var exports = {};

	// helpers {{{1

	function inherit(proto) {
		if (Object.create) return Object.create(proto);
		function F() {}
		F.prototype = proto;
		return new F();
	}

	function makeError(exception, callback) {
		if (callback) {
			setTimeout($.proxy(callback, null, exception), 1);
			return true;
		}
		throw exception;
	}

	// helpers }}}1

	var htmlClassName = 'popup';
	var contentClassName = 'popup_content';
	var overflowClassName = 'popup_overflow';

	var $overflow = $('<div/>', { class: overflowClassName });
	var $html = null;
	var $body = null;

	function renderTpl(params, tpl) {
		tpl = tpl.replace(/#CLASSNAME#/g, params.closerClassName);
		return tpl;
	} // renderTpl()

	exports.show = function (params, callback) { // {{{1

		if ($('html').hasClass( htmlClassName )) {
			makeError(new exports.exceptions.AnotherAlreadyOpened(), callback);
			return false;
		}

		// validate params {{{2

		var tmpParamName;

		tmpParamName = '$container';
		if (!(params[tmpParamName] instanceof jQuery)) {
			makeError(new exports.exceptions.IncorrectParameter(
				null, tmpParamName, typeof params[tmpParamName], 'jQuery-object'), callback);
			return false;
		}

		tmpParamName = 'tplCloser';
		if (tmpParamName in params && typeof params[tmpParamName] !== 'string') {
			makeError(new exports.exceptions.IncorrectParameter(
				null, tmpParamName, typeof params[tmpParamName], 'string'), callback);
			return false;
		}

		tmpParamName = 'closerCallback';
		if (tmpParamName in params && params[tmpParamName] instanceof Function) {
			makeError(new exports.exceptions.IncorrectParameter(
				null, tmpParamName, typeof params[tmpParamName], 'function'), callback);
			return false;
		}

		tmpParamName = 'closerClassName';
		if (tmpParamName in params && typeof params[tmpParamName] !== 'string') {
			makeError(new exports.exceptions.IncorrectParameter(
				null, tmpParamName, typeof params[tmpParamName], 'string'), callback);
			return false;
		}

		tmpParamName = undefined;

		// validate params }}}2

		var $closer = null;
		var closingProcess = false;

		params = $.extend({
			$container: null,
			tplCloser: '<a class="#CLASSNAME#"></a>', // [optional]
			closerCallback: null, // [optional]
			closerClassName: 'closer', // [optional]
			bindSuffix: '.popup_bind', // [optional]
		}, (params || {}));

		if (!$html) {
			$html = $('html');
			$body = $('body');
			$body.prepend($overflow);
		}

		$overflow.css({ opacity: 0, display: 'block' });
		$html.addClass( htmlClassName );
		$closer = params.$container.find('.' + params.closerClassName);
		if ($closer.size() <= 0) {
			params.$container.prepend( renderTpl(params, params.tplCloser) );
			$closer = params.$container.find('.' + params.closerClassName);
		}

		function close() { // {{{2

			if (closingProcess) return false; else closingProcess = true;

			if (params.closerCallback) if (params.closerCallback() === false) return false;

			var count = 0;

			$.merge($closer, $overflow).off('click' + params.bindSuffix, close);
			$.merge($overflow, params.$container)
				.stop()
				.animate({ opacity: 0 }, getVal('animationSpeed'), function () {
					$(this).css('display', 'none');
					count++;
					if (count >= 2) $html.removeClass( htmlClassName );
				});

		} // close() }}}2

		$overflow.stop().animate({ opacity: 1 }, getVal('animationSpeed'));

		params.$container.stop().css({
			opacity: 0,
			display: 'block'
		}).addClass( contentClassName ).animate({
			opacity: 1
		}, getVal('animationSpeed'), function () {
			$.merge($closer, $overflow).on('click' + params.bindSuffix, close);
		});

	}; // exports.show() }}}1

	// exceptions {{{1

	exports.exceptions = {};

	exports.exceptions.AnotherAlreadyOpened =
	function (message) {
		Error.call(this);
		this.name = 'AnotherAlreadyOpened';
		this.message = message || 'Another popup is already opened.';
	};

	exports.exceptions.IncorrectParameter =
	function (message, paramName, paramType, paramMustBeType) {
		Error.call(this);
		this.name = 'IncorrectParameter';
		if (message) {
			this.message = message;
		} else {
			this.message = 'Incorrect parameter';
			if (paramName) this.message += ' "'+ paramName +'"';
			if (paramType) this.message += ' (type: "'+ paramType +'")';
			if (paramMustBeType) this.message += ', must be a "'+ paramMustBeType +'"';
			this.message += '.';
		}
	};

	for (var key in exports.exceptions) {
		exports.exceptions[key].prototype = inherit(Error.prototype);
	}

	// exceptions }}}1

	return exports;

}); // define()
