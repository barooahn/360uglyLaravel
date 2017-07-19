<div class="full-height">
    <div class="row home-top" >
        <div class="privacy">
            <a href="//www.iubenda.com/privacy-policy/8144288" class="iubenda-black iubenda-embed" title="Privacy Policy">Privacy Policy</a>
        </div>
        <div class="security">
            <img class="encrypt" src="images/icons/padlock.png" alt="Secure site">

            <div class="paypal-logo">

                <img class ="img-reponsive" src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" alt="PayPal Logo"><!-- PayPal Logo -->
            </div>
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
        <div class="col-md-6 col-xs-12">
            <div class="splash-container">
            <div class="uglyman">   
            <div id="loader">
                <div class="spinner">
                    <div class="dot1">
                    </div>
                    <div class="dot2">
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="col-md-4 col-xs-12">
            <div class="splash-text">

                    <img class="img-responsive logo" alt="360 Web Photography" src="/images/logo-main.png">

                    <h1>360 images for the web</h1>           

            </div>
        </div>
    </div>

</div>


<div class="arrow bounce">
    <a class="fa fa-arrow-down fa-2x" title="Our work - 360 Images" href="#ourwork">
    </a>
</div>

</div>