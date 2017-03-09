@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>
        Tell us about your products
    </h1>

	<p>address for collection</p>

	<p>for loop for items below 6</p>

	<p>if over 6 one form for total size</p>


	<h1>number of products: {{$noItems}}</h1>


    <form action="{{ url('/delivery') }}" class="form" id="order" method="post" role="form">
                            {{ csrf_field() }}

                        <div class="form-group row form-padding">
                            <div class="col-md-3 ">
                                
                                <input class="form-control myform2" id="name1" name="name" placeholder="Your name  *" type="text"/>
                                
                            </div>
                            <div class="col-md-3">
                                <span class="email1 error_message">
                                </span>
                                <input class="form-control myform2" id="email1" name="email" placeholder="Your email  *" type="email"/>
                            </div>
                            <div class="col-md-3">
                                <span class="telephone1 error_message">
                                </span>
                                <input class="form-control myform2" id="telephone1" name="telephone" placeholder="Your telphone number" type="text"/>
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
@endsection
