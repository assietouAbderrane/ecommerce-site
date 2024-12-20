"use strict";

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
(function ($) {
  'use strict';

  /**
   * MerchantSideCartAdminPreview
   * Add tweaks to control the side cart upsell groups label in the module settings page.
   */
  var MerchantSideCartAdminPreview = /*#__PURE__*/function () {
    function MerchantSideCartAdminPreview() {
      _classCallCheck(this, MerchantSideCartAdminPreview);
      this.init();
    }

    /**
     * Initialize the logic.
     */
    return _createClass(MerchantSideCartAdminPreview, [{
      key: "init",
      value: function init() {
        this.preview();
        this.events();
        this.flexibleContentLabel();
      }
    }, {
      key: "preview",
      value: function preview() {
        $(document).on('change', '.merchant-field-slide_direction input', function () {
          if ($(this).is(':checked')) {
            $('.merchant-side-cart').removeClass('slide-left slide-right').addClass('slide-' + $(this).val());
          }
        });
      }

      /**
       * Events.
       */
    }, {
      key: "events",
      value: function events() {
        $(document).on('change keyup merchant.change', '.merchant-module-page-setting-fields', this.flexibleContentLabel.bind(this));
      }

      /**
       * Update the label of the upsell groups in the side cart settings page based on the selected options.
       */
    }, {
      key: "flexibleContentLabel",
      value: function flexibleContentLabel() {
        var self = this;
        if (this.cartUpsellsToggleState() && this.cartUpsellType() === 'custom_upsell') {
          var upsellsGroups = $('.merchant-field-custom_upsells .merchant-flexible-content .layout');
          upsellsGroups.each(function () {
            var group = $(this),
              trigger = self.customUpsellTrigger(group),
              categories = self.customUpsellCategories(group),
              products = self.customUpsellProducts(group);
            if ('categories' === trigger) {
              self.updateGroupLabel(group, 'categories', categories.length, categories);
            }
            if ('products' === trigger) {
              self.updateGroupLabel(group, 'products', products.length, products);
            }
            if ('all' === trigger) {
              self.updateGroupLabel(group, 'all', 10, []);
            }
          });
        }
      }

      /**
       * Get the upsells count label badge.
       * @param group {jQuery} The upsell group.
       * @returns {string}
       */
    }, {
      key: "upsellsLabelBadge",
      value: function upsellsLabelBadge(group) {
        var upsellsType = group.find('.merchant-field-custom_upsell_type select').val();
        if ('products' === upsellsType) {
          var products = group.find('.merchant-field-upsells_product_ids .merchant-selected-products-preview li');
          if (products.length) {
            return "<span class=\"merchant-upsells-badge\">Upsells: ".concat(products.length, "</span>");
          }
        }
        return '';
      }

      /**
       * Update the group label based on the selected options.
       * @param group {jQuery} The upsell group.
       * @param type {string} The type of the upsell group
       * @param count {number} The count of the selected items
       * @param data {Array} The selected items data
       */
    }, {
      key: "updateGroupLabel",
      value: function updateGroupLabel(group, type, count, data) {
        var groupLabel = group.find('.layout-title');
        if ('categories' === type) {
          if (count > 1) {
            groupLabel.html(merchant_side_cart_params.keywords.multi_categories + this.upsellsLabelBadge(group));
          } else if (count === 1) {
            groupLabel.html(merchant_side_cart_params.keywords.category_trigger + ' ' + data[0] + this.upsellsLabelBadge(group));
          } else {
            groupLabel.html(merchant_side_cart_params.keywords.no_cats_selected + this.upsellsLabelBadge(group));
          }
        }
        if ('products' === type) {
          if (count > 1) {
            groupLabel.html(merchant_side_cart_params.keywords.multi_products + this.upsellsLabelBadge(group));
          } else if (count === 1) {
            groupLabel.html(data[0].name + ' (#' + data[0].id + ')' + this.upsellsLabelBadge(group));
          } else {
            groupLabel.html(merchant_side_cart_params.keywords.no_products_selected + this.upsellsLabelBadge(group));
          }
        }
        if ('all' === type) {
          groupLabel.html(merchant_side_cart_params.keywords.all_products + this.upsellsLabelBadge(group));
        }
      }

      /**
       * Get the selected trigger for the upsell group.
       * @param group {jQuery} The upsell group.
       * @returns {string} The selected trigger value.
       */
    }, {
      key: "customUpsellTrigger",
      value: function customUpsellTrigger(group) {
        return group.find('.merchant-field-upsell_based_on select').val();
      }

      /**
       * Get the selected products for the upsell group.
       * @param group {jQuery} The upsell group.
       * @returns {Array} The selected products data.
       */
    }, {
      key: "customUpsellProducts",
      value: function customUpsellProducts(group) {
        var foundProducts = group.find('.merchant-field-product_ids .merchant-selected-products-preview li');
        var products = [];
        foundProducts.each(function () {
          products.push({
            id: $(this).data('id'),
            name: $(this).data('name'),
            element: $(this)
          });
        });
        return products;
      }

      /**
       * Get the selected categories for the upsell group.
       * @param group {jQuery} The upsell group.
       * @returns {Array} The selected categories.
       */
    }, {
      key: "customUpsellCategories",
      value: function customUpsellCategories(group) {
        var upsellDropdown = group.find('.merchant-field-category_slugs select');
        return upsellDropdown.find('option:selected').map(function () {
          return $(this).text().trim();
        }).get();
      }

      /**
       * Check the state of the upsells main toggle.
       * @returns {boolean} True if the toggle is checked otherwise false.
       */
    }, {
      key: "cartUpsellsToggleState",
      value: function cartUpsellsToggleState() {
        var toggle = $('.merchant-field-use_upsells input');
        return !!toggle.is(':checked');
      }

      /**
       * Get the selected upsell type.
       * @returns {string} The selected upsell type.
       */
    }, {
      key: "cartUpsellType",
      value: function cartUpsellType() {
        // custom_upsell
        var type = $('.merchant-field-upsells_type select');
        return type.val();
      }
    }]);
  }(); // Instantiate the class when the DOM is ready
  $(document).ready(function () {
    new MerchantSideCartAdminPreview();
  });
})(jQuery);