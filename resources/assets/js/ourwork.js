
// big-flowers
var bigflowers = '<div class="loader"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div><p>Loading</p></div><div class="big-flowers amazon-container"></div>';
$('.big-flowers-img').click(function(event) {
    event.preventDefault();

    $('.big-flowers-container').append(bigflowers);
    $('.big-flowers-img').animate({opacity: 0}, 'slow');
    $('.big-flowers-img').remove();

    var framesflowers;
    var framesflowers = SpriteSpin.sourceArray('/images/big-flowers/DSC_{frame}.jpg', {
        frame: [159, 203],
        digits: 4
    });

    var widthflowers = 120;
    var heightflowers = 180;
    var spinflowers = $('.big-flowers');
    // initialise spritespin
    spinflowers.spritespin({
          source: framesflowers,
            width: widthflowers,
            height: heightflowers,
            frameTime: 80,
            animate:true,
            onInit : function(p){$('.loader').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
            onLoad : function(p){$('.loader').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
            scrollThreshold:150
    })        

    $('.splash-fullscreen-bigflowers').click(function(e){
        spinflowers.spritespin('api').requestFullscreen();
    });

    // initialise spritespin
    $('.spinflowers').on('touchstart click', function() {
        spinflowers.spritespin('api').toggleAnimation();
    });

});


// book

var book = '<div class="loader"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div><p>Loading</p></div><div class="book amazon-container"></div>';
$('.book-img').click(function(event) {
    event.preventDefault();

    $('.book-container').append(book);
    $('.book-img').animate({opacity: 0}, 'slow');
    $('.book-img').remove();

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
                animate:true,
                onInit : function(p){$('.loader').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
                onLoad : function(p){$('.loader').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
                scrollThreshold:150
        })        
    });

        // initialise spritespin
    $('.spinbook').on('touchstart click', function() {
        spinbook.spritespin('api').toggleAnimation();
    });

    $('.splash-fullscreen-book').click(function(e){
        spinbook.spritespin('api').requestFullscreen();
    });
});

// flowers3

var flowers3 = '<div class="loader"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div><p>Loading</p></div><div class="flowers3 amazon-container"></div>';
$('.flowers3-img').click(function(event) {
    event.preventDefault();

        $('.flowers3-container').append(flowers3);
        $('.flowers3-img').animate({opacity: 0}, 'slow');
        $('.flowers3-img').remove();

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
                animate:true,
                onInit : function(p){$('.loader').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
                onLoad : function(p){$('.loader').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
                scrollThreshold:150
        })        
    });

        // initialise spritespin
    $('.spinflowers3').on('touchstart click', function() {
        spinflowers3.spritespin('api').toggleAnimation();
    });

    $('.splash-fullscreen-flowers3').click(function(e){
        spinflowers3.spritespin('api').requestFullscreen();
    });
});

// uglyman2

var uglyman2 = '<div class="loader"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div><p>Loading</p></div><div class="uglyman2 amazon-container"></div>';
$('.uglyman2-img').click(function(event) {
    event.preventDefault();

        $('.uglyman2-container').append(uglyman2);
        $('.uglyman2-img').animate({opacity: 0}, 'slow');
        $('.uglyman2-img').remove();

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
                animate:true,
                onInit : function(p){$('.loader').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
                onLoad : function(p){$('.loader').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
                scrollThreshold:150
        })        
    });

        // initialise spritespin
    $('.spinuglyman2').on('touchstart click', function() {
        spinuglyman2.spritespin('api').toggleAnimation();
    });

    $('.splash-fullscreen-uglyman2').click(function(e){
        spinuglyman2.spritespin('api').requestFullscreen();
    });
});