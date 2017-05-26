@extends('layouts.general')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="home">Your Profile</a></li>
              <li class="active"><a href="process">Orders in Process <span class="badge">{{ Auth::user()->status('process')}}</span></a></li>
              <li><a href="download">Ready for download <span class="badge">{{ Auth::user()->status('download')}}</span></a></li>
          </ul>
      </div>
      <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">

                <h1>Orders being processed</h1>

                @if($user->status('process') > 0)

                @foreach ($user->getProcess() as $order)

                @if($order->items->count() > 0)

                <h4>Order number: 000{{$order->id }}</h4>

                <div class="row">
                    <div class="col-md-4">
                        @foreach ($order->items as $item)

                        <p>Name: {{$item->name}} </p>
                        <p>Item number: 000{{$item->id}} </p>
                        <p>Dimensions: {{$item->height}} x {{$item->width}} x {{$item->length}} cm</p>
                        <p>Weight: {{$item->weight}} kg</p>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        @php
                            switch ($order->status) {
                                case 'pay1':
                                    echo'Pay now for collection of product(s) only';
                                    break;
                                case 'delivery':
                                    echo'Collection is in process';
                                    break;
                                case 'process':
                                    echo'We are currently processing your order';
                                    break;
                                case 'pay2':
                                    echo'Your order is ready.  Pay now to enable download';
                                    break;
                                default:
                                    echo'No data';
                            }
                        @endphp

                </div>

                <div class="col-md-4">

                    @if ($order->status == 'pay1')
                        <div class = "pricing-button">
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="upload" value="1">
                                <input type="hidden" name="business" value="barooahn@gmail.com">
                                <input type="hidden" name="currency_code" value="GBP">

                                <?php $count=0;?>
                                @foreach ($order->items as $item)
                                <?php $count++; ?>
                                <input type="hidden" name="item_name_{{$count}}" value="{{$item->name}}">
                                <input type="hidden" name="amount_{{$count}}" value="{{$item->price}}">
                                <input type="hidden" name="shipping_{{$count}}" value="0">

                                @endforeach
                                <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypalcheckout-34px.png" alt="PayPal Checkout"/>

                        </div>
                    @elseif ($order->status == 'delivery') 
                        <p>delivery</p>
                    @elseif ($order->status == 'process') 
                        <p>Please wait and check back here soon.</p>
                    @elseif ($order->status == 'pay2') 
                        <div class = "pricing-button">
                            <a class="btn btn-primary btn-sm" href="{{ url('payment/store') }}">
                                Pay now
                            </a>
                        </div>
                    @elseif ($order->status == 'await') 
                    @else
                    <p>'No action required'</p>      
                    @endif
                </div>
            </div>


            @endif

            @endforeach

            @else

            <p>No orders to process</p>

            @endif
        </div>

    </div>
</div>
</div>
</div>
</div>
@endsection
