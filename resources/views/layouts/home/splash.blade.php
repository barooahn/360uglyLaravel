<div class="full-height">
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

        <div class="col-md-4">
            <div class="amazon-header">
                <div class="spin">
                    <span>
                        <a class="spin-icon">
                            <img class="img-responsive icon-size-360" src="images/icons/002-360arrow.png">
                        </a>
                    </span>
                    <span class="spin-text">
                        Spin with mouse or touch
                    </span>
                </div>
                <div class="amazon-item">
                    <div class="big-flowers splash-container">
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
                    </div>
                        <a class="full-screen icon-size splash-fullscreen">
                            <img src="images/icons/005-arrows.png">
                        </a>
                    <div>
                        <p class="amazon-price">£79.00</p>
                        <p class="amazon-description">Exquisite marble flower vase with beautiful rose arrangement</p>
                        <p><i class="fa fa-star gold" aria-hidden="true"></i><i class="fa fa-star gold" aria-hidden="true"></i><i class="fa fa-star gold" aria-hidden="true"></i><i class="fa fa-star gold" aria-hidden="true"></i><i class="fa fa-star gold" aria-hidden="true"></i>  98</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
        <div class="col-md-4">
            <h1>See the full picture</h1>
        </div>
        
    </div>
</div>

<div class="arrow bounce">
    <a class="fa fa-arrow-down fa-2x" href="#ourwork">
    </a>
</div>
</div>