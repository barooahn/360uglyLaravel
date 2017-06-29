<div class="contact full-height">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>
                    Enquiry
                </h1>
                <h3>
                    <span>
                        Fill in the details below,
                    </span>
                    and we will contact you right away
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <form action="{{ url('/enquiry') }}" class="form" id="order" method="post" role="form">
                    {{ csrf_field() }}

                    <div class="form-group row form-padding">
                        <div class="col-md-3 ">
                            @if (Auth::user())
                            <input class="form-control myform2" id="name1" value = "{{ Auth::user()->name }}" name="name" placeholder="Your name  *" type="text" required/>
                            @else
                            <input class="form-control myform2" id="name1" name="name" placeholder="Your name  *" type="text" required/>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <span class="email1 error_message">
                            </span>
                            @if (Auth::user())
                            <input class="form-control myform2" id="email1" value = "{{ Auth::user()->email }}" name="email" placeholder="Your email  *" type="email" required/>
                            @else
                            <input class="form-control myform2" id="email1" name="email" placeholder="Your email  *" type="email" required/>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <span class="telephone1 error_message">
                            </span>
                            <input class="form-control myform2" id="phone1" name="phone" placeholder="Your telphone number" type="text"/>
                        </div>
                        <div class="col-md-3">
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
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea class="form-control myform2" id="message1" name="message" placeholder="Your message" rows="3" style="margin-top:0 !important; height:80px;padding-top: 11px;"></textarea>
                                <span class="message1 error_message2">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pricing-button">
                        <button class="btn btn-primary" type="submit" value="submit">SEND</button>
                    </div>

                    <div class="pricing-button">
                        <a class="btn btn-primary btn-lg" href="{{ url('orders/create') }}">
                            Order Now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end container-->
</div>

</div>