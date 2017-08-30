//uglyman

var framesuglyman;
var framesuglyman = SpriteSpin.sourceArray('images/ugly_splash/JPEG/DSC_{frame}.jpg', {
    frame: [37, 77],
    digits: 4
});

var widthuglyman = $('.splash-container-uglyman').width()/2;

console.log('widthuglyman = ' + widthuglyman);
var heightuglyman = widthuglyman * 1.2;


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