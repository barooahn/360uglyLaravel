@extends('layouts.download')

@section('pageTitle', 'User Downloads')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="/user/home">Your Profile</a></li>
                    <li><a href="/user/process">Orders in Process <span
                                    class="badge">{{ Auth::user()->status('process')}}</span></a></li>
                    <li class="active"><a href="/user/download">Ready for download <span
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

                        <h1>Ready for download</h1>
                    </div>

                    <div class="panel-body">



                            @if($user->status('download') > 0 )

                                @foreach ($user->getDownload() as $order)
                                    <div class="row process-header">
                                        <div class="col-md-12 col-lg-8">
                                            <div class="order-number">
                                                <h4>Order number:{{sprintf('%04d', $order->id)}} </h4>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-4">

                                            @if ($order->status == 'pay2')
                                                <div class="paypal-button">
                                                    <form action="{{ url('/payment/download', $order->id) }}"
                                                          class="form" id="order" method="get" role="form">
                                                        <input type="image"
                                                               src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypalcheckout-34px.png"
                                                               alt="PayPal Checkout"/>
                                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                                    </form>
                                                    <p class="price-right">To Pay:
                                                        £{{sprintf("%01.2f", $order->total_price)}}</p>
                                                    @if($order->delivery_price > 0)
                                                    <p class="price-right">Less delivery:
                                                        £{{sprintf("%01.2f", $order->delivery_price)}}</p>
                                                    <p class="price-right">Total:
                                                        £{{sprintf("%01.2f", ($order->total_price - $order->delivery_price))}}</p>
                                                        @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    @foreach ($order->items as $item)

                                        <div class="row process-items">
                                            <div class="col-md-4">
                                                <p>Name: {{$item->name}} </p>
                                                <p>Item number: {{sprintf('%04d', $item->id)}}  </p>
                                                <p>Dimensions: {{$item->height}} x {{$item->width}} x {{$item->length}}
                                                    cm</p>
                                                <p>Weight: {{$item->weight}} kg</p>
                                            </div>
                                            <div class="col-md-4">
                                                @if($item->download)
                                                    <div class="{{$item->download->name}}">
                                                        <div id="loader">
                                                            <div class="spinner">
                                                                <div class="dot1">
                                                                </div>
                                                                <div class="dot2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-4">


                                                @if($order->status == 'download')
                                                    <div class="pricing-button">
                                                        <a class="btn btn-primary btn-sm"
                                                           href="{{ url('downloads/download', $item->download->id) }}">
                                                            Download
                                                        </a>
                                                    </div>
                                                @else
                                                    <div>
                                                        <p>Please wait there is a problem with your download</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    @endforeach

                                @endforeach

                            @else

                                <p>No orders to download</p>

                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
