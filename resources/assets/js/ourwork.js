
// big-flowers
var bigflowers = '<div class="loader"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div><p>Loading</p></div><div class="big-flowers amazon-container"></div>';
$('.big-flowers-img').click(function(event) {
    event.preventDefault();

    $('.big-flowers-container').append(bigflowers);
    $('.big-flowers-img').animate({opacity: 0}, 'slow');
    $('.big-flowers-img').remove();

    var framesflowers;
    var framesflowers = SpriteSpin.sourceArray('/images/big-flowers/DSC_{frame}.jpg', {
        frame: [81, 110],
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


// sunglasses

var sunglasses = '<div class="loader"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div><p>Loading</p></div><div class="sunglasses amazon-container"></div>';
$('.sunglasses-img').click(function(event) {
    event.preventDefault();

    $('.sunglasses-container').append(sunglasses);
    $('.sunglasses-img').animate({opacity: 0}, 'slow');
    $('.sunglasses-img').remove();

    var framessunglasses;
    var framessunglasses = SpriteSpin.sourceArray('/images/sunglasses/DSC_{frame}.jpg', {
        frame: [39, 78],
        digits: 4
    });

    var widthsunglasses = $('.sunglasses').width() - 10;
    var heightsunglasses = widthsunglasses / 1.1;
    var spinsunglasses = $('.sunglasses');
    // initialise spritespin
    $(document).ready(function() {
        spinsunglasses.spritespin({
              source: framessunglasses,
                width: widthsunglasses,
                height: heightsunglasses,
                frameTime: 80,
                animate:true,
                onInit : function(p){$('.loader').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
                onLoad : function(p){$('.loader').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
                scrollThreshold:150
        })        
    });

        // initialise spritespin
    $('.spinsunglasses').on('touchstart click', function() {
        spinsunglasses.spritespin('api').toggleAnimation();
    });

    $('.splash-fullscreen-sunglasses').click(function(e){
        spinsunglasses.spritespin('api').requestFullscreen();
    });
});

// glasses

var glasses = '<div class="loader"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div><p>Loading</p></div><div class="glasses amazon-container"></div>';
$('.glasses-img').click(function(event) {
    event.preventDefault();

    $('.glasses-container').append(glasses);
    $('.glasses-img').animate({opacity: 0}, 'slow');
    $('.glasses-img').remove();

    var framesglasses;
    var framesglasses = SpriteSpin.sourceArray('/images/glasses/DSC_{frame}.jpg', {
        frame: [117, 155],
        digits: 4
    });

    var widthglasses = $('.glasses').width() - 10;
    var heightglasses = widthglasses / 1.3;
    var spinglasses = $('.glasses');
    // initialise spritespin
    $(document).ready(function() {
        spinglasses.spritespin({
              source: framesglasses,
                width: widthglasses,
                height: heightglasses,
                frameTime: 80,
                animate:true,
                onInit : function(p){$('.loader').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
                onLoad : function(p){$('.loader').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
                scrollThreshold:150
        })        
    });

        // initialise spritespin
    $('.spinglasses').on('touchstart click', function() {
        spinglasses.spritespin('api').toggleAnimation();
    });

    $('.splash-fullscreen-glasses').click(function(e){
        spinglasses.spritespin('api').requestFullscreen();
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
    var heightflowers3 = widthflowers3 * 0.8;
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
    var heightuglyman2 = widthuglyman2 ;
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