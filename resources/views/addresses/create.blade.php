@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Collection Address:</h1>
            <div class="panel panel-default">
                <div class="panel-body">

                    <p class="collection-note">Please note if we collect your product we will use a third party courier.  <b>The courier fee will need to be paid before collection will take place.  The price will depend on the items you wish to have photgraphed.  The fee will be deducted from your final bill.</b></p> 

                    @if($address!=null)
                    <div class="row">
                        <div class="col-md-6">


                            <p>{{$address->house}} {{$address->address1}}</p>
                            <p>{{$address->address2}}</p>
                            <p>{{$address->area}}</p>
                            <p>{{$address->county}}</p>
                            <p>{{$address->postcode}}</p>
                            <div class="pricing-button">
                                <a class="btn btn-primary btn-lg" href="{{ url('address/existing', $address->user->id) }}">
                                    Use this address
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{ Form::open(array('route' => array('addresses.store'))) }}


                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="myform2">
                                    {{ Form::text('house', null, ['class' => 'form-control', ' placeholder' => 'House number or name *', 'required']) }}
                                </div>   

                                <div class="myform2">
                                    {{ Form::text('address1', null, ['class' => 'form-control', ' placeholder' => 'Address Line 1  *', 'required']) }}
                                </div> 

                                <div class="myform2">
                                    {{ Form::text('address2', null, ['class' => 'form-control', ' placeholder' => 'Address Line 2']) }}                        </div>               

                                    <div class="myform2">
                                        {{ Form::text('area', null, ['class' => 'form-control', ' placeholder' => 'Area']) }}
                                    </div>          

                                    <div class="myform2">
                                        {{ Form::text('county', null, ['class' => 'form-control', ' placeholder' => 'County  *', 'required']) }}
                                    </div>

                                    <div class="myform2">
                                        {{ Form::text('postcode', null, ['class' => 'form-control', ' placeholder' => 'Postcode  *', 'required']) }}
                                    </div>

                                    <div class="pricing-button">
                                        {{ Form::submit('Add Address', ['class' => 'btn btn-primary btn-lg']) }}
                                    </div>

                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Where shall we collect your products from?</h4></div>
                    <div class="panel-body">
                        {{ Form::model($address, array('route' => array('addresses.store'))) }}


                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::text('house', null, ['class' => 'form-control', ' placeholder' => 'House number or name *', 'required']) }}
                        </div>   

                        <div class="form-group">
                            {{ Form::text('address1', null, ['class' => 'form-control', ' placeholder' => 'Address Line 1  *', 'required']) }}
                        </div> 

                        <div class="form-group">
                            {{ Form::text('address2', null, ['class' => 'form-control', ' placeholder' => 'Address Line 2']) }}                        </div>               

                            <div class="form-group">
                                {{ Form::text('area', null, ['class' => 'form-control', ' placeholder' => 'Area']) }}
                            </div>          

                            <div class="form-group">
                                {{ Form::text('county', null, ['class' => 'form-control', ' placeholder' => 'County  *', 'required']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::text('postcode', null, ['class' => 'form-control', ' placeholder' => 'Postcode  *', 'required']) }}
                            </div>

                            <div class="pricing-button">
                                {{ Form::submit('Add Address', ['class' => 'btn btn-primary']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
            <div class="col-md-6">
                <h1>Or post to here:</h1>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>You can post the products if you prefer</h4>
                    </div>
                    <div class="panel-body">
                        <p>175 Redgate</p>
                        <p>Ormskirk</p>
                        <p>West Lancashire</p>
                        <p>L39 3NW</p>
                        <div class="pricing-button">
                            <a class="btn btn-primary" href="{{ url('/address/self', Session::get('order_id')) }}">
                                I will post
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @endsection