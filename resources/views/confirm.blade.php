@extends('layouts.general')

@section('pageTitle', 'Order Confirmation')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>
						Your Order is Confirmed
					</h1>
					<h5 class="center">   
						Please print this page and send with your products 
					</h5>
				</div>
				<div class="panel-body">
					<div class="col-xs-12">
						<h1 class="center">
							Thank you for your order
						</h1>
						<h5>Order number: {{sprintf('%04d', $order->id)}}</h5>
						<br/>
						<h2>User</h2>
						<p>{{$user->name}}</p>
						<p>{{$user->email}}</p>
						<br/>
						@if($user->addresses->last() != null)

						<h2>Address</h2>

						<p>{{$user->addresses->last()->house}} {{$user->addresses->last()->address1}}</p>
						<p>{{$user->addresses->last()->address2}}</p>
						<p>{{$user->addresses->last()->area}}</p>
						<p>{{$user->addresses->last()->county}}</p>
						<p>{{$user->addresses->last()->postcode}}</p>

						@endif
						<br/>
						<h2>Products</h2>
						@foreach($order->items as $item)
						<p>Item number: 000{{$item->id}}
						<p>{{$item->name}}</p>
						<p>Price: £{{sprintf("%01.2f", $item->price)}}</p>
						<br/>
						@endforeach

						<p><b>Delivery total: £{{sprintf("%01.2f", App\Order::deliveryPrice($order->id))}}</b></p>
						<p><b>Order total: £{{sprintf("%01.2f", App\Order::orderPrice($order->id))}}</b></p>

                        <div class = "pricing-button">
                            <a class="btn btn-primary btn-sm" href="{{ url('user/process') }}">
                                Check Order
                            </a>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection
