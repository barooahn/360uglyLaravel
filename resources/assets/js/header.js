var frames;
var frames = SpriteSpin.sourceArray('images/ugly_splash/JPEG/DSC_{frame}.jpg', {
    frame: [78, 122],
    digits: 4
});

var width = $('.uglyman').width() - 10;
var height = width / 1.5;
var spin = $('.uglyman');
// initialise spritespin
spin.spritespin({
      source: frames,
        width: width,
        height: height,
        frameTime: 80
});
spin.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});