"use strict";

;
(function ($, window, document, undefined) {
  var autoClearEnabledOnLoad = $('.merchant-field-enable_auto_clear input').is(':checked');

  // Clear Cookie
  $(document).on('save.merchant', function (e, module) {
    if (module === 'clear-cart') {
      var autoClearEnabledOnSave = $('.merchant-field-enable_auto_clear input').is(':checked');
      if (autoClearEnabledOnLoad && !autoClearEnabledOnSave) {
        document.cookie = 'merchant_clear_cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/';
      }
    }
  });

  // Page load
  $(document).on('ready', function () {
    initPreview();
  });

  // Change settings
  $(document).on('change', function () {
    initPreview();
  });

  // Change button style
  $(document).on('change', '.merchant-field-style input', function () {
    var val = $(this).val();
    var color = "#ffffff";
    if (val === 'outline' || val === 'text') {
      color = "#212121";
    }
    $('.merchant-field-text_color input, .merchant-field-text_color_hover input').val(color).attr('value', color).trigger('change').trigger('input');
  });
  function initPreview() {
    var $buttonPreview = $('.merchant-clear-cart-button');
    var isCartPageEnabled = $('.merchant-field-enable_cart_page input').is(':checked');
    var $cartPagePositionField = $('.merchant-field-cart_page_position select');
    var cartPagePosition = $cartPagePositionField.val();

    // If Cart Page is Disabled
    $buttonPreview.toggleClass('hide', !isCartPageEnabled);
    if (isCartPageEnabled) {
      $buttonPreview.each(function () {
        if ($(this).hasClass(cartPagePosition)) {
          $(this).removeClass('hide');
        } else {
          $(this).addClass('hide');
        }
      });
    }

    // Style - Solid/Outline/Text
    var $buttonStyleField = $('.merchant-field-style input');
    $buttonStyleField.each(function () {
      var value = $(this).val();
      $buttonPreview.removeClass("merchant-clear-cart-button--".concat(value));
      if ($(this).is(':checked')) {
        $buttonPreview.addClass("merchant-clear-cart-button--".concat(value));
      }
    });
    var $shopTableBottom = $('.shop_table-bottom');
    $cartPagePositionField.find('option').each(function () {
      var value = $(this).val();

      // Remove the class corresponding to the value of each option
      $shopTableBottom.removeClass(value);

      // If the current option is selected, add the class
      if ($(this).is(':selected')) {
        $shopTableBottom.addClass(value);
      }
    });
  }
})(jQuery, window, document);