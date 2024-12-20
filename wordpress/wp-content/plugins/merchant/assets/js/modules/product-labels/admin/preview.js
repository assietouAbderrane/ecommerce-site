"use strict";

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t.return && (u = t.return(), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
(function ($) {
  'use strict';

  var shapesDefaultStyles = {
    text: {
      'text-shape-1': {
        width: 100,
        height: 32,
        borderRadius: 5,
        marginX: 10,
        marginY: 10
      },
      'text-shape-2': {
        width: 100,
        height: 32,
        borderRadius: 5,
        marginX: 10,
        marginY: 10
      },
      'text-shape-3': {
        width: 125,
        height: 32,
        borderRadius: 5,
        marginX: 10,
        marginY: 10
      },
      'text-shape-4': {
        width: 125,
        height: 32,
        borderRadius: 5,
        marginX: 10,
        marginY: 10
      },
      'text-shape-5': {
        width: 140,
        height: 32,
        borderRadius: 0,
        marginX: 25,
        marginY: 10,
        disableInShortCode: true
      },
      'text-shape-6': {
        width: 140,
        height: 32,
        borderRadius: 0,
        marginX: 25,
        marginY: 10,
        disableInShortCode: true
      },
      'text-shape-7': {
        width: 90,
        height: 90,
        borderRadius: 5,
        marginX: 10,
        marginY: 10
      },
      'text-shape-8': {
        width: 100,
        height: 100,
        borderRadius: 50,
        marginX: 10,
        marginY: 10
      }
    },
    image: {
      'image-shape-1': {
        width: 45,
        height: 45
      },
      'image-shape-2': {
        width: 45,
        height: 25
      },
      'image-shape-3': {
        width: 45,
        height: 15
      },
      'image-shape-4': {
        width: 45,
        height: 25
      },
      'image-shape-5': {
        width: 45,
        height: 15
      },
      'image-shape-6': {
        width: 38,
        height: 45
      },
      'image-shape-7': {
        width: 45,
        height: 30
      },
      'image-shape-8': {
        width: 45,
        height: 15
      },
      'image-shape-9': {
        width: 45,
        height: 27
      },
      'image-shape-10': {
        width: 38,
        height: 45
      },
      'image-shape-11': {
        width: 45,
        height: 12
      },
      'image-shape-12': {
        width: 45,
        height: 15
      },
      'image-shape-13': {
        width: 45,
        height: 32
      },
      'image-shape-14': {
        width: 42,
        height: 45
      },
      'image-shape-15': {
        width: 45,
        height: 10
      },
      'image-shape-16': {
        width: 45,
        height: 32
      },
      'image-shape-17': {
        width: 45,
        height: 14
      },
      'image-shape-18': {
        width: 38,
        height: 45
      },
      'image-shape-19': {
        width: 45,
        height: 30
      },
      'image-shape-20': {
        width: 45,
        height: 28
      },
      'image-shape-21': {
        width: 38,
        height: 45
      },
      'image-shape-22': {
        width: 45,
        height: 45
      },
      'image-shape-23': {
        width: 45,
        height: 35
      },
      'image-shape-24': {
        width: 45,
        height: 45
      }
    }
  };
  $(document).on('click', '.merchant-flexible-content-control.product-labels-style .layout', function () {
    var $this = $(this),
      $parent = $this.closest('.merchant-flexible-content-control.product-labels-style');
    $parent.find('.layout').removeClass('active');
    $this.addClass('active');
    initPreview();
  });
  $(document).on('merchant-flexible-content-added', function (e, $layout) {
    $('.merchant-flexible-content-control.product-labels-style').find('.layout').removeClass('active');
    $layout.addClass('active');
    initPreview();
  });
  $(document).on('merchant-product-labels-reload-product-preview', function (e) {
    initPreview();
  });
  $(document).on('change.merchant keyup', function () {
    initPreview();
  });
  function initPreview() {
    var layout = $('.merchant-flexible-content-control.product-labels-style').find('.layout.active'),
      labelContent = layout.find('.merchant-field-label input').val(),
      labelType = layout.find('.merchant-field-label_type input:checked').val(),
      textShapeEl = layout.find('.merchant-choices-label_text_shape input:checked'),
      textShape = textShapeEl.val(),
      imageShapeEl = layout.find('.merchant-choices-label_image_shape input:checked'),
      imageShape = imageShapeEl.val(),
      customImageEl = layout.find('.merchant-field-label_image_shape_custom input[type="hidden"]'),
      customImage = customImageEl.val(),
      marginX = layout.find('.merchant-field-margin_x input').val(),
      marginXEl = layout.find('.merchant-field-margin_x'),
      marginY = layout.find('.merchant-field-margin_y input').val(),
      labelWidth = layout.find('.merchant-field-label_width input').val(),
      labelHeight = layout.find('.merchant-field-label_height input').val(),
      backgroundColor = layout.find('.merchant-field-background_color input').val(),
      textColor = layout.find('.merchant-field-text_color input').val(),
      borderRadius = layout.find('.merchant-field-shape_radius input').val(),
      fontSize = layout.find('.merchant-field-font_size input').val(),
      fontStyle = layout.find('.merchant-field-font_style select').val(),
      position = layout.find('.merchant-field-label_position select').val();
    var labelPreview = $('.merchant-product-labels-preview').find('.merchant-product-labels');
    var classes = "merchant-product-labels__regular position-".concat(position, " merchant-product-labels__").concat(labelType);
    classes += labelType === 'text' ? " merchant-product-labels__".concat(textShape) : '';
    var labelClassPattern = /\bmerchant-product-labels__\S+/g;
    var css = {
      'top': marginY + 'px',
      'left': position === 'top-left' ? marginX + 'px' : '',
      'right': position === 'top-right' ? marginX + 'px' : ''
    };
    if (labelType === 'text') {
      css['width'] = labelWidth + 'px';
      css['height'] = labelHeight + 'px';
      css['background-color'] = backgroundColor;
      css['color'] = textColor;
      css['font-size'] = fontSize + 'px';
      css['border-radius'] = borderRadius + 'px';
      var fontStyles = {
        'normal': {
          'font-style': '',
          'font-weight': ''
        },
        'italic': {
          'font-style': 'italic',
          'font-weight': ''
        },
        'bold': {
          'font-style': '',
          'font-weight': 'bold'
        },
        'bold_italic': {
          'font-style': 'italic',
          'font-weight': 'bold'
        }
      };
      css = _objectSpread(_objectSpread({}, css), fontStyles[fontStyle]);
      var currency = labelPreview.attr('data-currency');

      // Update shortcode to content
      labelContent = labelContent.replace(/{sale}/g, '50%').replace(/{sale_amount}/g, "".concat(currency, "50")).replace(/{inventory}/g, 'In stock').replace(/{inventory_quantity}/g, 19);

      // Update label content & styles
      labelPreview.css(css).removeClass(function (index, className) {
        return (className.match(labelClassPattern) || []).join(' ');
      }).removeClass('position-top-right position-top-left').addClass(classes).find('span').css({
        width: '',
        height: ''
      }).text(labelContent.trim());
    } else {
      css['width'] = '';
      css['height'] = '';
      css['background-color'] = '';
      css['color'] = '';
      css['font-size'] = '';
      css['border-radius'] = '';
      var img = customImage ? customImageEl.closest('.merchant-field-label_image_shape_custom').find('.merchant-upload-image img').clone() : imageShapeEl.closest('label').find('img').clone();

      // Update label content & styles
      labelPreview.css(css).removeClass(function (index, className) {
        return (className.match(labelClassPattern) || []).join(' ');
      }).removeClass('position-top-right position-top-left').addClass(classes).find('span').css({
        width: labelWidth + 'px',
        height: labelHeight + 'px'
      }).html(img);

      // Toggle custom image upload element
      layout.find('.merchant-upload-button-drag-drop').toggle(!customImage);
    }

    // Change Margin X label
    marginXEl.closest('.layout-field').find('.merchant-module-page-setting-field-title').text(position === 'top-left' ? 'Margin left' : 'Margin right');
  }
  $(document).on('change input change.merchant', '.merchant-module-page-setting-box', function (e) {
    $(document).trigger('merchant-product-labels-reload-product-preview');
  });
  $(document).on('click', '.merchant-flexible-content-control.product-labels-style .layout', function (e) {
    $('.merchant-flexible-content-control.product-labels-style .layout').removeClass('active');
    $(this).addClass('active');
    $(document).trigger('merchant-product-labels-reload-product-preview');
  });
  $(document).on('merchant-flexible-content-deleted', function (e, deletedItem) {
    if (deletedItem.hasClass('active')) {
      // if active item was deleted, set previous item to active
      $('.merchant-flexible-content-control.product-labels-style .merchant-flexible-content .layout:first-child').addClass('active');
      $(document).trigger('merchant-product-labels-reload-product-preview');
    }
  });
  $('.merchant-flexible-content-control.product-labels-style .merchant-flexible-content .layout:first-child').addClass('active');
  $(document).trigger('merchant-product-labels-reload-product-preview');

  // Shapes
  $(document).on('change', '.merchant-field-label_type input', function () {
    var labelType = $(this).val();
    var $layout = $(this).closest('.layout');
    var shape = $layout.find(labelType === 'text' ? '.merchant-choices-label_text_shape input:checked' : '.merchant-choices-label_image_shape input:checked').val();
    updateStyles(labelType, shape, $(this));
  });
  $(document).on('change', '.merchant-choices-label_text_shape input', function () {
    var $layout = $(this).closest('.layout');
    var shape = $layout.find('.merchant-choices-label_text_shape input:checked').val();
    updateStyles('text', shape, $(this));
  });
  $(document).on('change', '.merchant-choices-label_image_shape input', function () {
    var $layout = $(this).closest('.layout');
    var shape = $layout.find('.merchant-choices-label_image_shape input:checked').val();
    updateStyles('image', shape, $(this));
  });
  $(document).on('save.merchant', function (e, module) {
    if (module === 'product-labels') {
      $('.merchant-choices-label_text_shape input').each(function () {
        $(this).removeAttr('data-previous');
      });
    }
  });

  // Page load
  handleShortcodeChange($('.merchant-field-use_shortcode input').is(':checked'));

  // Enable/Disable Shortcode
  $(document).on('change', '.merchant-field-use_shortcode input', function () {
    handleShortcodeChange($(this).is(':checked'));
  });

  // Enable/Disable shapes based on shortcode enabled/disabled
  function handleShortcodeChange(isEnabled) {
    var dataPrev = 'data-previous';
    $('.merchant-flexible-content-control.product-labels-style .layout .merchant-choices-label_text_shape').each(function () {
      var $inputs = $(this).find('input');
      $inputs.each(function () {
        var _shapesDefaultStyles$;
        var $input = $(this);
        var value = $input.val();
        var isDisabledInShortCode = (_shapesDefaultStyles$ = shapesDefaultStyles.text[value]) === null || _shapesDefaultStyles$ === void 0 ? void 0 : _shapesDefaultStyles$.disableInShortCode;
        if (isEnabled) {
          if (isDisabledInShortCode) {
            if ($input.is(':checked')) {
              // Store previous value and change the selection to default shape
              $input.attr(dataPrev, value).prop('checked', false);
              $inputs.filter('input[value="text-shape-1"]').prop('checked', true);
              updateStyles('text', 'text-shape-1', $inputs.filter('input[value="text-shape-1"]'));
            }

            // Disable
            $input.attr('disabled', true);
          }
        } else {
          if ($input.attr(dataPrev)) {
            // Revert to previously selected shape if shortcode disabled without saving.
            $inputs.filter('input[value="text-shape-1"]').prop('checked', false);
            $inputs.filter("input[value=\"".concat(value, "\"]")).prop('checked', true);
            $input.removeAttr(dataPrev);
            updateStyles('text', value, $inputs.filter("input[value=\"".concat(value, "\"]")));
          }

          // Enable
          $input.attr('disabled', false);
        }
      });
    });
  }
  var updateStyles = function updateStyles(shapeType, selectedShape, $input) {
    var $layout = $input.closest('.layout');
    var properties = {
      'merchant-field-label_width': 'width',
      'merchant-field-label_height': 'height',
      'merchant-field-shape_radius': 'borderRadius',
      'merchant-field-margin_x': 'marginX',
      'merchant-field-margin_y': 'marginY'
    };
    var labelType = $layout.find('.merchant-field-label_type input:checked').val();

    // If custom image uploaded, don't change style when trying to select predefined images
    if (labelType === 'image') {
      var customImage = $layout.find('.merchant-field-label_image_shape_custom input[type="hidden"]').val();
      if (customImage && $input.closest('.merchant-choices-label_image_shape').length) {
        return;
      }
    }
    for (var _i = 0, _Object$entries = Object.entries(properties); _i < _Object$entries.length; _i++) {
      var _shapesDefaultStyles$2;
      var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
        inputWrapper = _Object$entries$_i[0],
        propertyName = _Object$entries$_i[1];
      var value = (_shapesDefaultStyles$2 = shapesDefaultStyles[shapeType][selectedShape]) === null || _shapesDefaultStyles$2 === void 0 ? void 0 : _shapesDefaultStyles$2[propertyName];
      if (value || value === 0) {
        $layout.find(".".concat(inputWrapper, " input")).val(value).attr('value', value).trigger('input').trigger('change');
      }
    }
  };
})(jQuery);