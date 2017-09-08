<!DOCTYPE html>
<!-- Microdata markup added by Google Structured Data Markup Helper. -->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <!-- CSRF Token -->
    <meta content="{{ csrf_token() }}" name="csrf-token"/>
    <title>
        @yield('pageTitle') - 360Ugly
    </title>
    <meta content="Reduce product returns and increase sales with 360 product photography" name="description"/>
    <meta content="360 photography, 360 photographer, 360 product photography, 360 photo, 360 degree photography, 360 product photography, 3D product photography, 360 degree product photography, 360 web photos, 360 web photo" name="keywords"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png"/>
    <link rel="icon" type="image/x-icon" sizes="96x96" href="/images/favicon/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png"/>
    <link rel="manifest" href="/images/favicon/manifest.json"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png"/>
    <meta name="theme-color" content="#ffffff">
    <!-- Styles -->
    <link href="/css/all.css" rel="stylesheet"/>
    <!-- Scripts -->
    <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
    @import url('https://fonts.googleapis.com/css?family=Zilla+Slab+Highlight:700|PT+Sans+Narrow:700');
</style>
</head>
<body>
    <div itemscope itemtype="http://schema.org/LocalBusiness" id="app">
        @include('layouts.home.partiles.fullnav')
        @yield('content')
        @include('layouts.home.partiles.footer')
    </div>
    <!-- Scripts -->
    <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
    <script async src="/js/all.js">

        //privicy
    </script>

    <script async type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-596ca85e2a8a55b9"></script> 

</body>
</html>