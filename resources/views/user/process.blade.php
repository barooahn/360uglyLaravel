@extends('layouts.general')

@section('pageTitle', 'User Process')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="/user/home">Your Profile</a></li>
                    <li class="active"><a href="/user/process">Orders in Process <span
                                    class="badge">{{ Auth::user()->status('process')}}</span></a></li>
                    <li><a href="/user/download">Ready for download <span
                                    class="badge">{{ Auth::user()->status('download')}}</span></a></li>
                    <li>
                        <a href="{{ url('/logout') }}" title="Logout" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form action="{{ url('/logout') }}" id="logout-form" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h1>Orders being processed</h1>

                    </div>

                    <div class="panel-body">


                        @if($user->status('process') > 0)

                            @foreach ($user->getProcess() as $order)

                                @if($order->items->count() > 0)
                                    <div class="row process-header">
                                        <div class="col-md-12 col-lg-8">

                                                <div class="order-number">
                                                    <h4>Order number: {{sprintf('%04d', $order->id)}}</h4>
                                                </div>

                                        </div>
                                        <div class="col-md-12 col-lg-4">
                                            @if ($order->status == 'pay1')
                                                <div class="paypal-button">
                                                    <form action="{{ url('payment/collection', $order) }}"
                                                          class="form"
                                                          id="order" method="get" role="form">
                                                        <input type="image"
                                                               src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypalcheckout-34px.png"
                                                               alt="PayPal Checkout"/>
                                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                                    </form>

                                                    <p class="price-right">Delivery cost:
                                                        £{{sprintf("%01.2f", $order->delivery_price)}}</p>


                                                </div>


                                            @endif
                                        </div>
                                    </div>

                                    <div class="row process-items">
                                        <div class="col-md-4">
                                            @foreach ($order->items as $item)

                                                <p>Name: {{$item->name}} </p>
                                                <p>Item number: {{sprintf('%04d', $item->id)}}  </p>
                                                <p>Dimensions: {{$item->height}} x {{$item->width}} x {{$item->length}}
                                                    cm</p>
                                                <p>Weight: {{$item->weight}} kg</p>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4">
                                            @php
                                                switch ($order->status) {
                                                    case 'pay1':
                                                        echo'<p>Pay now for courier collection of product(s) only</p>';
                                                        break;
                                                    case 'delivery':
                                                        echo'<p>We are awaiting products in our office</p>';
                                                        break;
                                                    case 'process':
                                                        echo'<p>We are currently processing your order</p>';
                                                        break;
                                                    default:
                                                        echo'<p>No data</p>';
                                                }
                                            @endphp

                                        </div>

                                        <div class="col-md-4">

                                            @if ($order->status == 'delivery')
                                                <p>delivery</p>
                                            @elseif ($order->status == 'process')
                                                <p>Please wait and check back here soon.</p>
                                            @elseif ($order->status == 'pay1')
                                                <p>Use the PayPal button above to pay for the courier</p>
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
@endsection
