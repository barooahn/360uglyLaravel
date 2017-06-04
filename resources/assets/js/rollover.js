var framesArray = {
    elephant: {
        path: 'images/elephant/DSC_{frame}.jpg',
        start: 407,
        end: 437,
        digits: 4
    },
    flower2: {
        path: 'images/flower2/DSC_{frame}.jpg',
        start: 913,
        end: 956,
        digits: 4
    },
    fireTruck: {
        path: 'images/fireTruck/DSC_{frame}.jpg',
        start: 507,
        end: 536,
        digits: 4
    },
    baji: {
        path: 'images/baji/DSC_{frame}.jpg',
        start: 117,
        end: 160,
        digits: 4
    },
    book: {
        path: 'images/book/DSC_{frame}.jpg',
        start: 805,
        end: 848,
        digits: 4
    },
    braclet: {
        path: 'images/braclet/DSC_{frame}.jpg',
        start: 697,
        end: 741,
        digits: 4
    },
    flowers3: {
        path: 'images/flowers3/DSC_{frame}.jpg',
        start: 968,
        end: 1010,
        digits: 4
    },
    tmnt: {
        path: 'images/tmnt/DSC_{frame}.jpg',
        start: 755,
        end: 797,
        digits: 4
    },
}

$(".rollover-modal").click(function(e) {
    $('.loader').css({
            opacity: 0,
            display: "block"
        }).animate({
            opacity: 1
        }, 'slow');
    e.preventDefault();
    var width = $("#360Modal").width() - 20;
    var id360 = $(this).attr("id");
    console.log("ID of rollover = " + id360);
    $(".modal-spin").addClass(id360);
    // use helper method to generate an array of image urls. We have 34 frames in total
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
        mods: [
        // change frame on mouse move
        'drag',
        // enable zoom module
        // toggle zoom with double click or use the API object
        'zoom',
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
