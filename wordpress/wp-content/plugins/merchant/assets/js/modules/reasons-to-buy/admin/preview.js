"use strict";

(function ($) {
  'use strict';

  var _ref = merchant || {},
    icons = _ref.icons;
  var moduleSelector = '.merchant-flexible-content-control.reasons-to-buy-style';

  // Page load
  $(document).on('ready', function () {
    $("".concat(moduleSelector, " .merchant-flexible-content .layout:first")).addClass('active');
    initPreview();
  });

  // Current layout
  $(document).on('click', "".concat(moduleSelector, " .merchant-flexible-content .layout"), function () {
    var $this = $(this);
    $this.closest(moduleSelector).find('.layout').removeClass('active');
    $this.addClass('active');
    initPreview();
  });

  // When a new item is added
  $(document).on('merchant-flexible-content-added', function (e, $layout) {
    $(moduleSelector).find('.layout').removeClass('active');
    $layout.addClass('active');
    initPreview();
  });

  // Change in sortable fields
  $(document).on('sortable.repeater.change', function (e) {
    initPreview();
  });

  // Value change in a field
  $(document).on('change.merchant keyup', function (e) {
    if ($(e.target).hasClass('repeater-input')) {
      // Other function handle this
      return;
    }
    initPreview();
  });

  // Value change in sortable field
  $(document).on('input', '.repeater-input', function () {
    var index = $(this).closest('.repeater').attr('data-index');
    var itemPreview = $(".merchant-reasons-list-item[data-index=".concat(index, "]")).find('.merchant-reasons-list-item-text');
    if (itemPreview.length) {
      itemPreview.text($(this).val());
    }
  });
  function initPreview() {
    var $layout = $(moduleSelector).find('.layout.active');
    var $previewBox = $('.merchant-reasons-list-preview').find('.merchant-reasons-list');

    // Title
    var titleText = $layout.find('.merchant-field-title input').val();
    var titleColor = $layout.find('.merchant-field-title_color input').val();
    $previewBox.find('.merchant-reasons-list-title').text(titleText).css({
      color: titleColor
    });

    // Items
    var listItems = [];
    try {
      listItems = JSON.parse($layout.find('.merchant-sortable-repeater-input').val());
    } catch (e) {
      listItems = [];
    }
    var itemsColor = $layout.find('.merchant-field-items_color input').val();
    var iconsColor = $layout.find('.merchant-field-icon_color input').val();
    var spacing = $layout.find('.merchant-field-spacing input').val();

    // Remove existing items
    $previewBox.find('.merchant-reasons-list-item').remove();

    // Append items
    listItems.forEach(function (value, index) {
      var $listItem = $("<div class=\"merchant-reasons-list-item\" data-index=\"".concat(index, "\" style=\"margin-top: ").concat(spacing, "px\"></div>"));
      var text = "<p class=\"merchant-reasons-list-item-text\" style=\"color: ".concat(itemsColor, "\">").concat(value, "</p>");
      var isIconEnabled = $layout.find('.merchant-field-display_icon input').is(':checked');
      var iconHtml = '';
      if (isIconEnabled) {
        var icon = $layout.find('.merchant-field-icon .merchant-choices-icon input:checked').val();
        if (icon) {
          iconHtml = "<div class=\"merchant-reasons-list-item-icon\" style=\"color: ".concat(iconsColor, "\">").concat(icons[icon] || '', "</div>");
        }
      }

      // Append content in the list item
      $listItem.append(iconHtml).append(text);

      // Append list item in the previewBox
      $previewBox.append($listItem);
    });

    // Update index
    $layout.find('.merchant-sortable-repeater .repeater').each(function (index) {
      $(this).attr('data-index', index);
    });
  }
})(jQuery);