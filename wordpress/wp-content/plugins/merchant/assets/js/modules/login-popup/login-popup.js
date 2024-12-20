'use strict';

var merchant = merchant || {};
merchant.modules = merchant.modules || {};
(function ($) {
  merchant.modules.loginPopups = {
    init: function init() {
      // Remove required attribute from inputs as it prevents saving options in module's dashboard.
      if (merchant !== null && merchant !== void 0 && merchant.is_admin) {
        $('.merchant-module-page-preview input').removeAttr('required');
      }
      var $body = $('body');
      var $toggle = $('.merchant-login-popup-toggle');
      if (!$toggle.length) {
        return;
      }
      var $popupBody = $('.merchant-login-popup-body');

      // Show login popup
      $toggle.on('click', function (e) {
        e.preventDefault();
        $body.toggleClass('merchant-login-popup-show');
        if (!$popupBody.hasClass('merchant-show')) {
          setTimeout(function () {
            return $popupBody.addClass('merchant-show');
          }, 200);
        } else {
          $popupBody.removeClass('merchant-show');
        }
      });
      var $footerToggle = $('.merchant-login-popup-footer a');
      var $content = $('.merchant-login-popup-content');

      // Toggle Login/Register form
      if ($footerToggle.length) {
        var flag = true;
        $footerToggle.on('click', function (e) {
          e.preventDefault();
          $(this).parent().toggleClass('merchant-show').siblings().toggleClass('merchant-show');

          // Toggle visibility of columns based on the current state of `flag`
          if (flag) {
            $content.find('.col-1').hide();
            $content.find('.col-2').show();
          } else {
            $content.find('.col-1').show();
            $content.find('.col-2').hide();
          }

          // Flip the visibility flag for the next click
          flag = !flag;
        });
      }

      // AJAX login/register
      $(document).on('submit', '.merchant-login-popup .woocommerce-form', function (e) {
        e.preventDefault();
        var _ref = (merchant === null || merchant === void 0 ? void 0 : merchant.setting) || {},
          nonce = _ref.nonce,
          ajax_url = _ref.ajax_url;
        if (!ajax_url || !nonce) {
          return;
        }
        var $form = $(this);
        var isLogin = $form.hasClass('woocommerce-form-login');
        var data = {
          action: 'merchant_ajax_login_register',
          form: isLogin ? 'login' : 'register',
          username: $form.find('input[name="username"]').val(),
          password: $form.find('input[name="password"]').val(),
          email: $form.find('input[name="email"]').val(),
          remember: $form.find('input[name="rememberme"]').is(':checked'),
          nonce: nonce
        };
        $.ajax({
          type: 'POST',
          url: ajax_url,
          data: data,
          beforeSend: function beforeSend(e) {
            $form.find('button[type="submit"]').prop('disabled', true);
            $form.block({
              message: null,
              overlayCSS: {
                background: '#fff',
                opacity: 0.6
              }
            });
          },
          success: function success(response) {
            var $noticeWrapper = $content.find('.woocommerce-notices-wrapper');
            if ($noticeWrapper.length) {
              $noticeWrapper.fadeOut(200, function () {
                var _response$data;
                $(this).empty().append((_response$data = response.data) === null || _response$data === void 0 ? void 0 : _response$data.notice).fadeIn(200, function () {
                  $popupBody.animate({
                    scrollTop: 0
                  }, 200);
                });
              });
            }
            if (response !== null && response !== void 0 && response.success) {
              // Remove Register from after successful login/register.
              $popupBody.find('.u-column2').remove();
              if (isLogin) {
                // window.location.href = response.redirect_url;
                setTimeout(function () {
                  return window.location.reload();
                }, 300);
              }
            }
          },
          error: function error(_error) {
            console.log(_error);
          },
          complete: function complete() {
            $form.unblock().find('button[type="submit"]').prop('disabled', false);
          }
        });
      });
    }
  };
  $(document).ready(function () {
    merchant.modules.loginPopups.init();
  });
})(jQuery);