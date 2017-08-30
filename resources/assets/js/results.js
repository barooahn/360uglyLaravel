$('.pebble-img').click(function(event) {
    event.preventDefault();
    // var pebble = '<div class="loader"><div class="spinner"><div class="dot1"></div><div class="dot2"></div></div><p>Loading</p></div><div class="pebble amazon-container"></div>';
    //
    // $('.splash-fullscreen-pebble').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow');
    // $('.pebble-container').append(pebble);
    // $('.pebble-img').animate({opacity: 0}, 'slow');
    // $('.pebble-img').remove();

    var framespebble;
    var framespebble = SpriteSpin.sourceArray('/images/pebble/DSC_{frame}.jpg', {
        frame: [37, 77],
        digits: 4
    });

    var widthpebble = $('.pebble-img').width() - 10;
    var heightpebble = widthpebble * 0.8;
    var spinpebble = $('.pebble-img');
    // initialise spritespin
    $(document).ready(function() {
        spinpebble.spritespin({
            source: framespebble,
            width: widthpebble,
            height: heightpebble,
            frameTime: 80,
            animate:true,
            onInit : function(p){$('.loader').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
            onLoad : function(p){$('.loader').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
            scrollThreshold:150
        })
    });

    // initialise spritespin
    $('.spinpebble').on('touchstart click', function() {
        spinpebble.spritespin('api').toggleAnimation();
    });

    $('.splash-fullscreen-pebble').click(function(e){
        spinpebble.spritespin('api').requestFullscreen();
    });
});