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
            <div class="col-md-4 col-sm-12">
                <div class="getintouch-form">
                    <h3>
                        Get in Touch
                    </h3>
                    <p>Fill in the details below, and we will contact you right away</p>
                    <form action="{{ url('/enquiry') }}" class="form" id="order" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">

                            @if (Auth::user())
                                <input class="form-control enquiry-field" id="name1" value="{{ Auth::user()->name }}"
                                       name="name" placeholder="Your name  *" type="text" required/>
                            @else
                                <input class="form-control enquiry-field" id="name1" name="name"
                                       placeholder="Your name  *" type="text" required/>
                            @endif

                            <span class="email1 error_message">
                            </span>
                            @if (Auth::user())
                                <input class="form-control enquiry-field" id="email1" value="{{ Auth::user()->email }}"
                                       name="email" placeholder="Your email  *" type="email" required/>
                            @else
                                <input class="form-control enquiry-field" id="email1" name="email"
                                       placeholder="Your email  *" type="email" required/>
                            @endif

                            <span class="telephone1 error_message">
                            </span>
                            <input class="form-control enquiry-field" id="phone1" name="phone"
                                   placeholder="Your telphone number" type="text"/>

                            <span class="name1 error_message">
                            </span>
                            <select class="form-control enquiry-field" id="items" name="item">
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

                            <textarea class="form-control enquiry-textarea enquiry-field" id="message1" name="message"
                                      placeholder="Your message" rows="3"></textarea>
                            <span class="message1 error_message2">
                                </span>
                        </div>

                        <div class="form-group enquiry-button">
                            <button class="btn btn-primary" type="submit" value="submit">SEND</button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-md-8 col-sm-12">
                <div class="enquiry-text">
                    <p>360 Ugly LTD is a premium service designed to increase your product sales and reduce product
                        returns using one the latest web technologies: 360 product photography. 360 Images can be used
                        to show many more angles than static images. They also enable the user to rotate the product to
                        their desired view with a mouse or touch on mobile devices. Customers get a virtual feel for the
                        product leading to higher client satisfaction and lower product return rate.</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 ">
                        <div class="free-steps">
                            <div class="free-img">
                                <img src="/images/wallet.png" class="img-responsive"
                                     alt="100% completely satisfied 360 Images">
                            </div>
                            <div class="free-text">
                                <span class="free-bullets">Only pay if you are 100% completely satisfied</span>
                            </div>

                        </div>
                        <div class="free-steps">
                            <div class="free-img">
                                <img src="/images/customer.png" class="img-responsive" alt="Order 360 Images">
                            </div>
                            <div class="free-text">
                                <span class="free-bullets">Nothing to pay if you are not satisfied</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6 col-sm-12 ">
                        <div class="free-steps">
                            <div class="free-img">
                                <img src="/images/approve.png" class="img-responsive" alt="Order 360 Images">
                            </div>
                            <div class="free-text">
                                <span class="free-bullets">Aprrove your final product</span>
                            </div>

                        </div>
                        <div class="free-steps">
                            <div class="free-img">
                                <img src="/images/financial.png" class="img-responsive" alt="Order 360 Images">
                            </div>
                            <div class="free-text">
                                <span class="free-bullets">We will even refund the courier fee when you decide you love the product and make payment</span>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
    <!--end container-->
</div>
