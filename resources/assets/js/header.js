//uglyman

var framesuglyman;
var framesuglyman = SpriteSpin.sourceArray('images/ugly_splash/JPEG/DSC_{frame}.jpg', {
    frame: [66, 108],
    digits: 4
});

var widthuglyman = $('.uglyman').width() - 10;
var heightuglyman = widthuglyman * 1.5;


var spinuglyman = $('.uglyman');
// initialise spritespin
spinuglyman.spritespin({
      source: framesuglyman,
        width: widthuglyman,
        height: heightuglyman,
        frameTime: 80
});
spinuglyman.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});