var frames;
var frames = SpriteSpin.sourceArray('images/ugly_splash/JPEG/DSC_{frame}.jpg', {
    frame: [139, 183],
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

// big-flowers
var frames;
var frames = SpriteSpin.sourceArray('images/big-flowers/DSC_{frame}.jpg', {
    frame: [159, 203],
    digits: 4
});

var width = $('.big-flowers').width() - 10;
var height = width * 1.5;
var spin = $('.big-flowers');
// initialise spritespin
$(document).ready(function() {
    spin.spritespin({
          source: frames,
            width: width,
            height: height,
            frameTime: 80,
            animate:false
    })        
});

    // initialise spritespin
$('.spin').on('touchstart click', function() {
    spin.spritespin('api').toggleAnimation();
});

spin.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});

$('.full-screen').click(function(e){
    spin.spritespin('api').requestFullscreen();
});