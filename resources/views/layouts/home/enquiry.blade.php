<div class="contact full-height">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-8">

                <h2>Benifits of using 360 Product Photography</h2>


                <p>360 Ugly LTD is a premium service designed to increase your product sales and reduce product returns using one the latest web technologies: 360 product photography.  360 Images can be used to show many more angles than static images.  They also enable the user to rotate the product to their desired view with a mouse or touch on mobile devices.  Customers get a virtual feel for the product leading to higher client satisfaction and lower product return rate.</p>

                <h2>100% satisfaction, No risk, No upfront payment*</h2>

                <p>We are so confident that you will love our 360 product spin that we don’t ask you to pay anything until you have approved your product and love it.  Once photographed your product is developed in to our custom software.  When complete, you will be notified by email that your 360 product rotation is ready for viewing.  Simply click the link in the email, or login to your account on 360Ugly.com and go to the downloads section for a free full preview of your 360 product rotation.  If you like it click the PayPal buy now button to unlock the download. </p>   


                <ul>
                    <li>Only pay if you are 100% completely satisfied</li>
                    <li>Nothing to pay if you are not satisfied</li>
                    <li>Aprrove your final product</li>
                    <li>We will even refund the courier fee when you decide you love the product and make payment</li>

                </ul>

                <p>*Note if you require 360 Ugly to collect your product we employ a third party courier.  This will be charged and refunded when you pay for your products.</p>  

                
                <h3>Don’t let your competitors get your conversions!</h3>

                <div class="pricing-button">
                        <a class="btn btn-primary btn-lg" href="{{ url('orders/create') }}" title="Order 360 Image">
                            Order Now
                        </a>
                </div>


            </div>
            <div class="col-sm-4">
                <h2>
                    Get in Touch
                </h2>
                <h3>
                    <span>
                        Fill in the details below,
                    </span>
                    and we will contact you right away
                </h3>
                <form action="{{ url('/enquiry') }}" class="form" id="order" method="post" role="form">
                    {{ csrf_field() }}

                    <div class="form-group">

                            @if (Auth::user())
                            <input class="form-control myform2" id="name1" value = "{{ Auth::user()->name }}" name="name" placeholder="Your name  *" type="text" required/>
                            @else
                            <input class="form-control myform2" id="name1" name="name" placeholder="Your name  *" type="text" required/>
                            @endif

                            <span class="email1 error_message">
                            </span>
                            @if (Auth::user())
                            <input class="form-control myform2" id="email1" value = "{{ Auth::user()->email }}" name="email" placeholder="Your email  *" type="email" required/>
                            @else
                            <input class="form-control myform2" id="email1" name="email" placeholder="Your email  *" type="email" required/>
                            @endif

                            <span class="telephone1 error_message">
                            </span>
                            <input class="form-control myform2" id="phone1" name="phone" placeholder="Your telphone number" type="text"/>

                            <span class="name1 error_message">
                            </span>
                            <select class="form-control myform2" id="items" name="item" type="text">
                                <option disabled selected hidden value="">
                                    Number of products
                                </option>
                                <option value="1">
                                    1
                                </option>
                                <option value="2">
                                    2
                                </option>
                                <option value="3">
                                    3
                                </option>
                                <option value="4">
                                    4
                                </option>
                                <option value="5">
                                    5
                                </option>
                                <option value="6">
                                    6 or more
                                </option>
                            </select>

                                <textarea class="form-control enquiry-textarea" id="message1" name="message" placeholder="Your message" rows="3"></textarea>
                                <span class="message1 error_message2">
                                </span>
                            </div>

                    <div class="form-group pricing-button">
                        <button class="btn btn-primary" type="submit" value="submit">SEND</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!--end container-->
</div>

</div>