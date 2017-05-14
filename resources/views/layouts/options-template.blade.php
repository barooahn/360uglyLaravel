<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <!-- CSRF Token -->
                    <meta content="{{ csrf_token() }}" name="csrf-token">
                        <title>
                            {{ config('app.name', 'Ugly360') }}
                        </title>
                        <meta content="Blueprint: " name="description"/>
                        <meta content="" name="keywords"/>
                        <meta content="Codrops" name="author"/>
                        <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
                        <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
                        <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
                        <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
                        <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
                        <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
                        <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
                        <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
                        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
                        <link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
                        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
                        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
                        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
                        <link rel="manifest" href="images/favicon/manifest.json">
                        <meta name="msapplication-TileColor" content="#ffffff">
                        <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
                        <meta name="theme-color" content="#ffffff">
                        <!-- Styles -->
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
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <!-- Collapsed Hamburger -->
                        <button class="navbar-toggle collapsed" data-target="#app-navbar-collapse" data-toggle="collapse" type="button">
                            <span class="sr-only">
                                Toggle Navigation
                            </span>
                            <span class="icon-bar">
                            </span>
                            <span class="icon-bar">
                            </span>
                            <span class="icon-bar">
                            </span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}"><span>Ugly360</span>
                            <img class="img-responsive" alt="Brand" src="/images/favicon/ms-icon-310x310.png">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav links">
                            <li>
                                <a href="/#ourwork">
                                    Our Work
                                </a>
                            </li>
                            <li>
                                <a href="/#results">
                                    Get Results
                                </a>
                            </li>
                            <li>
                                <a href="/#howwork">
                                    How It Works
                                </a>
                            </li>
                            <li>
                                <a href="/#pricing">
                                    Pricing
                                </a>
                            </li>
                            <li>
                                <a href="/#contact">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="button-menu">

                                    <a class="btn btn-primary button-menu btn-sm" href="{{ url('orders/create') }}">
                                        Order Now
                                    </a>

                            </li>
                            @if (Auth::guest())
                            <!-- Authentication Links -->
                            <li>
                                <p class="navbar-text">
                                    Already have an account?
                                </p>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <b>
                                        Login
                                    </b>
                                    <span class="caret">
                                    </span>
                                </a>
                                
                                <ul class="dropdown-menu" id="login-dp">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Login via
                                                <div class="social-buttons">
                                                    <a class="btn btn-fb" href="#">
                                                        <i class="fa fa-facebook">
                                                        </i>
                                                        Facebook
                                                    </a>
                                                    <a class="btn btn-tw" href="#">
                                                        <i class="fa fa-twitter">
                                                        </i>
                                                        Twitter
                                                    </a>
                                                </div>
                                                or
                                                <form accept-charset="UTF-8" action="{{ url('/login') }}" class="form" id="login-nav" method="POST" role="form">
                                                    {{ csrf_field() }}
                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email" class="sr-only">E-Mail Address</label>

                                                        <div>
                                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
    
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label class="sr-only" for="password">
                                                            Password
                                                        </label>
                                                        <input class="form-control" id="password" placeholder="Password" name="password" required type="password">
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif

                                                            <div class="help-block text-right">
                                                                <a href="{{ url('/password/reset') }}">Forget the password ?</a>
                                                            </div>
                                                        </input>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary btn-block" type="submit">
                                                            Sign in
                                                        </button>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="bottom text-center">
                                                New here ?
                                                <a href="{{ url('/register') }}">
                                                    <b>
                                                        Join Us
                                                    </b>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li class="dropdown">
                                <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                                    {{ Auth::user()->name }} 
                                    @if (Auth::user()->count_orders() >0 )

                                        <span class="badge">{{ Auth::user()->count_orders() }}</span>

                                    @endif
                                    <span class="caret">
                                    </span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('user/home') }}" >
                                            My Orders <span class="badge">{{ Auth::user()->count_orders() }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form action="{{ url('/logout') }}" id="logout-form" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>

                        
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
        <!-- Scripts -->
        <script src="/js/options.js">
        </script>
    </body>
</html>
