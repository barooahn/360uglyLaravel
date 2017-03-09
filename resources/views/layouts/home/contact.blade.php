<div class="contact full-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                        Order / Enquiry
                    </h1>
                    <h3>
                        <span>
                            Fill in the details below,
                        </span>
                        and we will contact you right away
                    </h3>
                </div>
            </div>
            <span id="form_msg_quote_form">
            </span>
            <form action="{{ url('/enquiry') }}" class="form" id="order" method="post" role="form">
                    {{ csrf_field() }}

                <div class="form-group row">
                    <div class="col-md-3 col-md-offset-5">        
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn active">
                              <input type="radio" name='type' value="order" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span> Order</span>
                            </label>
                            <label class="btn">
                              <input type="radio" name='type' value="enquiry"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> Enquiry</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row form-padding">
                    <div class="col-md-3 ">
                        
                        <input required class="form-control myform2" id="name1" name="name" placeholder="Your name  *" type="text"/>
                        
                    </div>
                    <div class="col-md-3">
                        <span class="email1 error_message">
                        </span>
                        <input required class="form-control myform2" id="email1" name="email" placeholder="Your email  *" type="email"/>
                    </div>
                    <div class="col-md-3">
                        <span class="telephone1 error_message">
                        </span>
                        <input class="form-control myform2" id="telephone1" name="telephone" placeholder="Your telphone number" type="text"/>
                    </div>
                    <div class="col-md-3">
                        <span class="name1 error_message">
                        </span>
                        <select class="form-control" id="items" name="items" type="text">
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
                <div class="form-group">
                <button class="btn btn-primary" type="submit" value="submit">SEND</button>
                </div>
            </form>
        </div>
        <!--end container-->
    </div>

</div>