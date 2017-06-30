<div class="full-height">
    <div class="row home-top" >

    </div>
    <div class="row home-top">
        <div class="col-lg-12 center">
            <img class="img-responsive logo" alt="Brand" src="/images/logo.png">

        </div>

    </div>
    <div class="row"> 
        <div class="col-md-12">
             @if ($errors->has('verified'))
            <p class="help-block-splash">
                <strong>{{ $errors->first('verified')}}</strong>
            </p>
            @endif
            @if ($errors->has('email'))
            <p class="help-block-splash">
                <strong>{{ $errors->first('email') }}</strong>
            </p>
            @endif
            @if ($errors->has('password'))
            <p class="help-block-splash">
                <strong>{{ $errors->first('password') }}</strong>
            </p>
            @endif
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-7">
            <div class="loader">
                <div class="spinner">
                    <div class="dot1">
                    </div>
                    <div class="dot2">
                    </div>
                </div>
                <p>
                    Loading
                </p>
            </div>
            <div class="uglyman splash-container">
            </div>
        </div>

        <div class="col-md-5 splash-text">
            <span class="slogan">See the full picture</span>
            <h2><em>Ugly360 provides a simple and cost effective way to use 360 images on your website</em></h2>
        </div>
        
    </div>
</div>

<div class="arrow bounce">
    <a class="fa fa-arrow-down fa-2x" href="#ourwork">
    </a>
</div>
</div>