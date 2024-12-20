"use strict";

;
(function ($) {
  'use strict';

  var $widthInput = $('input[name="merchant[image-max-width]');
  var $heightInput = $('input[name="merchant[image-max-height]');

  // On page load
  var imageDimensionPrev = {
    width: $widthInput.val(),
    height: $heightInput.val()
  };
  $(document).on('save.merchant', function (e, module) {
    if (module === 'payment-logos') {
      var logosStr = $('input[name="merchant[logos]"]').val();
      var logosArr = logosStr.split(',');
      regenerate_images(logosArr);
    }
  });
  function regenerate_images(attachments) {
    var _merchant, _merchant2;
    var imageDimensionNext = {
      width: $widthInput.val(),
      height: $heightInput.val()
    };

    // Check if image dimensions have changed
    var isDimensionChanged = imageDimensionPrev.width !== imageDimensionNext.width || imageDimensionPrev.height !== imageDimensionNext.height;

    // Update previous dimensions for the next comparison
    if (isDimensionChanged) {
      imageDimensionPrev.height = imageDimensionNext.height;
      imageDimensionPrev.width = imageDimensionNext.width;
    }
    $.ajax({
      type: 'POST',
      url: (_merchant = merchant) === null || _merchant === void 0 ? void 0 : _merchant.ajax_url,
      data: {
        action: 'merchant_regenerate_images',
        nonce: (_merchant2 = merchant) === null || _merchant2 === void 0 ? void 0 : _merchant2.nonce,
        is_dimension_changed: isDimensionChanged,
        attachments: attachments
      },
      beforeSend: function beforeSend(r) {
        if (isDimensionChanged) {
          //$('<span>Regenerating...</span>').insertAfter( $( '.merchant-gallery-button' ) );
        }
      },
      success: function success(response) {
        if (!response || !response.data) {
          return;
        }
        // Do something
      },
      error: function error(_error) {
        console.log(_error);
      }
    });
  }
})(jQuery);