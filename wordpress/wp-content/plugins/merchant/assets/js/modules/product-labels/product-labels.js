"use strict";

;
(function ($, window, document, undefined) {
  'use strict';

  $(document).ready(function () {
    $(document).on('wc-product-gallery-after-init', function (e, $el, params) {
      var $productLabel = $($el).find('.woocommerce-product-gallery__wrapper .merchant-product-labels');
      var $flexSliderWrapper = $productLabel === null || $productLabel === void 0 ? void 0 : $productLabel.closest('.flex-viewport');
      if ($productLabel.length && $flexSliderWrapper.length) {
        $flexSliderWrapper.append($productLabel);
      }
    });
  });
})(jQuery, window, document);