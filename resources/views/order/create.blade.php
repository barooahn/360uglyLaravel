@extends('layouts.app')

@section('content')
<div class="contact full-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                        Order
                    </h1>
                    <h3>
                        Please check your email and name are correct.
                    </h3>
                    <h5 class="center">   
                        Add a contact telphone number and message (optional)
                    </h5>
                </div>
            </div>
            <span id="form_msg_quote_form">
            </span>
            <form action="{{ url('/order') }}" class="form" id="order" method="post" role="form">
                    {{ csrf_field() }}
                <div class="form-group row form-padding">
                    <div class="col-md-4 ">
                        @if (Auth::user())
                        <input class="form-control myform2" id="name1" value = "{{ Auth::user()->name }}" name="name" placeholder="Your name  *" type="text"/>
                        @else
                        <input class="form-control myform2" id="name1" name="name" placeholder="Your name  *" type="text"/>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <span class="email1 error_message">
                        </span>
                         @if (Auth::user())
                        <input class="form-control myform2" id="email1" value = "{{ Auth::user()->email }}" name="email" placeholder="Your email  *" type="email"/>
                        @else
                        <input class="form-control myform2" id="email1" name="email" placeholder="Your email  *" type="email"/>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <span class="telephone1 error_message">
                        </span>
                        <input class="form-control myform2" id="phone1" name="phone" placeholder="Your telphone number" type="text"/>
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
                <button class="btn btn-primary" type="submit" value="submit">CONTINUE</button>
                </div>
            </form>
        </div>
        <!--end container-->
    </div>

</div>
@endsection