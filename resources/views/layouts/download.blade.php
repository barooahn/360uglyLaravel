<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="robots" content="noindex">
    <!-- CSRF Token -->
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <title>
        @yield('pageTitle') - 360Ugly
    </title>
    <meta content="Blueprint: " name="description"/>
    <meta content="" name="keywords"/>
    <meta content="Codrops" name="author"/>
        <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Styles -->
    <link href="/css/user.css" rel="stylesheet">
    <link href="/css/all.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</link>
</meta>
</meta>
</meta>
</meta>
</head>
<body>
    <div id="app">
        @include('layouts.home.partiles.fullnav')
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="/js/download.js">
    </script>
    <script>
    $( window ).on( "load", function() {
        var framesArray = <?php echo json_encode($framesArray); ?>;
        if(framesArray != '') {
            console.log('framesarray', framesArray);
            framesArray.forEach(function(download) {
                //console.log('framesarray', download['name']);
                
                var frames = SpriteSpin.sourceArray( '/storage/'+ download['path'] + '/' + download['name']+'{frame}.jpg', {
                    frame: [0, download['frames']],
                    digits: 2
                });

            var portrait = download['portrait'];

                var width = $('.' + download['name']).width() - 10;
                var height = portrait ? width * 1.5 : width / 1.5;
                var spin = $('.' + download['name']);
                // initialise spritespin
                spin.spritespin({
                  source: frames,
                  width: width,
                  height: height,
                  onInit : function(p){$('.loader').css({opacity: 0, display: "block"}).animate({opacity: 1}, 'slow')},
                  onLoad : function(p){$('.loader').css({opacity: 1, display: "none"}).animate({opacity: 0}, 'slow')},
                  frameTime: 120,
                  scrollThreshold:0
              });
            });
        }
    });
    </script>
</body>
</html>
