<div class="full-height">
    <div class="row">
        <div class="col-md-12">
            <div class="logo">
                <img class="img-responsive" src="/images/logo.png">
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
    </div>
    <div class="row">
        <div class="col-md-12">
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
        
    </div>
</div>

<div class="arrow bounce">
    <a class="fa fa-arrow-down fa-2x" href="#ourwork">
    </a>
</div>
</div>