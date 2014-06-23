/**
 * Photogallery module
 *
 * @module photogallery
 * @exports Photogallery
 * @requires jquery
 *
 * @author Viacheslav Lotsmanov
 * @license GPLv3 by Free Software Foundation
 * @see {@link https://github.com/unclechu/js-useful-amd-modules/|GitHub}
 */

define(['jquery'],
/** @lends Photogallery */
function ($) {

	var exports = null;

	// helpers {{{1

	function inherit(proto) {
		if (Object.create) return Object.create(proto);
		function F() {}
		F.prototype = proto;
		return new F();
	}

	// helpers }}}1

	/**
	 * @private
	 * @inner
	 * @type {Photogallery~params}
	 * @readOnly
	 */
	var defaultParams = { // {{{1

		/**
		 * @typedef {Object.<*>} Photogallery~params
		 * @prop {jQuery|DOM|string} $selector
		 * @prop {Photogallery~paramClassNames} classNames
		 * @prop {Photogallery~paramTemplates} templates
		 */

		$selector: null,

		/**
		 * @typedef {Object.<string>} Photogallery~paramClassNames
		 * @prop {string} overflow
		 * @prop {string} container
		 * @prop {string} controls
		 * @prop {string} closer
		 * @prop {string} prev
		 * @prop {string} next
		 * @prop {string} photo
		 * @prop {string} photo_item
		 * @prop {string} loading
		 */
		classNames: {
			html: 'photogallery',
			overflow: 'photogallery_overflow',
			container: 'photogallery_container',
			controls: 'photogallery_controls',
			closer: 'closer',
			prev: 'prev',
			next: 'next',
			photo: 'photo',
			photo_item: 'photo_item',
			loading: 'loading'
		},

		/**
		 * @typedef {Object.<string>} Photogallery~paramTemplates
		 * @prop {string} overflow
		 * @prop {string} container
		 * @prop {string} controls
		 * @prop {string} closer
		 * @prop {string} prev
		 * @prop {string} next
		 * @prop {string} photo
		 * @prop {string} photo_item
		 */
		templates: {
			overflow: '<div class="#CLASS_OVERFLOW#"></div>',
			container: '<div class="#CLASS_CONTAINER#">'+
					'<div class="wrap_1">'+
						'<div class="wrap_2">'+
							'#CONTROLS#'+
							'#PHOTO#'+
						'</div>'+
					'</div>'+
				'</div>',
			controls: '<div class="#CLASS_CONTROLS#">'+
					'#CONTROL_CLOSER#'+
					'#CONTROL_PREV#'+
					'#CONTROL_NEXT#'+
				'</div>',
			closer: '<a class="#CLASS_CLOSER#"></a>',
			prev: '<a class="#CLASS_PREV#"></a>',
			next: '<a class="#CLASS_NEXT#"></a>',
			photo: '<div class="#CLASS_PHOTO#">'+
					'#PHOTO_ITEM#'+
				'</div>',
			photo_item: '<img alt="#PHOTO_DESCRIPTION#"'+
					' src="#PHOTO_SRC#"'+
					' width="#PHOTO_WIDTH#"'+
					' height="#PHOTO_HEIGHT#"'+
					' class="#CLASS_PHOTO_ITEM#"'+
				' />'
		}

	}; // defaultParams }}}1

	/**
	 * @callback Photogallery~callback
	 * @param {Error|Null} err Exception
	 * @this {Photogallery} Instance of Photogallery
	 */

	/**
	 * @name Photogallery
	 * @class
	 * @constructs Photogallery
	 * @public
	 *
	 * @param {Photogallery~params} params - Input parameters
	 * @param {Photogallery~callback} [callback] - After instance initialized
	 *
	 * @throws {Photogallery~IncorrectArgument}
	 * @throws {Photogallery~NoParams}
	 */
	exports = function Photogallery(params, callback) { // Photogallery() {{{1

		/** @private */ var self = this;
		/** @private */ var key;

		/** @private */ self._callback = callback;
		callback = undefined;

		// validate arguments {{{2

		if ($.type(self._callback) !== 'undefined' && !(self._callback instanceof Function)) {
			throw new exports.exceptions.IncorrectArgument(null, 'callback');
		}

		if ($.type(params) === 'undefined') {
			self.makeError(new exports.exceptions.NoParams());
			return false;
		}

		if (!$.isPlainObject(params)) {
			self.makeError(new exports.exceptions.IncorrectArgument(null, 'params'));
			return false;
		}

		// validate arguments }}}2
		
		// validate parameters {{{2

		if (!('$selector' in params)) {
			self.makeError(new exports.exceptions.RequiredParam(null, '$selector'));
			return false;
		}

		if (
			!(params.$selector instanceof $) &&
			$.type(params.$selector) !== 'object' &&
			$.type(params.$selector) !== 'string'
		) {
			self.makeError(new exports.exceptions.IncorrectParamValue(null, '$selector'));
			return false;
		}

		if ('classNames' in params) {
			if (!$.isPlainObject(params.classNames)) {
				self.makeError(new exports.exceptions.IncorrectParamValue(null, 'classNames'));
				return false;
			}

			for (key in params.classNames) {
				if ($.type(params.classNames[key]) !== 'string') {
					self.makeError(new exports.exceptions.IncorrectParamValue(null, 'classNames'));
					return false;
				}
			}
		}

		if ('templates' in params) {
			if (!$.isPlainObject(params.templates)) {
				self.makeError(new exports.exceptions.IncorrectParamValue(null, 'templates'));
				return false;
			}

			for (key in params.templates) {
				if ($.type(params.templates[key]) !== 'string') {
					self.makeError(new exports.exceptions.IncorrectParamValue(null, 'templates'));
					return false;
				}
			}
		}

		// validate parameters }}}2

		self.params = $.extend(true, {}, defaultParams, params);

		self.params.$selector = $( self.params.$selector );

		/**
		 * @public
		 * @readOnly
		 */
		self.opened = false;

		self.params.$selector.click(function () {

			self.show();
			return false;

		});

	}; // Photogallery() }}}1

	/**
	 * Throw error or delegate exception to callback
	 *
	 * @memberOf Photogallery
	 * @protected
	 * @static
	 * @param {Error} exception
	 * @returns {boolean} Returns true or throws exception
	 * @this {Photogallery}
	 */
	exports.prototype.makeError = function (exception) { // {{{1

		var self = this;

		if (self._callback) {
			setTimeout($.proxy(self._callback, self, exception), 1);
			return true;
		}

		throw exception;

	}; // exports.prototype.makeError() }}}1

	/**
	 * Render template
	 *
	 * @memberOf Photogallery
	 * @public
	 * @static
	 * @param {string} tplCode - Key of template code (see params.templates)
	 * @returns {string} - Rendered template
	 * @this {Photogallery}
	 * @throws {Photogallery~TemplateNotFoundByCode}
	 */
	exports.prototype.renderTemplate = function (tplCode) { // {{{1

		var self = this;

		if (!(tplCode in self.params.templates)) {
			throw new exports.exceptions.TemplateNotFoundByCode(null, tplCode);
		}

		var result = self.params.templates[tplCode];

		var regs = [ // {{{2
			'CLASS_HTML',
			'CLASS_OVERFLOW',
			'CLASS_CONTAINER',
			'CLASS_CONTROLS',
			'CLASS_CLOSER',
			'CLASS_PREV',
			'CLASS_NEXT',
			'CLASS_PHOTO',
			'CLASS_PHOTO_ITEM',
			'CLASS_LOADING',

			'OVERFLOW',
			'CONTAINER',
			'CONTROLS',
			'CONTROL_CLOSER',
			'CONTROL_PREV',
			'CONTROL_NEXT',
			'PHOTO',
			'PHOTO_ITEM',
			'PHOTO_DESCRIPTION',
			'PHOTO_SRC',
			'PHOTO_WIDTH',
			'PHOTO_HEIGHT'
		]; // regs }}}2

		function replace(regCode, toReplace) {
			result = result.replace(new RegExp('#'+regCode+'#', 'g'), toReplace);
		}

		function replaceLoop() { // {{{2

			// classes {{{3

			replace('CLASS_HTML', self.params.classNames.html);
			replace('CLASS_OVERFLOW', self.params.classNames.overflow);
			replace('CLASS_CONTAINER', self.params.classNames.container);
			replace('CLASS_CONTROLS', self.params.classNames.controls);
			replace('CLASS_CLOSER', self.params.classNames.closer);
			replace('CLASS_PREV', self.params.classNames.prev);
			replace('CLASS_NEXT', self.params.classNames.next);
			replace('CLASS_PHOTO', self.params.classNames.photo);
			replace('CLASS_PHOTO_ITEM', self.params.classNames.photo_item);
			replace('CLASS_LOADING', self.params.classNames.loading);

			// classes }}}3

			// html {{{3

			replace('OVERFLOW', self.params.templates.overflow);
			replace('CONTAINER', self.params.templates.container);
			replace('CONTROLS', self.params.templates.controls);
			replace('CONTROL_CLOSER', self.params.templates.closer);
			replace('CONTROL_PREV', self.params.templates.prev);
			replace('CONTROL_NEXT', self.params.templates.next);
			replace('PHOTO', self.params.templates.photo);
			replace('PHOTO_ITEM', self.params.templates.photo_item);

			// html }}}3

			// photo {{{3

			replace('PHOTO_DESCRIPTION', '');
			replace('PHOTO_SRC', '');
			replace('PHOTO_WIDTH', '');
			replace('PHOTO_HEIGHT', '');

			// photo }}}3

			$.each(regs, function (i, regCode) {
				var reg = new RegExp('#'+regCode+'#', 'g');
				if (reg.exec(result) !== null) {
					replaceLoop();
					return false;
				}
			});

		} // replaceLoop() }}}2

		replaceLoop();

		return result;

	}; // exports.prototype.renderTemplate() }}}1

	/**
	 * Show photogallery
	 *
	 * @memberOf Photogallery
	 * @public
	 * @static
	 * @this {Photogallery}
	 */
	exports.prototype.show = function () { // {{{1

		var self = this;

		if (self.opened) return; else self.opened = true;

		var overflow = self.renderTemplate('overflow');
		var container = self.renderTemplate('container');

		$('html').addClass( self.params.classNames.html );
		$('body').prepend( container ).prepend( overflow );

	}; // exports.prototype.show() }}}1

	// exceptions {{{1

	/**
	 * Exceptions
	 *
	 * @memberOf Photogallery
	 * @public
	 * @type {Object.<Error>}
	 * @prop {Photogallery~IncorrectArgument} IncorrectArgument - Incorrect argument of constructor
	 * @prop {Photogallery~NoParams} NoParams - No params argument
	 * @prop {Photogallery~RequiredParam} RequiredParam
	 * @prop {Photogallery~IncorrectParamValue} IncorrectParamValue
	 * @prop {Photogallery~TemplateNotFoundByCode} TemplateNotFoundByCode
	 * @static
	 * @readOnly
	 */
	exports.exceptions = {};

	/** @typedef {Error} Photogallery~IncorrectArgument */
	exports.exceptions.IncorrectArgument = function (message, argName) {
		Error.call(this);
		this.name = 'IncorrectArgument';
		if (argName) this.argumentName = argName;
		if (message) {
			this.message = message;
		} else {
			this.message = 'Incorrect ';
			if (argName) this.message += '"'+ argName +'" ';
			this.message += 'argument value.';
		}
	};

	/** @typedef {Error} Photogallery~NoParams */
	exports.exceptions.NoParams = function (message) {
		Error.call(this);
		this.name = 'NoParams';
		this.message = message || 'No params.';
	};

	/** @typedef {Error} Photogallery~RequiredParam */
	exports.exceptions.RequiredParam = function (message, param) {
		Error.call(this);
		this.name = 'RequiredParam';
		if (param) this.paramName = param;
		if (message) {
			this.message = message;
		} else {
			this.message = 'Param ';
			if (param) this.message += '"'+ param +'" ';
			this.message += 'is required.';
		}
	};

	/** @typedef {Error} Photogallery~IncorrectParamValue */
	exports.exceptions.IncorrectParamValue = function (message, param) {
		Error.call(this);
		this.name = 'IncorrectParamValue';
		if (param) this.paramName = param;
		if (message) {
			this.message = message;
		} else {
			this.message = 'Incorrect ';
			if (param) this.message += '"'+ param +'" ';
			this.message += 'param value.';
		}
	};

	/** @typedef {Error} Photogallery~TemplateNotFoundByCode */
	exports.exceptions.TemplateNotFoundByCode = function (message, tplCode) {
		Error.call(this);
		this.name = 'TemplateNotFoundByCode';
		if (tplCode) this.templateCode = tplCode;
		if (message) {
			this.message = message;
		} else {
			this.message = 'Template not found by code';
			if (tplCode) this.message += ' "'+ tplCode +'"';
			this.message += '.';
		}
	};

	for (var key in exports.exceptions) {
		exports.exceptions[key].prototype = inherit(Error.prototype);
	}

	// Provide exceptions to instance of constructor too
	exports.prototype.exceptions = exports.exceptions;

	// exceptions }}}1

	return exports;

}); // define()
