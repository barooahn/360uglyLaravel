<div class="enquiry full-height">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="results_header">
                    <h2>Benifits of using 360 Product Photography</h2>

                    <img src="/images/divider.png" class="img-responsive header-divider" alt="divider- 360 Images">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <h2>100% satisfaction, No risk, No upfront payment*</h2>

                <p>We are so confident that you will love our 360 product spin that we don’t ask you to pay anything until you have approved your product and love it.  Once photographed your product is developed in to our custom software.  When complete, you will be notified by email that your 360 product rotation is ready for viewing.  Simply click the link in the email, or login to your account on 360Ugly.com and go to the downloads section for a free full preview of your 360 product rotation.  If you like it click the PayPal buy now button to unlock the download. </p>



                <p>*Note if you require 360 Ugly to collect your product we employ a third party courier.  This will be charged and refunded when you pay for your products.</p>

                
                <h3>Don’t let your competitors get your conversions!</h3>

                <div class="pricing-button">
                        <a class="btn btn-primary btn-lg" href="{{ url('orders/create') }}" title="Order 360 Image">
                            Order Now
                        </a>
                </div>


            </div>

        </div>

    </div>
    <!--end container-->
</div>
