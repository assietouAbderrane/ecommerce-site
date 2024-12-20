"use strict";

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t.return && (u = t.return(), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t.return || t.return(); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var merchant = merchant || {};
var _ref = (merchant === null || merchant === void 0 ? void 0 : merchant.setting) || {},
  _ref$clear_cart = _ref.clear_cart,
  clearCartObj = _ref$clear_cart === void 0 ? {} : _ref$clear_cart;
;
(function ($, window, document) {
  $(document).ready(function ($) {
    new ClearCart($);
  });
})(jQuery, window, document);
var ClearCart = /*#__PURE__*/function () {
  function ClearCart() {
    _classCallCheck(this, ClearCart);
    this.timer;
    this.clearCartCookie = 'merchant_clear_cart';
    this.init();
  }
  return _createClass(ClearCart, [{
    key: "init",
    value: function init() {
      this.events();
    }
  }, {
    key: "events",
    value: function events() {
      this.clearCartPageLoadAlert();
      this.clearCartButtonAlert();
      this.clearCartAutoAlert();
    }

    /**
     * Clear the cart AJAX
     *
     * @param $button
     */
  }, {
    key: "clearCartAjax",
    value: function clearCartAjax() {
      var _merchant$setting, _merchant$setting2;
      var $button = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      var $ = jQuery;
      $button === null || $button === void 0 || $button.prop('disabled', true);
      $.ajax({
        url: merchant === null || merchant === void 0 || (_merchant$setting = merchant.setting) === null || _merchant$setting === void 0 ? void 0 : _merchant$setting.ajax_url,
        type: 'POST',
        data: {
          action: 'clear_cart',
          nonce: merchant === null || merchant === void 0 || (_merchant$setting2 = merchant.setting) === null || _merchant$setting2 === void 0 ? void 0 : _merchant$setting2.nonce
        },
        success: function success(response) {
          if (response.success) {
            var _response$data;
            var redirectUrl = (_response$data = response.data) === null || _response$data === void 0 ? void 0 : _response$data.url;
            $(document.body).trigger('wc_cart_emptied');
            if (redirectUrl) {
              window.location.href = redirectUrl;
            } else {
              // If no redirect URL, refresh the Cart table & Mini/Side Cart
              $(document.body).trigger('wc_update_cart').trigger('wc_fragment_refresh');
            }
          }
        },
        error: function error(_error) {
          console.log(_error);
        },
        complete: function complete() {
          $button === null || $button === void 0 || $button.prop('disabled', false);
        }
      });
    }

    /**
     * Check if time passed as soon as the page loaded and show the alert if so.
     */
  }, {
    key: "clearCartPageLoadAlert",
    value: function clearCartPageLoadAlert() {
      var that = this;
      jQuery(window).on('load', function () {
        if (!(clearCartObj !== null && clearCartObj !== void 0 && clearCartObj.auto_clear)) {
          that.deleteClearCartCookie();
          return;
        }
        var expirationTime = that.getCookie(that.clearCartCookie);
        if (expirationTime && that.getCurrentTime() > expirationTime) {
          setTimeout(function () {
            return that.showClearCartAlert();
          }, 1000);
        }
      });
    }

    /**
     * Show Alert on Clear Cart Button Click
     */
  }, {
    key: "clearCartButtonAlert",
    value: function clearCartButtonAlert() {
      var $ = jQuery;
      var that = this;

      // Clear Cart On Button Click
      $(document).on('click', '.merchant-clear-cart-button', function (e) {
        e.preventDefault();
        that.showClearCartAlert($(this));

        // Sometimes the cookie doesn't clear automatically when the clear button is clicked on the home page (or other pages).
        // In those cases, delete it after a short delay.
        setTimeout(function () {
          return that.deleteClearCartCookie();
        }, 1000);
      });
    }

    /**
     * Auto Clear Cart
     */
  }, {
    key: "clearCartAutoAlert",
    value: function clearCartAutoAlert() {
      var $ = jQuery;
      var that = this;
      var is_product_single = clearCartObj.is_product_single,
        is_cart_page = clearCartObj.is_cart_page,
        auto_clear = clearCartObj.auto_clear,
        total_items = clearCartObj.total_items,
        threshold = clearCartObj.threshold,
        added_to_cart_no_ajax = clearCartObj.added_to_cart_no_ajax;

      // Cart is being emptied
      $(document.body).on('wc_cart_emptied', function (event) {
        that.deleteClearCartCookie();
      });

      // All Removed in Side/Mini Cart
      $(document.body).on('removed_from_cart', function (event, fragments, hash, button) {
        if (!hash) {
          that.deleteClearCartCookie();
        }
      });

      // Product Single Page
      if (auto_clear && added_to_cart_no_ajax) {
        var expireTime = that.setClearCartCookie();
        that.timer = setTimeout(function () {
          return that.showClearCartAlert();
        }, expireTime);
      }

      // Adding & Updating Qty - AJAX.
      $(document.body).on('wc_fragment_refresh added_to_cart updated_wc_div removed_from_cart', function (event, data, hash, button) {
        // Cart Page
        if ((event === null || event === void 0 ? void 0 : event.type) === 'updated_wc_div' && is_cart_page && !$('.woocommerce-cart-form').length) {
          that.deleteClearCartCookie();
          return;
        }

        // Product Single
        if (is_product_single && (event === null || event === void 0 ? void 0 : event.type) === 'wc_fragment_refresh') {
          that.deleteClearCartCookie();
          return;
        }

        // If All items removed.
        if ((event === null || event === void 0 ? void 0 : event.type) === 'removed_from_cart' && !hash) {
          return;
        }
        var refreshCookie = total_items >= threshold;
        if (data && data['.merchant_clear_cart_cart_count'] !== undefined) {
          refreshCookie = data['.merchant_clear_cart_cart_count'] >= threshold;
          if (!refreshCookie) {
            that.deleteClearCartCookie();
            return;
          }
        }
        if (auto_clear && refreshCookie) {
          var _expireTime = that.setClearCartCookie();
          that.timer = setTimeout(function () {
            return that.showClearCartAlert();
          }, _expireTime);
        }
      });
    }

    /**
     * Show Alert.
     *
     * @param $button
     */
  }, {
    key: "showClearCartAlert",
    value: function showClearCartAlert() {
      var $button = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      var that = this;
      var expirationTime = that.getCookie(that.clearCartCookie);
      if (!expirationTime && !$button.length) {
        that.deleteClearCartCookie();
        return;
      }
      var message = $button && $button.length ? clearCartObj === null || clearCartObj === void 0 ? void 0 : clearCartObj.popup_message : clearCartObj === null || clearCartObj === void 0 ? void 0 : clearCartObj.popup_message_inactive;
      if (window.confirm(message)) {
        that.deleteClearCartCookie();
        that.clearCartAjax($button);
      } else {
        if (!$button) {
          var expireTime = that.setClearCartCookie();
          that.timer = setTimeout(function () {
            return that.showClearCartAlert();
          }, expireTime);
        }
      }
    }

    /**
     * Set Clear Cart Cookie.
     *
     * @returns {number}
     */
  }, {
    key: "setClearCartCookie",
    value: function setClearCartCookie() {
      clearTimeout(this.timer);
      var _ref2 = clearCartObj || {},
        expiration_time = _ref2.expiration_time,
        wc_session_expiration_time = _ref2.wc_session_expiration_time;
      var cartExpireDuration = expiration_time * 1000;
      var cartExpireTime = this.getCurrentTime() + cartExpireDuration; // millisecond
      var cookieExpireTime = this.getCurrentTime() + wc_session_expiration_time * 1000; // millisecond

      this.setCookie(this.clearCartCookie, cartExpireTime, cookieExpireTime);
      return cartExpireDuration;
    }

    /**
     * Delete Clear Cart Cookie.
     */
  }, {
    key: "deleteClearCartCookie",
    value: function deleteClearCartCookie() {
      clearTimeout(this.timer);
      this.deleteCookie(this.clearCartCookie);
    }

    /**
     * Get Current time.
     *
     * @param time
     * @returns {number|Date}
     */
  }, {
    key: "getCurrentTime",
    value: function getCurrentTime() {
      var time = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
      var date = new Date();
      return time ? date.getTime() : date;
    }

    /**
     * Set Cookie Helper.
     *
     * @param name
     * @param value
     * @param expiration
     */
  }, {
    key: "setCookie",
    value: function setCookie(name, value, expiration) {
      var date = new Date(expiration);
      var expires = "expires=".concat(date.toUTCString());
      document.cookie = "".concat(name, "=").concat(value, ";").concat(expires, ";path=/");
    }

    /**
     * Get Cookie Helper.
     *
     * @param name
     * @returns {null|string}
     */
  }, {
    key: "getCookie",
    value: function getCookie(name) {
      var cookies = document.cookie.split(';');
      var _iterator = _createForOfIteratorHelper(cookies),
        _step;
      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var cookie = _step.value;
          var _cookie$trim$split = cookie.trim().split('='),
            _cookie$trim$split2 = _slicedToArray(_cookie$trim$split, 2),
            cookieName = _cookie$trim$split2[0],
            cookieValue = _cookie$trim$split2[1];
          if (cookieName === name) {
            return decodeURIComponent(cookieValue);
          }
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
      return null;
    }

    /**
     * Delete Cookie Helper.
     *
     * @param name
     */
  }, {
    key: "deleteCookie",
    value: function deleteCookie(name) {
      document.cookie = "".concat(name, "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;");
    }
  }]);
}();