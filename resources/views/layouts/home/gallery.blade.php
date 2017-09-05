<div class="gallery full-height">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="thumbs-container">
                    <a class="rollover-modal" href="#" id="clown">
                        <img class="img-responsive thumbs" src="images/clown/DSC_2926.jpg" alt="Our work - Scarecrow">
                        
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="thumbs-container">
                    <a class="rollover-modal" href="#" id="gamepad">
                        <img class="img-responsive thumbs" src="images/gamepad/DSC_0197.jpg" alt="Our work - gamepad">
                        
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="thumbs-container">
                    <a class="rollover-modal" href="#" id="pebble">
                        <img class="img-responsive thumbs" src="images/pebble/DSC_0037.jpg" alt="Our work - Pebble watch">
                        
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="thumbs-container">
                    <a class="rollover-modal" href="#" id="baji">
                        <img class="img-responsive thumbs" src="images/baji/DSC_0041.jpg" alt="Our work - Baji">
                        
                    </a>
                </div>
            </div>

        </div>
        <div class="row">
           @include('layouts.home.amazon_products.sunglasses')
           @include('layouts.home.amazon_products.uglyman2')
           @include('layouts.home.amazon_products.flowers3')
           @include('layouts.home.amazon_products.big_flowers')

       </div>
   </div>
   <!--end of container-->
</div>

<div aria-labelledby="exampleModalLabel" class="modal fade" id="360Modal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                    </span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">
                    Spin with mouse or touch

                    <a class="icon-size" data-dismiss="modal">
                        <i class="flaticon-cancel"></i>
                    </a>
                    <a class="full-screen icon-size">
                        <i class="flaticon-full-screen"></i>
                    </a>
                </h4>
            </div>
            <div class="modal-body">
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
                <div class="modal-spin">
                </div>
            </div>
        </div>
    </div>
</div>

