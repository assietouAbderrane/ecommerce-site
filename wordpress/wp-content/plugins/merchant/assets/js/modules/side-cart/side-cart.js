"use strict";

/**
 * Merchant side cart
 *
 */
jQuery(document).ready(function ($) {
  'use strict';

  var _merchant;
  var _ref = ((_merchant = merchant) === null || _merchant === void 0 ? void 0 : _merchant.setting) || {},
    _ref$side_cart = _ref.side_cart,
    sideCartObj = _ref$side_cart === void 0 ? {} : _ref$side_cart,
    ajax_url = _ref.ajax_url,
    nonce = _ref.nonce;
  var $body = $('body');
  $(document).on('click', '.js-merchant-side-cart-toggle-handler', function (e) {
    e.preventDefault();
    $body.toggleClass('merchant-side-cart-show');
    $(window).trigger('merchant.side-cart-resize');
  });

  // Manually update Side Cart as for some reason `wc_fragment_refresh` doesn't refresh the Side Cart widget.
  $body.on('wc_cart_emptied', function (e, context) {
    $('.merchant_widget_shopping_cart_content').fadeOut(function () {
      $(this).empty().append("<p class=\"woocommerce-mini-cart__empty-message\">".concat((sideCartObj === null || sideCartObj === void 0 ? void 0 : sideCartObj.side_cart_empty_message) || '', "</p>")).fadeIn();
    });
    var $floatingCart = $('.merchant-side-cart-floating-cart');
    if ($floatingCart.length) {
      $floatingCart.find('.merchant-side-cart-floating-cart-counter').text(0);
      if ((sideCartObj === null || sideCartObj === void 0 ? void 0 : sideCartObj.icon_display) === 'cart-not-empty') {
        $floatingCart.removeClass('merchant-show');
      }
    }
  });

  /**
   * Check if the current device is allowed to show the side cart.
   *
   * @returns {boolean}
   */
  function merchant_is_allowed_device() {
    var allowed_devices = sideCartObj === null || sideCartObj === void 0 ? void 0 : sideCartObj.allowed_devices;
    var screenWidth = window.innerWidth;
    if (screenWidth <= 768 && allowed_devices.includes('mobile')) {
      return true;
    } else if (screenWidth > 768 && allowed_devices.includes('desktop')) {
      return true;
    }
    return false;
  }

  // Toggle side cart
  if (sideCartObj.hasOwnProperty('show_after_add_to_cart_single_product') && merchant_is_allowed_device()) {
    var isSingleProductPage = $('body.single-product').length;
    var isNoticeVisible = $('.woocommerce-notices-wrapper').is(':visible') && !$('.woocommerce-notices-wrapper').is(':empty');
    var isBlockNoticeVisible = $('.wc-block-components-notice-banner').is(':visible') && !$('.wc-block-components-notice-banner').is(':empty');
    if (isSingleProductPage && (isNoticeVisible || isBlockNoticeVisible)) {
      $body.toggleClass('merchant-side-cart-show');
      $(window).trigger('merchant.side-cart-resize');
    }
  }

  // Add to cart AJAX event.
  if (sideCartObj.hasOwnProperty('add_to_cart_slide_out') && merchant_is_allowed_device()) {
    $(document.body).on('added_to_cart', function (event, fragments, cart_hash, $button, $context) {
      if ($context !== 'side-cart') {
        $body.toggleClass('merchant-side-cart-show');
      }
      $(window).trigger('merchant.side-cart-resize');
    });
  }

  // On cart URL click
  if (sideCartObj.hasOwnProperty('cart_url') && merchant_is_allowed_device()) {
    $('[href="' + (sideCartObj === null || sideCartObj === void 0 ? void 0 : sideCartObj.cart_url) + '"]:not(.merchant-side-cart-view-cart-btn)').on('click', function (e) {
      e.preventDefault();
      $(window).trigger('merchant.side-cart-resize');
      $body.toggleClass('merchant-side-cart-show');
    });
  }

  // Update Product quantity in Side Cart
  if (sideCartObj.hasOwnProperty('add_to_cart_slide_out') && merchant_is_allowed_device()) {
    var merchant_update_side_cart_quantity = function merchant_update_side_cart_quantity($input) {
      if (!$input.length || !ajax_url || !nonce) {
        return;
      }
      var cartItemKey = $input.attr('name');
      var quantity = Math.round(parseFloat($input.val() || 1));
      var $cart_item = $input.closest('.js-side-cart-item');

      // Clear previous timer
      clearTimeout(debounceTimer);

      // Set a new timer to delay the AJAX request
      debounceTimer = setTimeout(function () {
        $.ajax({
          type: 'POST',
          url: ajax_url,
          data: {
            action: 'update_side_cart_quantity',
            cart_item_key: cartItemKey,
            quantity: quantity,
            nonce: nonce
          },
          beforeSend: function beforeSend() {
            if ($cart_item.length) {
              $cart_item.block({
                message: null,
                overlayCSS: {
                  background: '#fff',
                  opacity: 0.6
                }
              });
            }
          },
          success: function success(response) {
            if (!response || !response.fragments) {
              return;
            }
            $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $input, 'side-cart']);
            if ($cart_item.length) {
              $cart_item.unblock();
              $(document).trigger('merchant_destroy_carousel');
              $(document).trigger('merchant_init_carousel');
            }
          },
          error: function error(_error) {
            console.log('Error:', _error);
          }
        });
      }, 350);
    };
    // Update quantity on plus/minus click
    $(document).on('click', '.js-merchant-quantity-btn', function (e) {
      e.preventDefault();
      var $btn = $(this);
      var $input = $btn.closest('.merchant-quantity-wrap').find('.js-update-quantity');
      if (!$input.length) {
        return;
      }
      var quantity = +($input.val() || 1);
      var minimum = +$input.attr('min');
      var maximum = +$input.attr('max');
      var stepSize = Math.round(parseFloat($input.attr('step')));
      if ($btn.hasClass('merchant-quantity-plus')) {
        quantity += stepSize;
        quantity = maximum && maximum !== -1 ? Math.min(quantity, maximum) : quantity;
      } else if ($btn.hasClass('merchant-quantity-minus')) {
        quantity -= stepSize;
        quantity = minimum ? Math.max(quantity, minimum) : quantity;
      }
      $input.val(quantity);
      merchant_update_side_cart_quantity($input);
    });

    // Update quantity on input value change
    $(document).on('input change', '.js-update-quantity', function (e) {
      e.preventDefault();
      merchant_update_side_cart_quantity($(this));
    });

    // Update quantity helper
    var debounceTimer;
  }
  var merchant_upsells = {
    init: function init() {
      var self = this;
      this.bindEvents();
      setTimeout(function () {
        $(document).trigger('merchant_init_carousel');

        // Pause the slider on hover
        $(document).find('.woocommerce-mini-cart-item.merchant-upsell-widget').on('mouseenter', function () {
          if ($(document).find('.merchant-mini-cart-upsells.upsells-layout-carousel').hasClass('slick-initialized')) {
            $('.merchant-mini-cart-upsells.upsells-layout-carousel').slick('slickPause');
          }
        });

        // Resume the slider on mouse leave
        $(document).find('.woocommerce-mini-cart-item.merchant-upsell-widget').on('mouseleave', function () {
          if ($(document).find('.merchant-mini-cart-upsells.upsells-layout-carousel').hasClass('slick-initialized')) {
            $('.merchant-mini-cart-upsells.upsells-layout-carousel').slick('slickPlay');
          }
        });
      }, 500);
    },
    bindEvents: function bindEvents() {
      $(document).on('change', '.merchant-mini-cart-upsell-item-wrap .variation-selector', this.handleVariationChange.bind(this));
      $(document).on('click', '.add-to-cart-wrap .merchant-upsell-add-to-cart:not(.disabled)', this.handleAddToCartClick.bind(this));
      $(document).on('click', '.merchant-coupon-form button', this.handleCouponBtnClick.bind(this));
      $(document).on('click', '.merchant-remove-coupon', this.handleCouponRemoveClick.bind(this));
      $(document).on('merchant_init_carousel', this.initCarousel.bind(this));
      $(document).on('merchant_destroy_carousel', this.destroyCarousel.bind(this));
      $(document).on('added_to_cart', this.handleAddToCart.bind(this));
      $(document).on('removed_from_cart', this.handleRemoveFromCart.bind(this));
    },
    handleVariationChange: function handleVariationChange(event) {
      var variationField = $(event.target),
        container = variationField.closest('.merchant-mini-cart-upsell-item-wrap'),
        variations = container.attr('data-variations') && JSON.parse(container.attr('data-variations')) || [],
        dropDowns = container.find('.variation-selector');
      container.attr('data-variation-id', 0); // reset variation ID
      var currentField = {
        name: $(event.target).attr('data-attribute_name'),
        value: $(event.target).val()
      };
      var availableOptions = [];
      var matchingVariations = variations.filter(function (variation) {
        return typeof variation.attributes[currentField.name.toLowerCase()] !== 'undefined' && variation.attributes[currentField.name.toLowerCase()] === currentField.value;
      });

      // Hide not available options
      dropDowns.each(function () {
        var dropdown = $(this);
        var attribute_name = dropdown.attr('data-attribute_name');
        // Collect available options for this attribute
        matchingVariations.forEach(function (variation) {
          var optionValue = variation.attributes[attribute_name.toLowerCase()];
          if (typeof optionValue !== 'undefined' && optionValue !== '' && !availableOptions.includes(optionValue)) {
            availableOptions.push(optionValue);
          }
        });
        if (currentField.name.toLowerCase() !== attribute_name.toLowerCase()) {
          dropdown.find('option').each(function () {
            var optionValue = $(this).attr('value');
            if (optionValue !== '') {
              if (availableOptions.includes(optionValue)) {
                $(this).show();
              } else {
                $(this).hide();
              }
            }
          });
        }
      });
      if (this.isAllVariationsSelected(container)) {
        this.fetchVariationDetails(container, container.attr('data-product-id'), this.getSelectedAttributes(container), this);
        // ajax call here to get product information...
        this.handleAddToCartBtnState(container, true);
      } else {
        this.handleAddToCartBtnState(container, false);
      }
    },
    /**
     * Fetches variation details via AJAX.
     *
     * @param {Object} container - The container element.
     * @param {Object} productID - The product ID.
     * @param {Object} selectedAttributes - The selected variation attributes.
     * @param {Object} self - The current object.
     *
     * @return {void}
     */
    fetchVariationDetails: function fetchVariationDetails(container, productID, selectedAttributes, self) {
      $.ajax({
        type: 'POST',
        url: ajax_url,
        data: {
          action: 'merchant_get_variation_data',
          product_id: productID,
          nonce: sideCartObj === null || sideCartObj === void 0 ? void 0 : sideCartObj.variation_info_nonce,
          attributes: selectedAttributes
        },
        success: function success(response) {
          if (response.success) {
            container.attr('data-variation-id', response.data.id);
            self.updateProductThumbnail(container, response.data.thumbnail_url);
          }
        },
        error: function error(_error2) {
          console.log('Error:', _error2);
        }
      });
    },
    updateProductThumbnail: function updateProductThumbnail(container, thumbnailUrl) {
      var productThumbnail = container.find('.product-thumbnail a img');
      productThumbnail.attr('src', thumbnailUrl);
    },
    getSelectedAttributes: function getSelectedAttributes(container) {
      var attributes = {};
      container.find('.variation-selector').each(function () {
        attributes[$(this).attr('name')] = $(this).val();
      });
      return attributes;
    },
    handleAddToCartBtnState: function handleAddToCartBtnState(container, allSelected) {
      var btn = container.find('.add-to-cart-wrap .merchant-upsell-add-to-cart');
      if (allSelected) {
        btn.removeClass('disabled');
        btn.prop('disabled', false);
      } else {
        btn.addClass('disabled');
        btn.prop('disabled', true);
      }
    },
    isAllVariationsSelected: function isAllVariationsSelected(container) {
      var variationFields = container.find('.variation-selector');
      return variationFields.length && variationFields.toArray().every(function (field) {
        return $(field).val() !== '';
      });
    },
    handleAddToCartClick: function handleAddToCartClick(event) {
      event.preventDefault();
      var self = this,
        btn = $(event.currentTarget),
        container = btn.closest('.merchant-mini-cart-upsell-item-wrap'),
        productType = container.attr('data-product-type'),
        productId = container.attr('data-product-id'),
        variationId = container.attr('data-variation-id');
      if (productType === 'variable' && variationId !== '0') {
        this.addToCart(self, 'variable', productId, variationId, btn);
      } else if (productType === 'simple') {
        this.addToCart(self, 'simple', productId, variationId, btn);
      } else {
        console.log('Unsupported product type:', productType);
      }
    },
    addToCart: function addToCart(self, productType, productId, variationId, btn) {
      var data = {
        action: 'merchant_side_cart_upsells_add_to_cart',
        product_id: productId,
        variation_id: variationId,
        nonce: nonce
      };
      $.ajax({
        type: 'POST',
        url: ajax_url,
        data: data,
        beforeSend: function beforeSend() {
          btn.addClass('loading');
        },
        success: function success(response) {
          self.handleSuccess(response);
        },
        error: function error(_error3) {
          self.handleError(_error3);
        },
        complete: function complete() {
          btn.removeClass('loading');
        }
      });
    },
    handleSuccess: function handleSuccess(response) {
      if (response.data.fragments) {
        $(document).trigger('merchant_destroy_carousel');
        $(document.body).trigger('added_to_cart', [response.data.fragments, response.data.cart_hash, $('.merchant-upsell-add-to-cart'), 'side-cart']);
        $(document).trigger('merchant_init_carousel');
      }
    },
    handleError: function handleError(error) {
      console.log('Error:', error);
    },
    handleAddToCart: function handleAddToCart(event, fragments, cart_hash, $button, $context) {
      $(document).trigger('merchant_destroy_carousel');
      $(document).trigger('merchant_init_carousel');
    },
    handleRemoveFromCart: function handleRemoveFromCart(event) {
      $(document).trigger('merchant_destroy_carousel');
      $(document).trigger('merchant_init_carousel');
    },
    initCarousel: function initCarousel() {
      // check if slick is initialized
      var carousel = $(document).find('.merchant-mini-cart-upsells.upsells-layout-carousel');
      if ('carousel' === (sideCartObj === null || sideCartObj === void 0 ? void 0 : sideCartObj.upsells_style) && !carousel.hasClass('slick-initialized')) {
        carousel.slick({
          infinite: true,
          arrows: true,
          slidesToShow: 1,
          dots: false,
          autoplay: false,
          // autoplaySpeed: 2000,
          fade: true,
          cssEase: 'linear',
          pauseOnFocus: true,
          pauseOnHover: true,
          prevArrow: '<button type="button" class="slick-prev"><</button>',
          nextArrow: '<button type="button" class="slick-next">></button>',
          rtl: (sideCartObj === null || sideCartObj === void 0 ? void 0 : sideCartObj.is_rtl) === '1'
        });
      }
    },
    destroyCarousel: function destroyCarousel() {
      // check if slick is initialized
      var carousel = $(document).find('.merchant-mini-cart-upsells.upsells-layout-carousel');
      if ('carousel' === (sideCartObj === null || sideCartObj === void 0 ? void 0 : sideCartObj.upsells_style) && carousel.hasClass('slick-initialized')) {
        carousel.slick('unslick');
      }
    },
    handleCouponBtnClick: function handleCouponBtnClick(event) {
      event.preventDefault();
      var self = this,
        btn = $(event.currentTarget),
        container = btn.closest('.merchant-coupon-form'),
        couponCode = container.find('.coupon_code').val();
      if (couponCode === '') {
        return;
      }
      this.applyCoupon(self, couponCode, container);
    },
    applyCoupon: function applyCoupon(self, couponCode, container) {
      var data = {
        action: 'merchant_side_cart_apply_coupon',
        coupon_code: couponCode,
        nonce: nonce
      };
      $.ajax({
        type: 'POST',
        url: ajax_url,
        data: data,
        beforeSend: function beforeSend() {
          container.addClass('loading');
        },
        success: function success(response) {
          self.handleCouponSuccess(response);
        },
        error: function error(_error4) {
          self.handleCouponError(_error4);
        },
        complete: function complete() {
          container.removeClass('loading');
        }
      });
    },
    removeCoupon: function removeCoupon(self, couponCode) {
      var data = {
        action: 'merchant_side_cart_remove_coupon',
        coupon_code: couponCode,
        nonce: nonce
      };
      $.ajax({
        type: 'POST',
        url: ajax_url,
        data: data,
        beforeSend: function beforeSend() {},
        success: function success(response) {
          self.handleCouponSuccess(response);
        },
        error: function error(_error5) {
          self.handleCouponError(_error5);
        }
      });
    },
    handleCouponSuccess: function handleCouponSuccess(response) {
      if ((response === null || response === void 0 ? void 0 : response.fragments) !== undefined) {
        $(document).trigger('merchant_destroy_carousel');
        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $('.merchant-coupon-form button'), 'side-cart']);
        $(document).trigger('merchant_init_carousel');
      }
    },
    handleCouponError: function handleCouponError(error) {
      console.log('Error:', error);
    },
    handleCouponRemoveClick: function handleCouponRemoveClick(event) {
      event.preventDefault();
      var self = this,
        btn = $(event.currentTarget),
        couponCode = btn.attr('data-coupon');
      this.removeCoupon(self, couponCode);
    }
  };
  merchant_upsells.init();
});