var framesArray = {
    clown: {
        path: 'images/clown/DSC_{frame}.jpg',
        start: 2926,
        end: 2970,
        digits: 4
    },
    gamepad: {
        path: 'images/gamepad/DSC_{frame}.jpg',
        start: 197,
        end: 240,
        digits: 4
    },
    pebble: {
        path: 'images/pebble/DSC_{frame}.jpg',
        start: 37,
        end: 77,
        digits: 4
    },
    baji: {
        path: 'images/baji/DSC_{frame}.jpg',
        start: 41,
        end: 79,
        digits: 4
    },
}

$(".rollover-modal").click(function(e) {
    e.preventDefault();
    var width = $(window).width()-50;
    var id360 = $(this).attr("id");
    console.log("width = " + width);
    $(".modal-spin").addClass(id360);
    var frames = SpriteSpin.sourceArray(framesArray[id360]['path'], {
        frame: [framesArray[id360]['start'], framesArray[id360]['end']],
        digits: framesArray[id360]['digits']
    });
    var spin = $('.' + id360);
    // initialise spritespin
    $('.full-screen').click(function(e){
        spin.spritespin('api').requestFullscreen();
    });

    $('.zoom').click(function(e){
        spin.spritespin('api').toggleZoom();
    });

    spin.spritespin({
        source: frames,
        width: width,
        height: 334,
        sense: 2,
        sizeMode: 'fit',
        scrollThreshold: 500,
        frameTime: 80, // Time in ms between updates. 40 is exactly 25 FPS
        detectSubsampling: false,
        animate: true,
        onInit : function(p){$('.loader-splash').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
        mods: [
        // change frame on mouse move
        'drag',
        // enable zoom module
        // toggle zoom with double click or use the API object
        // display module
        '360'
      ]
    });
    spin.bind("onLoad", function() {
        $('.loader').css({
            opacity: 1,
            display: "none"
        }).animate({
            opacity: 0
        }, 'slow');
    });
    $("#360Modal").modal();
    $('#360Modal').on('hidden.bs.modal', function() {
        spin.spritespin("destroy");
        console.log('destroyed');
    });
});
