@extends('layouts.general')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="home">Your Profile</a></li>
              <li class="active"><a href="process">Orders in Process <span class="badge">{{ Auth::user()->status('process')}}</span></a></li>
              <li><a href="download">Awaiting download <span class="badge">{{ Auth::user()->status('download')}}</span></a></li>
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

                                @foreach ($order->items as $item)

                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Name: {{$item->name}} </p>
                                            <p>Dimensions: {{$item->height}} x {{$item->width}} x {{$item->length}} cm</p>
                                            <p>Weight: {{$item->weight}} kg</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><b>status: {{$order->status}}</b></p>
                                        </div>

                                        <div class="col-md-4">
                                            <div class = "pricing-button">
                                                <a class="btn btn-primary btn-sm" href="{{ url('orders/create') }}">
                                                    Pay now
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

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
