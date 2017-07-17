var is_touch_device = ("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch;
$(function () {
  $('[data-toggle="popover"]').popover({ trigger: is_touch_device ? "hover focus" : "hover click focus" });
});