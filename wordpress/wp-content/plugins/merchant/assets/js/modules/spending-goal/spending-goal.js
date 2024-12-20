"use strict";

;
(function ($) {
  $(document).ready(function () {
    if (typeof merchant === 'undefined') {
      return;
    }
    var spendingWidget = '.merchant-spending-goal-widget';
    var _ref = merchant.setting || {},
      is_added_to_cart = _ref.is_added_to_cart,
      enable_auto_slide_in = _ref.enable_auto_slide_in,
      spending_goal_nonce = _ref.spending_goal_nonce,
      ajax_url = _ref.ajax_url;

    // Show/Hide widget when clicking on it.
    $(document).on('click', spendingWidget, function () {
      if ($(this).hasClass('merchant-spending-goal-widget__regular')) {
        showWidget(true);
      }
    });

    // Auto open after a product is added to the Cart on Product Single Page; no AJAX.
    if (enable_auto_slide_in && is_added_to_cart && $('body.single-product').length) {
      showWidget();
    }

    // Update the widget and auto slide when a product is added/removed to cart via AJAX
    $(document.body).on('added_to_cart removed_from_cart updated_cart_totals updated_wc_div', function (event, data) {
      $.ajax({
        type: 'POST',
        url: ajax_url,
        data: {
          action: 'update_spending_goal_widget',
          nonce: spending_goal_nonce
        },
        success: function success(response) {
          if (!response || !response.data) {
            return;
          }

          // Loop through and check if it's a regular widget or added via shortcode and do necessary changes in the markup.
          $(spendingWidget).each(function () {
            var isShortCode = $(this).hasClass('merchant-spending-goal-widget__shortcode');
            var newMarkup = $.parseHTML(response.data.markup.trim())[0];
            if (isShortCode) {
              $(newMarkup).removeClass('merchant-spending-goal-widget__regular').addClass('merchant-spending-goal-widget__shortcode');
            } else {
              $(newMarkup).removeClass('merchant-spending-goal-widget__shortcode').addClass('merchant-spending-goal-widget__regular');
            }

            // Replace with new markup
            $(this).replaceWith(newMarkup);

            // For regular widget only.
            // Open widget immediately if open, else with slight delay for slide-in effect.
            if (!isShortCode && enable_auto_slide_in) {
              $(this).hasClass('active') ? showWidget() : setTimeout(showWidget, 66);
            }
          });
        },
        error: function error(_error) {
          console.log(_error);
        }
      });
    });

    // Helper
    function showWidget() {
      var toggle = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      if ($(spendingWidget).hasClass('merchant-spending-goal-widget__regular')) {
        toggle ? $(spendingWidget).toggleClass('active') : $(spendingWidget).addClass('active');
      }
    }
  });
})(jQuery);