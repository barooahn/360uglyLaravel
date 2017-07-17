@extends('layouts.app')

@section('pageTitle', 'Show Downloads')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Orders in progress</div>
                <div class="panel-body">

                    @foreach($orders as $order)
                    	<div class="row">
		                    <div class="col-md-4 tablerow">
		                        <p>User Name: {{$order->user->name}}</p>
		                        <p>User email: {{$order->user->email}}</p>

		                    </div>
		                    <div class="col-md-6 tablerow">
		                        <p>Order number: {{sprintf('%04d', $order->id)}} </p>

		                        @foreach ($order->items as $item)

                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Name: {{$item->name}} </p>
                                            <p>Item number: {{sprintf('%04d', $item->id)}}  </p>
                                        </div>
                                        <div class="col-md-4">
                                          	<p>Order status: {{$order->status}}</p>
                                        </div>

                                        <div class="col-md-4">
                                            @if($order->status == 'delivery')
                                            	 <div class = "pricing-button">
                                                    <a class="btn btn-primary btn-sm" href="{{ url('orders/arrived', $order) }}">
                                                        Arrived
                                                    </a>
                                                </div>
                                            @endif
                                            @if($order->status == 'process')
                                                @if((!$item->download))
                                            	 <div class = "pricing-button">
                                                    <a class="btn btn-primary btn-sm" href="{{ url('downloads/create', $item->id) }}">
                                                        Upload images
                                                    </a>
                                                </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                @endforeach
		                    </div>
		                    <div class="col-md-4">
		                        
		                    </div>
		                </div>

                
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
