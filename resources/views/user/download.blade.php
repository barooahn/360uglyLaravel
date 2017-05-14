@extends('layouts.general')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="home">Your Profile</a></li>
              <li><a href="process">Orders in Process <span class="badge">{{ Auth::user()->process() }}</span></a></li>
              <li class="active"><a href="download">Awaiting download <span class="badge">{{ Auth::user()->download() }}</span></a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <h1>Orders ready for download</h1>

                    @if($user->download() > 0)

                        @foreach ($user->getDownload() as $download)

                            <h4>Order number: 000{{$download->id }}</h4>

                            @foreach ($download->items as $item)

                                <p>Name: {{$item->name}} </p>
                                <p>Dimensions: {{$item->height}} x {{$item->width}} x {{$item->length}} cm</p>
                                <p>Weight: {{$item->weight}} kg</p>

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
