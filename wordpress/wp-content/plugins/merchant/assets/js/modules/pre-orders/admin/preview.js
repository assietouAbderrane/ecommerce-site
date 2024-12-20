"use strict";

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
(function ($) {
  'use strict';

  var merchant_pre_order_object = {
    init: function init() {
      // Initialize events
      this.initEvents();
      this.initPreview();
      this.datePickers = [];
    },
    initEvents: function initEvents() {
      var self = this;
      $(document).on('change.merchant keyup', this.initPreview.bind(this));
      $(document).on('click', '.merchant-flexible-content-control.pre-orders-style .layout', this.updateActiveLayout.bind(this));
      $('.merchant-flexible-content-control .layout:first-child').addClass('active').trigger('click');

      // Remove datepicker form pre-order start & end fields if associated Shipping fields is empty on Page load.
      $(document).on('initiated.merchant-datepicker', function (e, datePicker, $input, options, index) {
        if (!$input.closest('.merchant-flexible-content').length) {
          return;
        }
        var $preOrderStartField = $input.closest('.merchant-field-pre_order_start');
        var $preOrderEndField = $input.closest('.merchant-field-pre_order_end');
        var $shippingField = $input.closest('.layout-body').find('.merchant-field-shipping_date input');

        // Process only if the current input is a pre-order start or end field
        if ($preOrderStartField.length || $preOrderEndField.length) {
          // Add the same index to all related fields
          $shippingField.add($input.closest('.layout-body').find('.merchant-field-pre_order_start input')).add($input.closest('.layout-body').find('.merchant-field-pre_order_end input')).attr('data-datepicker-index', index);
          if ($shippingField.length) {
            var datepickerIndex = $shippingField.data('datepicker-index');

            // Check if a group with this index already exists
            var existingGroup = self.datePickers.find(function (group) {
              return group.id === datepickerIndex;
            });
            if (existingGroup) {
              existingGroup.datePickers.push(datePicker);
            } else {
              self.datePickers.push({
                id: datepickerIndex,
                datePickers: [datePicker]
              });
            }

            // If the shipping field has no value, destroy the datePicker
            if (!$shippingField.val()) {
              datePicker === null || datePicker === void 0 || datePicker.destroy();

              // To prevent console error
              datePicker.opts = {};
              datePicker.$datepicker = '';
            }
          }
        }
      });

      // Based on Shipping field selection, initiate or destroy pre-order start & end date fields
      $(document).on('change.merchant-datepicker', function (e, formattedDate, $input, options) {
        if (!($input !== null && $input !== void 0 && $input.closest('.merchant-field-shipping_date').length)) {
          return;
        }
        $input.css('borderColor', '');
        var $shippingField = $input.closest('.layout-body').find('.merchant-field-shipping_date input');
        var $preOrderFields = $input.closest('.layout-body').find('.merchant-field-pre_order_start input, .merchant-field-pre_order_end input');
        if ($shippingField.length) {
          var datepickerIndex = $shippingField.data('datepicker-index');
          if ($shippingField.val()) {
            var newDatePickers = [];

            // Create new date picker instances for pre-order fields
            $preOrderFields.each(function () {
              var datePickerInstance = new AirDatepicker($(this).getPath(), _objectSpread(_objectSpread({}, options), {}, {
                selectedDates: '' // Ensure no pre-selected dates
              }));
              newDatePickers.push(datePickerInstance);
            });

            // Push the new group into `self.datePickers`
            self.datePickers.push({
              id: datepickerIndex,
              datePickers: newDatePickers
            });
          } else {
            // Destroy and remove date pickers for this index when shipping field is cleared
            self.datePickers = self.datePickers.filter(function (datePickerGroup) {
              // Destroy all date picker instances in the group
              if (datePickerGroup.id === datepickerIndex) {
                datePickerGroup.datePickers.forEach(function (datePickerInstance) {
                  datePickerInstance === null || datePickerInstance === void 0 || datePickerInstance.destroy();
                  datePickerInstance === null || datePickerInstance === void 0 || datePickerInstance.clear(); // Clear selected dates

                  // Prevent console errors by resetting internal properties
                  datePickerInstance.opts = {};
                  datePickerInstance.$datepicker = '';
                });
                return false; // Remove this group from the array
              }
              return true; // Retain other groups
            });
          }
        }
      });

      // Show alert if Shipping date not selected
      $(document).on('click', '.merchant-field-pre_order_start input, .merchant-field-pre_order_end input', function () {
        var $shippingDateField = $(this).closest('.layout-body').find('.merchant-field-shipping_date input');
        if ($shippingDateField.length && !$shippingDateField.val()) {
          var _merchant;
          $shippingDateField.css('borderColor', '#f00');
          alert(((_merchant = merchant) === null || _merchant === void 0 ? void 0 : _merchant.shipping_date_missing_text) || 'Please set a shipping date first');
        }
      });
    },
    initPreview: function initPreview() {
      var layout = $('.merchant-flexible-content-control.pre-orders-style').find('.layout.active'),
        btnText = layout.find('.merchant-field-button_text input').val(),
        btnTextColor = layout.find('.merchant-field-text-color input').val(),
        btnTextColorHover = layout.find('.merchant-field-text-hover-color input').val(),
        btnBorderColor = layout.find('.merchant-field-border-color input').val(),
        btnBorderColorHover = layout.find('.merchant-field-border-hover-color input').val(),
        btnBgColor = layout.find('.merchant-field-background-color input').val(),
        btnBgColorHover = layout.find('.merchant-field-background-hover-color input').val(),
        btn = $('.merchant-pre-ordered-product .add_to_cart_button');
      btn.text(btnText);

      // Set the CSS variables
      $('.merchant-pre-ordered-product').css({
        '--mrc-po-text-color': btnTextColor,
        '--mrc-po-text-hover-color': btnTextColorHover,
        '--mrc-po-border-color': btnBorderColor,
        '--mrc-po-border-hover-color': btnBorderColorHover,
        '--mrc-po-background-color': btnBgColor,
        '--mrc-po-background-hover-color': btnBgColorHover
      });
    },
    updateActiveLayout: function updateActiveLayout(e) {
      var $this = $(e.currentTarget);
      var $parent = $this.closest('.merchant-flexible-content-control.pre-orders-style');
      $parent.find('.layout').removeClass('active');
      $this.addClass('active');
      this.initPreview();
    }
  };
  merchant_pre_order_object.init();
})(jQuery);