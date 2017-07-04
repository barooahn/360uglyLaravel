// big-flowers
var framesflowers;
var framesflowers = SpriteSpin.sourceArray('/images/big-flowers/DSC_{frame}.jpg', {
    frame: [159, 203],
    digits: 4
});

var widthflowers = $('.big-flowers').width();
var heightflowers = widthflowers * 1.5;
var spinflowers = $('.big-flowers');
// initialise spritespin
$(document).ready(function() {
    spinflowers.spritespin({
          source: framesflowers,
            width: widthflowers,
            height: heightflowers,
            frameTime: 80,
            animate:false
    })        
});

    // initialise spritespin
$('.spinflowers').on('touchstart click', function() {
    spinflowers.spritespin('api').toggleAnimation();
});

spinflowers.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});

$('.splash-fullscreen-bigflowers').click(function(e){
    spinflowers.spritespin('api').requestFullscreen();
});

// book
var framesbook;
var framesbook = SpriteSpin.sourceArray('/images/book/DSC_{frame}.jpg', {
    frame: [805, 849],
    digits: 4
});

var widthbook = $('.book').width() - 10;
var heightbook = widthbook / 1.5;
var spinbook = $('.book');
// initialise spritespin
$(document).ready(function() {
    spinbook.spritespin({
          source: framesbook,
            width: widthbook,
            height: heightbook,
            frameTime: 80,
            animate:false
    })        
});

    // initialise spritespin
$('.spinbook').on('touchstart click', function() {
    spinbook.spritespin('api').toggleAnimation();
});

spinbook.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});

$('.splash-fullscreen-book').click(function(e){
    spinbook.spritespin('api').requestFullscreen();
});

// flowers3
var framesflowers3;
var framesflowers3 = SpriteSpin.sourceArray('/images/flowers3/DSC_{frame}.jpg', {
    frame: [45, 89],
    digits: 4
});

var widthflowers3 = $('.flowers3').width() - 10;
var heightflowers3 = widthflowers3 / 1.5;
var spinflowers3 = $('.flowers3');
// initialise spritespin
$(document).ready(function() {
    spinflowers3.spritespin({
          source: framesflowers3,
            width: widthflowers3,
            height: heightflowers3,
            frameTime: 80,
            animate:false
    })        
});

    // initialise spritespin
$('.spinflowers3').on('touchstart click', function() {
    spinflowers3.spritespin('api').toggleAnimation();
});

spinflowers3.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});

$('.splash-fullscreen-flowers3').click(function(e){
    spinflowers3.spritespin('api').requestFullscreen();
});

// uglyman2
var framesuglyman2;
var framesuglyman2 = SpriteSpin.sourceArray('/images/uglyman2/DSC_{frame}.jpg', {
    frame: [13, 56],
    digits: 4
});

var widthuglyman2 = $('.uglyman2').width() - 10;
var heightuglyman2 = widthuglyman2 / 1.5;
var spinuglyman2 = $('.uglyman2');
// initialise spritespin
$(document).ready(function() {
    spinuglyman2.spritespin({
          source: framesuglyman2,
            width: widthuglyman2,
            height: heightuglyman2,
            frameTime: 80,
            animate:false
    })        
});

    // initialise spritespin
$('.spinuglyman2').on('touchstart click', function() {
    spinuglyman2.spritespin('api').toggleAnimation();
});

spinuglyman2.bind("onLoad", function() {
    $('.loader').css({
        opacity: 1,
        display: "none"
    }).animate({
        opacity: 0
    }, 'slow');
});

$('.splash-fullscreen-uglyman2').click(function(e){
    spinuglyman2.spritespin('api').requestFullscreen();
});