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
            <a class="btn btn-primary button-menu btn-sm" href="{{ url('orders/create') }}" title="Order 360 Photo">
                Order Now
            </a>
            
             <a class="navbar-brand" href="{{ url('/') }}"><span><img class="img-responsive header-logo" alt="360 Ugly Logo" src="/images/logo.png"></span>
                
            </a>
        </div>      

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav links">
                <li>
                    <a href="/#results" title="Get results with 360 Product Photography">
                        Get Results
                    </a>
                </li>
                <li>
                    <a href="/#ourwork" title="Our Work - 360 Photos">
                        Our Work
                    </a>
                </li>
                <li>
                    <a href="/#howwork" title="Procedure to get 360 Photos">
                        How It Works
                    </a>
                </li>
                <li>
                    <a href="/#pricing" title="Pricing for 360 Web photos">
                        Pricing
                    </a>
                </li>
                <li>
                    <a href="/#contact" title="Make an enquiry about 360 product photos">
                        Enquiry
                    </a>
                </li>
                <li>
                    <a href="/#free" title="Limited time free 360 Product image">
                        Free 360
                    </a>
                </li>
                <li>
                    <a href="/#gallery" title="Our 360 product photography">
                        Gallery
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                <!-- Authentication Links -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="My Orders">
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
                                        <a class="btn btn-fb" href="login/facebook" title="Facebook Login">
                                            <i class="fa fa-facebook">
                                            </i>
                                            Facebook
                                        </a>
                                        <a class="btn btn-tw" href="login/twitter" title="Twitter Login">
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
                                                    <a href="{{ url('/password/reset') }}" title="Password Reset">Forget the password ?</a>
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
                                    <a href="{{ url('/register') }}" title="Register with for 360 Photos">
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
                    <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" title="Orders">
                        {{ Auth::user()->name }} 
                        @if (Auth::user()->count_orders() >0 )

                            <span class="badge">{{ Auth::user()->count_orders() }}</span>

                        @endif
                        <span class="caret">
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('user/process') }}" title="360 Orders in progress">
                                My Orders <span class="badge">{{ Auth::user()->count_orders() }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}" title="Logout" onclick="event.preventDefault();
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