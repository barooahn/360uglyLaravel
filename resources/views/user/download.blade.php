@extends('layouts.download')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="/user/home">Your Profile</a></li>
              <li><a href="/user/process">Orders in Process <span class="badge">{{ Auth::user()->status('process')}}</span></a></li>
              <li class="active"><a href="/user/download">Ready for download <span class="badge">{{ Auth::user()->status('download')}}</span></a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <h1>Ready for download</h1>

                    <div class="col-md-12">
                        @if($user->status('download') > 0)

                            @foreach ($user->getDownload() as $order)

                                <h4>Order number:{{sprintf('%04d', $order->id)}} </h4>

                                @foreach ($order->items as $item)

                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Name: {{$item->name}} </p>
                                            <p>Item number: {{sprintf('%04d', $item->id)}}  </p>
                                            <p>Dimensions: {{$item->height}} x {{$item->width}} x {{$item->length}} cm</p>
                                            <p>Weight: {{$item->weight}} kg</p>
                                        </div>
                                        <div class="col-md-4">
                                            @if($item->download)
                                                <div class="{{$item->download->name}}"></div>
                                            @endif
                                        </div>

                                        <div class="col-md-4">
                                            @if($item->download)
                                                <div class = "pricing-button">
                                                    <a class="btn btn-primary btn-sm" href="{{ url('downloads/download', $item->download->id) }}">
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
</div>
@endsection
