<div class="full-height splash">
    <div class="container-fulid">
        <div class="row home-top" >
            <div class="col-md-12">   
                <div class="privacy">
                    <a href="//www.iubenda.com/privacy-policy/8144288" class="iubenda-black iubenda-embed" title="Privacy Policy">Privacy Policy</a>
                </div>
            </div>

            <div class="col-md-12 header-two">
                <h1 class="">Reduce product returns and increase sales with 360 product photography </h1>
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

            <div class="col-md-6 col-xs-12">
                <div class="splash-text">

                    <img class="img-responsive logo" alt="360 Web Photography" src="/images/logo-main.png">        

                </div>
            </div>
        </div>

    </div>


    <div class="arrow bounce">
        <a class="fa fa-arrow-down fa-2x" title="Our work - 360 Images" href="#ourwork">
        </a>
    </div>
</div>