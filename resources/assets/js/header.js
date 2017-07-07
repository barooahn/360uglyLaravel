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
        onInit : function(p){$('.loader-splash').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
        onLoad : function(p){$('.loader-splash').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
        frameTime: 80,
        scrollThreshold:0
});



