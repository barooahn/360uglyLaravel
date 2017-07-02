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

<div class="paypal-logo">
    <!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="right"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/uk/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/uk/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table><!-- PayPal Logo -->
</div>
</div>

<div class="arrow bounce">
    <a class="fa fa-arrow-down fa-2x" href="#ourwork">
    </a>
</div>
</div>