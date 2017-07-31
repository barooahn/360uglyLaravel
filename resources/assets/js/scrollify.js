//fullpage scroll

$.scrollify({
    easing: "easeOutExpo",
    scrollSpeed: 1100,
    offset : -50,
    scrollbars: false,
    standardScrollElements: "",
    setHeights: false,
    overflowScroll: true,
    updateHash: true,
    touchScroll:false,
    before:function() {
        if($.scrollify.current().attr('id') !== 'home'){
            console.log('not home');
            $('.arrow').css('display', 'none');
        }
    }
});

$(function() {
  $.scrollify({
    section : "section",
  });
});