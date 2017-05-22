var frames = SpriteSpin.sourceArray('Example00020002/Example00020002{frame}.jpg', {
    frame: [0, 59],
    digits: 2
});

var width = $('.Example00020002').width() - 10;
var height = width / 1.5;
var spin = $('.Example00020002');
// initialise spritespin
spin.spritespin({
      source: frames,
        width: width,
        height: height,
        frameTime: 120
});
spin.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});