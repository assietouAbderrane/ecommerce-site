"use strict";

function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t.return && (u = t.return(), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t.return || t.return(); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
;
(function ($, window, document, undefined) {
  'use strict';

  $(document).ready(function ($) {
    new CountDownTimer($);
  });
})(jQuery, window, document);
var defaultStyles = {
  classic: {
    labelsColor: '',
    digitsColor: '#444444',
    digitsBackground: '',
    borderColor: '',
    fontSizeDigits: 16,
    fontSizeLabels: 16
  },
  progress: {
    labelsColor: '',
    digitsColor: '#3858E9',
    digitsBackground: '#3858E9',
    borderColor: '',
    progressColor: '#3858E9',
    fontSizeDigits: 16,
    fontSizeLabels: 16
  },
  circles: {
    labelsColor: '#7C7C7C',
    digitsColor: '#000',
    digitsBackground: '#fff',
    borderColor: '#444444',
    progressColor: '#3858E9',
    fontSizeDigits: 22,
    fontSizeLabels: 10,
    width: 80,
    height: 80
  },
  squares: {
    labelsColor: '#180B40',
    digitsColor: '#000',
    digitsBackground: '#fff',
    borderColor: '#000000',
    fontSizeDigits: 28,
    fontSizeLabels: 12,
    width: 65,
    height: 65
  },
  minimalist: {
    labelsColor: '#7C7C7C',
    digitsColor: '#000000',
    digitsBackground: '#F6F7F7',
    borderColor: '',
    fontSizeDigits: 40,
    fontSizeLabels: 12,
    width: 80,
    height: 80
  },
  cards: {
    labelsColor: '#3858E9',
    digitsColor: '#3858E9',
    digitsBackground: '#E0E2EC',
    borderColor: '#000000',
    fontSizeDigits: 40,
    fontSizeLabels: 12,
    width: 80,
    height: 80
  },
  modern: {
    labelsColor: '#180B40',
    digitsColor: '#fff',
    digitsBackground: '#180B40',
    borderColor: '',
    fontSizeDigits: 36,
    fontSizeLabels: 12,
    width: 80,
    height: 95
  }
};
var CountDownTimer = /*#__PURE__*/function () {
  function CountDownTimer($) {
    var _merchant;
    _classCallCheck(this, CountDownTimer);
    this.countDownWrapper = $('.merchant-countdown-timer');
    this.countDownTimer = this.countDownWrapper.find('.merchant-countdown-timer-countdown');
    if (!this.countDownTimer.length) {
      return;
    }
    this.total;
    this.days;
    this.hours;
    this.minutes;
    this.seconds;
    this.currentTimeInitial = this.getCurrentTime();
    this.theme = this.countDownWrapper.attr('data-theme');
    this.timerType = this.countDownWrapper.attr('data-countdown-type');
    this.startDate = new Date(this.countDownWrapper.attr('data-start-date') || null);
    this.endDate = new Date(this.countDownWrapper.attr('data-end-date') || null);
    this.startTime = this.startDate.getTime();
    this.endTime = this.endDate.getTime();
    this.minExpiration = parseInt(this.countDownWrapper.attr('data-min-expiration'));
    this.maxExpiration = parseInt(this.countDownWrapper.attr('data-max-expiration'));
    this.offPeriod = parseInt(this.countDownWrapper.attr('data-off-period'));
    this.timerCookie = 'merchant_countdown_timer';
    this.timerOffPeriodCookie = 'merchant_countdown_timer_off_period';
    this.variationsDates = this.countDownWrapper.attr('data-variations-dates');
    this.variationsDates = this.variationsDates ? JSON.parse(this.variationsDates) : [];
    this.flipTimerKeys = {
      days: {
        value: '',
        currentValue: ''
      },
      hours: {
        value: '',
        currentValue: ''
      },
      minutes: {
        value: '',
        currentValue: ''
      },
      seconds: {
        value: '',
        currentValue: ''
      }
    };

    // Clear cookie page load on admin
    if ((_merchant = merchant) !== null && _merchant !== void 0 && _merchant.is_admin) {
      this.deleteCookie(this.timerCookie);
      this.deleteCookie(this.timerOffPeriodCookie);
    }
    this.init();
  }
  return _createClass(CountDownTimer, [{
    key: "init",
    value: function init() {
      this.buildTimerMarkup();
      this.setTimerData();
      this.startTimer();
      this.events();
    }
  }, {
    key: "events",
    value: function events() {
      this.updateVariationTimer();
      this.updateAdminPreview();
    }
  }, {
    key: "buildTimerMarkup",
    value: function buildTimerMarkup() {
      var countDownEl;
      if (['classic', 'progress'].includes(this.theme)) {
        countDownEl = "<span></span>";
      } else if (this.theme === 'circles') {
        countDownEl = "\n                <div class=\"cd-days\">\n                    <svg class=\"cd-svg\">\n                        <circle class=\"circle-static\" r=\"47%\" cx=\"50%\" cy=\"50%\"></circle>\n                        <circle class=\"circle-dynamic\" r=\"47%\" cx=\"50%\" cy=\"50%\"></circle>\n                    </svg>\n                    <div>\n                        <span class=\"cd-value\">00</span>\n                        <span class=\"cd-label\">Days</span>\n                    </div>\n                </div>\n                <div class=\"cd-hours\">\n                    <svg class=\"cd-svg\">\n                        <circle class=\"circle-static\" r=\"47%\" cx=\"50%\" cy=\"50%\"></circle>\n                        <circle class=\"circle-dynamic\" r=\"47%\" cx=\"50%\" cy=\"50%\"></circle>\n                    </svg>\n                    <div>\n                        <span class=\"cd-value\">00</span>\n                        <span class=\"cd-label\">Hours</span>\n                    </div>\n                </div>\n                <div class=\"cd-minutes\">\n                    <svg class=\"cd-svg\">\n                        <circle class=\"circle-static\" r=\"47%\" cx=\"50%\" cy=\"50%\"></circle>\n                        <circle class=\"circle-dynamic\" r=\"47%\" cx=\"50%\" cy=\"50%\"></circle>\n                    </svg>\n                    <div>\n                        <span class=\"cd-value\">00</span>\n                        <span class=\"cd-label\">Minutes</span>\n                    </div>\n                </div>\n                <div class=\"cd-seconds\">\n                    <svg class=\"cd-svg\">\n                        <circle class=\"circle-static\" r=\"47%\" cx=\"50%\" cy=\"50%\"></circle>\n                        <circle class=\"circle-dynamic\" r=\"47%\" cx=\"50%\" cy=\"50%\"></circle>\n                    </svg>\n                    <div>\n                        <span class=\"cd-value\">00</span>\n                        <span class=\"cd-label\">Seconds</span>\n                    </div>\n                </div>\n            ";
      } else if (this.theme === 'modern') {
        countDownEl = "\n                <div class=\"cd-flip\">\n                    <div class=\"cd-flip-card cd-days\">\n                        <div class=\"cd-flip-card-wrapper\">\n                            <div class=\"cd-flip-card-inner\">\n                                <span class=\"cd-flip-card-top cd-value\">00</span>\n                                <span class=\"cd-flip-card-back\" data-time=\"00\">\n                                    <span class=\"cd-flip-card-bottom\" data-time=\"00\"></span>\n                                </span>\n                            </div>\n                        </div>\n                        <span class=\"cd-flip-clock-label cd-label\">Days</span>\n                    </div>\n\n                    <div class=\"cd-flip-card cd-hours\">\n                        <div class=\"cd-flip-card-wrapper\">\n                            <div class=\"cd-flip-card-inner\">\n                                <span class=\"cd-flip-card-top cd-value\">00</span>\n                                <span class=\"cd-flip-card-back\" data-time=\"00\">\n                                    <span class=\"cd-flip-card-bottom\" data-time=\"00\"></span>\n                                </span>\n                            </div>\n                        </div>\n                        <span class=\"cd-flip-clock-label cd-label\">Hours</span>\n                    </div>\n\n                    <div class=\"cd-flip-card cd-minutes\">\n                        <div class=\"cd-flip-card-wrapper\">\n                            <div class=\"cd-flip-card-inner\">\n                                <span class=\"cd-flip-card-top cd-value\">00</span>\n                                <span class=\"cd-flip-card-back\" data-time=\"00\">\n                                    <span class=\"cd-flip-card-bottom\" data-time=\"00\"></span>\n                                </span>\n                            </div>\n                        </div>\n                        <span class=\"cd-flip-clock-label cd-label\">Minutes</span>\n                    </div>\n                    \n                    <div class=\"cd-flip-card cd-seconds\">\n                        <div class=\"cd-flip-card-wrapper\">\n                            <div class=\"cd-flip-card-inner\">\n                                <span class=\"cd-flip-card-top cd-value\">00</span>\n                                <span class=\"cd-flip-card-back\" data-time=\"00\">\n                                    <span class=\"cd-flip-card-bottom\" data-time=\"00\"></span>\n                                </span>\n                            </div>\n                        </div>\n                        <span class=\"cd-flip-clock-label cd-label\">Seconds</span>\n                    </div>\n\n                </div>\n            ";
      } else {
        countDownEl = "\n                <div class=\"cd-days\">\n                    <span class=\"cd-value\" data-time=\"00\">00</span>\n                    <span class=\"cd-label\">Days</span>\n                </div>\n                <div class=\"cd-hours\">\n                    <span class=\"cd-value\" data-time=\"00\">00</span>\n                    <span class=\"cd-label\" data-time=\"\">Hours</span>\n                </div>\n                <div class=\"cd-minutes\">\n                    <span class=\"cd-value\" data-time=\"00\">00</span>\n                    <span class=\"cd-label\">Minutes</span>\n                </div>\n                <div class=\"cd-seconds\">\n                    <span class=\"cd-value\" data-time=\"00\">00</span>\n                    <span class=\"cd-label\">Seconds</span>\n                </div>\n            ";
      }
      this.countDownWrapper.find('.cd-progress').remove();

      // Add the timer
      this.countDownTimer.html(countDownEl);
      if (this.theme === 'progress') {
        jQuery('<progress class="cd-progress" value="0" max="100"></progress>').insertBefore(this.countDownTimer);
      }
    }
  }, {
    key: "setTimerData",
    value: function setTimerData() {
      if (this.timerType === 'sale-dates') {
        this.endTime = this.endDate.getTime();
      } else if (this.timerType === 'evergreen') {
        // Get data from cookie
        var cookieTimer = this.getCookie(this.timerCookie);
        var cookieOffPeriod = this.getCookie(this.timerOffPeriodCookie);
        var randomTimeInSeconds = this.getRandomValueForCountDown(this.minExpiration, this.maxExpiration);
        var timeInMilliseconds = randomTimeInSeconds * 1000;
        var futureTime = this.getCurrentTime() + timeInMilliseconds;
        var futureDate = new Date(futureTime);
        var offPeriodMilliseconds = futureTime + this.offPeriod * 1000;

        // If off-period found in cookie but not the timer, means countdown was finished and now it's off-period time.
        // So don't start the countdown now.
        var startCountDown = !(!cookieTimer && cookieOffPeriod);

        // If no countdown started yet or off-period is finishes, start the countdown
        if (startCountDown) {
          if (!cookieTimer) {
            this.setCookie(this.timerCookie, futureDate, futureTime);
            this.setCookie(this.timerOffPeriodCookie, this.offPeriod, offPeriodMilliseconds);
            this.endTime = futureDate.getTime();
          } else {
            // If cookie found
            this.endTime = new Date(cookieTimer).getTime();
            if (!cookieOffPeriod) {
              this.setCookie(this.timerOffPeriodCookie, this.offPeriod, offPeriodMilliseconds);
            }
          }
        } else {
          this.endTime = 0;
          this.displayTimer(0);
        }
      }
    }
  }, {
    key: "startTimer",
    value: function startTimer() {
      var remaining = this.getRemainingTime();
      if (remaining) {
        this.displayTimer(remaining, this.timerEnd);
      } else {
        this.timerEnd();
      }
      if (this.theme === 'circles') {
        this.progressCircles();
      } else if (this.theme === 'progress') {
        this.progressBar();
      }
    }
  }, {
    key: "displayTimer",
    value: function displayTimer(timeLeftInMilliseconds, timerEndCallback) {
      timerEndCallback = timerEndCallback || function () {};
      var classicOrProgress = ['classic', 'progress'].includes(this.theme);
      this.days = Math.floor(timeLeftInMilliseconds / (1000 * 60 * 60 * 24));
      this.days = classicOrProgress ? this.days : this.days.toString().padStart(2, '0');
      this.hours = Math.floor(timeLeftInMilliseconds % (1000 * 60 * 60 * 24) / (1000 * 60 * 60)).toString().padStart(2, '0');
      this.minutes = Math.floor(timeLeftInMilliseconds % (1000 * 60 * 60) / (1000 * 60)).toString().padStart(2, '0');
      this.seconds = Math.floor(timeLeftInMilliseconds % (1000 * 60) / 1000).toString().padStart(2, '0');
      if (classicOrProgress) {
        this.countDownTimer.find('span').html("".concat(this.days, " <span>days ").concat(this.theme === 'progress' ? ' : ' : '', " </span> ").concat(this.hours, ":").concat(this.minutes, ":").concat(this.seconds));
      } else if (this.theme === 'modern') {
        this.flipTimer();
      } else {
        this.countDownTimer.find('.cd-days .cd-value').html(this.days).attr('data-time', this.days);
        this.countDownTimer.find('.cd-hours .cd-value').html(this.hours).attr('data-time', this.hours);
        this.countDownTimer.find('.cd-minutes .cd-value').html(this.minutes).attr('data-time', this.minutes);
        this.countDownTimer.find('.cd-seconds .cd-value').html(this.seconds).attr('data-time', this.seconds);
      }
      if (timeLeftInMilliseconds <= 0) {
        timerEndCallback.call(this);
      } else {
        this.countDownWrapper.show();
        setTimeout(this.startTimer.bind(this), 1000);
      }
    }
  }, {
    key: "timerEnd",
    value: function timerEnd() {
      var _merchant2;
      // Keep showing the timer on admin even if countdown finishes
      (_merchant2 = merchant) !== null && _merchant2 !== void 0 && _merchant2.is_admin ? this.countDownWrapper.show() : this.countDownWrapper.hide();
      this.displayTimer(0);
      this.deleteCookie(this.timerCookie);
    }
  }, {
    key: "updateVariationTimer",
    value: function updateVariationTimer() {
      if (this.timerType !== 'sale-dates') {
        return;
      }
      var $ = jQuery;
      var self = this;
      $('input[name="variation_id"]').on('change', function () {
        var currentVariationId = parseInt($(this).val());
        if (currentVariationId && self.variationsDates.length) {
          var currentVariation = self.variationsDates.find(function (date) {
            return parseInt(date === null || date === void 0 ? void 0 : date.id) === currentVariationId;
          });
          var _ref = currentVariation || {},
            start = _ref.start,
            end = _ref.end;
          var startDate = _typeof(start) === 'object' ? start === null || start === void 0 ? void 0 : start.date : start;
          var endDate = _typeof(end) === 'object' ? end === null || end === void 0 ? void 0 : end.date : end;

          // Update global data
          self.startTime = startDate ? new Date(startDate).getTime() : 0;
          self.endTime = endDate ? new Date(endDate).getTime() : 0;
          self.displayTimer(0);
          self.startTimer();
        }
      });
    }
  }, {
    key: "flipTimer",
    value: function flipTimer() {
      var self = this;
      var $flipCards = this.countDownTimer.find('.cd-flip-card');
      $flipCards.each(function () {
        var $card = jQuery(this);
        var flipKey = '';
        Object.keys(self.flipTimerKeys).forEach(function (unit) {
          if ($card.hasClass('cd-' + unit)) {
            flipKey = unit;
            return false;
          }
        });
        var currentValue = self.flipTimerKeys[flipKey].currentValue;
        var newVal = self[flipKey];
        if (newVal !== currentValue) {
          var top = $card.find('.cd-flip-card-top');
          var back = $card.find('.cd-flip-card-back');
          var backBottom = $card.find('.cd-flip-card-back .cd-flip-card-bottom');
          if (currentValue >= 0) {
            back.attr('data-time', currentValue);
          }
          self.flipTimerKeys[flipKey].currentValue = newVal;
          top.html(newVal);
          backBottom.attr('data-time', newVal);
          $card.removeClass('cd-flipped');
          void $card[0].offsetWidth;
          $card.addClass('cd-flipped');
        }
      });
    }
  }, {
    key: "getCurrentTime",
    value: function getCurrentTime() {
      var time = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
      var date = new Date();
      return time ? date.getTime() : date;
    }
  }, {
    key: "getRemainingTime",
    value: function getRemainingTime() {
      var currentTime = this.getCurrentTime();
      if (this.startTime > currentTime || this.endTime < currentTime) {
        return 0;
      }
      return Math.max(this.endTime - currentTime, 0);
    }
  }, {
    key: "progressBar",
    value: function progressBar() {
      var currentTime = this.getCurrentTime();

      // Set start time to current time when page loads if not already defined.
      this.startTime = this.startTime || this.currentTimeInitial;
      this.total = this.endTime - this.startTime;
      var passedTime = currentTime - this.startTime;
      var passedTimePercent = passedTime / this.total * 100;
      var timeLeftPercent = 100 - passedTimePercent;
      var $progressBar = this.countDownWrapper.find('.cd-progress');
      if ($progressBar.length) {
        $progressBar.attr('value', Math.floor(timeLeftPercent));
      }
    }
  }, {
    key: "progressCircles",
    value: function progressCircles() {
      var circleWidth = parseInt(this.countDownWrapper.find('.merchant-countdown-timer-countdown').css('--merchant-digits-width'));
      var _seconds = 60;

      // 3 times circleWidth fits `stroke-dasharray` properly
      var strokeDasharray = parseInt(circleWidth) * 3;
      var getStrokeOffset = function getStrokeOffset(remainingSeconds) {
        var step = strokeDasharray / 60;
        return (_seconds - parseInt(remainingSeconds)) * step;
      };
      this.countDownTimer.find('.circle-dynamic').css('stroke-dasharray', strokeDasharray);
      var elements = {
        days: {
          $el: this.countDownTimer.find('.cd-days .circle-dynamic'),
          offset: getStrokeOffset(this.days)
        },
        hours: {
          $el: this.countDownTimer.find('.cd-hours .circle-dynamic'),
          offset: getStrokeOffset(this.hours)
        },
        minutes: {
          $el: this.countDownTimer.find('.cd-minutes .circle-dynamic'),
          offset: getStrokeOffset(this.minutes)
        },
        seconds: {
          $el: this.countDownTimer.find('.cd-seconds .circle-dynamic'),
          offset: getStrokeOffset(this.seconds)
        }
      };
      for (var key in elements) {
        if (Object.hasOwnProperty.call(elements, key)) {
          var _ref2 = elements[key] || {},
            $el = _ref2.$el,
            offset = _ref2.offset;
          if ($el.length) {
            $el.css('stroke-dashoffset', offset);
          }
        }
      }
    }
  }, {
    key: "setCookie",
    value: function setCookie(name, value, expiration) {
      var date = new Date(expiration);
      var expires = "expires=".concat(date.toUTCString());
      document.cookie = "".concat(name, "=").concat(value, ";").concat(expires, ";path=/");
    }
  }, {
    key: "getCookie",
    value: function getCookie(name) {
      var cookies = document.cookie.split(';');
      var _iterator = _createForOfIteratorHelper(cookies),
        _step;
      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var cookie = _step.value;
          var _cookie$trim$split = cookie.trim().split('='),
            _cookie$trim$split2 = _slicedToArray(_cookie$trim$split, 2),
            cookieName = _cookie$trim$split2[0],
            cookieValue = _cookie$trim$split2[1];
          if (cookieName === name) {
            return decodeURIComponent(cookieValue);
          }
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
      return null;
    }
  }, {
    key: "deleteCookie",
    value: function deleteCookie(name) {
      document.cookie = "".concat(name, "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;");
    }
  }, {
    key: "getRandomValueForCountDown",
    value: function getRandomValueForCountDown(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    // Admin preview
  }, {
    key: "updateAdminPreview",
    value: function updateAdminPreview() {
      var self = this;
      var $ = jQuery;

      // On save
      $(document).on('save.merchant', function (e, module) {
        if (module === 'countdown-timer') {
          self.deleteCookie(self.timerOffPeriodCookie);
        }
      });

      // On timer type select
      $(document).on('change', '.merchant-field-end_date select', function () {
        self.timerType = $(this).val();
        self.deleteCookie(self.timerCookie);
        self.deleteCookie(self.timerOffPeriodCookie);
        self.init();
      });

      // On theme select
      $(document).on('change', '.merchant-field-theme input', function () {
        self.theme = $('.merchant-field-theme input:checked').val();
        $('.merchant-field-theme input').each(function () {
          self.countDownWrapper.removeClass('merchant-countdown-timer-' + $(this).val());
        });

        // Add the class and update attr corresponding to the currently selected theme
        self.countDownWrapper.attr('data-theme', self.theme).addClass('merchant-countdown-timer-' + self.theme);

        // Re-build the timer
        self.buildTimerMarkup();

        // Change to default styles
        self.updateStyles();
      });

      // On date select
      $(document).on('change.merchant-datepicker', function (e, date, input) {
        if (!input) {
          return;
        }
        self.displayTimer(0);
        var name = input === null || input === void 0 ? void 0 : input.attr('name');

        // Update timer data
        if (name === 'merchant[sale_start_date]') {
          self.startTime = new Date(date);
        }
        if (name === 'merchant[sale_end_date]') {
          self.endTime = new Date(date);
        }

        // Hide
        self.countDownTimer.hide();

        // Start timer
        self.startTimer();

        // Show
        setTimeout(function () {
          return self.countDownTimer.show();
        }, 500);
      });

      // On evergreen fields change
      var timer = null;
      $(document).on('input', '.merchant-countdown-evergreen-field input', function () {
        self.displayTimer(0);
        clearTimeout(timer);
        timer = setTimeout(function () {
          var minDays = 0;
          var maxDays = 0;
          var minHours = 2;
          var maxHours = 26;
          var minMinutes = 0;
          var maxMinutes = 0;
          self.deleteCookie(self.timerCookie);
          self.deleteCookie(self.timerOffPeriodCookie);
          $('.merchant-countdown-evergreen-field input').each(function () {
            var name = $(this).attr('name');
            var value = +$(this).val();
            switch (name) {
              case 'merchant[min_expiration_deadline_days]':
                minDays = value;
                break;
              case 'merchant[max_expiration_deadline_days]':
                maxDays = value;
                break;
              case 'merchant[min_expiration_deadline]':
                minHours = value;
                break;
              case 'merchant[max_expiration_deadline]':
                maxHours = value;
                break;
              case 'merchant[min_expiration_deadline_minutes]':
                minMinutes = value;
                break;
              case 'merchant[max_expiration_deadline_minutes]':
                maxMinutes = value;
                break;
            }
          });
          self.minExpiration = minDays * 24 * 60 * 60 + minHours * 60 * 60 + minMinutes * 60;
          self.maxExpiration = maxDays * 24 * 60 * 60 + maxHours * 60 * 60 + maxMinutes * 60;
          self.setTimerData();
          self.startTimer();
        }, 500);
      });
      $(document).on('input', '.merchant-field-cool_off_period input', function () {
        self.clearOffPeriodCookie = true;
      });

      // On alignment change
      $(document).on('change', '.merchant-field-sale_ending_alignment select', function () {
        $(this).find('option').each(function () {
          self.countDownWrapper.removeClass('merchant-countdown-timer--' + $(this).val());
        });
        self.countDownWrapper.addClass('merchant-countdown-timer--' + $(this).val());
      });
    }
  }, {
    key: "updateStyles",
    value: function updateStyles() {
      var $ = jQuery;
      var properties = {
        'digits_font_size': 'fontSizeDigits',
        'labels_font_size': 'fontSizeLabels',
        'labels_color': 'labelsColor',
        'digits_color': 'digitsColor',
        'digits_background': 'digitsBackground',
        'progress_color': 'progressColor',
        'digits_border': 'borderColor',
        'digits_width': 'width',
        'digits_height': 'height'
      };
      for (var _i = 0, _Object$entries = Object.entries(properties); _i < _Object$entries.length; _i++) {
        var _defaultStyles$this$t;
        var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
          inputName = _Object$entries$_i[0],
          propertyName = _Object$entries$_i[1];
        var value = (_defaultStyles$this$t = defaultStyles[this.theme]) === null || _defaultStyles$this$t === void 0 ? void 0 : _defaultStyles$this$t[propertyName];
        if (value) {
          $("input[name=\"merchant[".concat(inputName, "]\"]")).val(value).attr('value', value).trigger('input').trigger('change');
        }
      }
    }
  }]);
}();