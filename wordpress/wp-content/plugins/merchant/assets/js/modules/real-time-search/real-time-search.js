/**
 * Real Time Search.
 *
 */

'use strict';

var merchant = merchant || {};
merchant.modules = merchant.modules || {};
(function ($) {
  merchant.modules.ajaxRealTimeSearch = {
    init: function init() {
      var self = this;
      var fields = document.querySelectorAll('.woocommerce-product-search .wc-search-field, .widget_product_search .search-field, .wp-block-search .wp-block-search__input, .wc-block-product-search-field, .woocommerce-product-search .search-field, .w-search-form input, .the7-search-form__input, input[type="search"]');
      if (fields.length) {
        var _loop = function _loop(i) {
          fields[i].setAttribute('autocomplete', 'off');
          fields[i].addEventListener('keyup', self.debounce(function () {
            self.searchFormHandler(fields[i]);
          }, 300));
          fields[i].addEventListener('focus', self.debounce(function () {
            self.searchFormHandler(fields[i]);
          }, 300));
        };
        for (var i = 0; i < fields.length; i++) {
          _loop(i);
        }
        document.addEventListener('click', function (e) {
          if (e.target.closest('.merchant-ajax-search-wrapper') === null) {
            self.destroy();
          }
        });
      }
    },
    searchFormHandler: function searchFormHandler(el) {
      if (el.value.length < 3) {
        return false;
      }
      var self = this;
      var term = el.value;
      var clist = el.classList;
      var type = clist.contains('wc-block-product-search-field') || clist.contains('wc-search-field') ? 'product' : 'post';
      var _ref = window.merchant.setting.real_time_search || {},
        _ref$ajax_search_resu = _ref.ajax_search_results_amount_per_search,
        posts_per_page = _ref$ajax_search_resu === void 0 ? 15 : _ref$ajax_search_resu,
        _ref$ajax_search_resu2 = _ref.ajax_search_results_order_by,
        orderby = _ref$ajax_search_resu2 === void 0 ? 'title' : _ref$ajax_search_resu2,
        _ref$ajax_search_resu3 = _ref.ajax_search_results_order,
        order = _ref$ajax_search_resu3 === void 0 ? 'asc' : _ref$ajax_search_resu3,
        _ref$ajax_search_resu4 = _ref.ajax_search_results_display_categories,
        display_categories = _ref$ajax_search_resu4 === void 0 ? 0 : _ref$ajax_search_resu4,
        _ref$ajax_search_resu5 = _ref.ajax_search_results_enable_search_by_sku,
        enable_search_by_sku = _ref$ajax_search_resu5 === void 0 ? 0 : _ref$ajax_search_resu5;
      $.ajax({
        url: window.merchant.setting.ajax_url,
        method: 'POST',
        data: {
          action: 'ajax_search_callback',
          nonce: window.merchant.setting.nonce,
          type: type,
          search_term: term,
          posts_per_page: posts_per_page,
          orderby: orderby,
          order: order,
          display_categories: display_categories,
          enable_search_by_sku: enable_search_by_sku
        },
        success: function success(response) {
          var wrapper = el.parentNode.querySelector('.merchant-ajax-search-wrapper');
          if (!wrapper) {
            wrapper = document.createElement('div');
            wrapper.className = 'merchant-ajax-search-wrapper';
            el.parentNode.append(wrapper);
            el.parentNode.classList.add('merchant-ajax-search');
          }
          wrapper.innerHTML = response.output;
          var productsWrapper = document.querySelector('.merchant-ajax-search-products');
          if (productsWrapper && self.scrollbarVisible(productsWrapper)) {
            productsWrapper.classList.add('has-scrollbar');
          }
          if (self.elementIsOutOfScreenHorizontal(wrapper)) {
            wrapper.classList.add('merchant-reverse');
          }
        }
      });
    },
    destroy: function destroy() {
      if (document.body.classList.contains('wp-admin')) {
        return;
      }
      var wrappers = document.querySelectorAll('.merchant-ajax-search-wrapper');
      wrappers.forEach(function (wrapper) {
        return wrapper.remove();
      });
    },
    debounce: function debounce(callback, wait) {
      var timeoutId = null;
      return function () {
        for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
          args[_key] = arguments[_key];
        }
        window.clearTimeout(timeoutId);
        timeoutId = window.setTimeout(function () {
          callback.apply(null, args);
        }, wait);
      };
    },
    scrollbarVisible: function scrollbarVisible(el) {
      return el.scrollHeight > el.clientHeight;
    },
    elementIsOutOfScreenHorizontal: function elementIsOutOfScreenHorizontal(el) {
      var rect = el.getBoundingClientRect();
      return rect.x + rect.width > window.innerWidth;
    }
  };
  $(document).ready(function () {
    merchant.modules.ajaxRealTimeSearch.init();
  });
})(jQuery);