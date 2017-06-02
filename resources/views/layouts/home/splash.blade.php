<div class="full-height">
    <div class="row">
        <div class="col-md-12">
            <div class="logo">
                <img class="img-responsive" src="/images/logo.png">
            @if ($errors->has('verified'))
                <span class="help-block-splash">
                    <strong>{{ $errors->first('verified')}}  {{link_to_action('LoginController@resendEmail', 'resend email', $parameters = array($user))}}</strong>
                </span>
            @endif
            @if ($errors->has('email'))
                <span class="help-block-splash">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block-splash">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="uglyman splash-container">
            </div>
        </div>
    </div>

    <div class="arrow bounce">
        <a class="fa fa-arrow-down fa-2x" href="#ourwork">
        </a>
    </div>
</div>