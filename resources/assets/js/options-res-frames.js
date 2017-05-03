var frames = SpriteSpin.sourceArray('images/uglyman2_small/DSC_{frame}.jpg', {
    frame: [329, 371],
    digits: 4
});

var width = $('.uglymanLowRes').width() - 10;
var height = width / 1.5;
var spinLow = $('.uglymanLowRes');
// initialise spritespin
spinLow.spritespin({
      source: frames,
        width: width,
        height: height,
        frameTime: 120
});
spinLow.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});
$('.full-lowres').click(function(e){
    e.preventDefault();
    console.log('here');
    spinLow.spritespin('api').requestFullscreen();
});

var frames = SpriteSpin.sourceArray('images/uglymanHiRes/DSC_{frame}.jpg', {
    frame: [402, 446],
    digits: 4
});

var width = $('.uglymanHiRes').width() - 10;
var height = width / 1.5;
var spin = $('.uglymanHiRes');
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
$('.full-hires').click(function(e){
    e.preventDefault();
    console.log('here');
    spin.spritespin('api').requestFullscreen();
});