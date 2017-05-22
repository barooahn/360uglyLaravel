var frames = SpriteSpin.sourceArray('Tiin00010001/Tiin00010001{frame}.jpg', {
    frame: [0, 59],
    digits: 2
});

var width = $('.Tiin00010001').width() - 10;
var height = width / 1.5;
var spin = $('.Tiin00010001');
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