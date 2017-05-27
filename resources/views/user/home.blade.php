@extends('layouts.general')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="/user/home">Your Profile</a></li>
              <li><a href="/user/process">Orders in Process <span class="badge">{{ Auth::user()->status('process')}}</span></a></li>
              <li><a href="/user/download">Ready for download <span class="badge">{{ Auth::user()->status('download')}}</span></a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>{{$user->name}} you are logged in! </p>

                    <h1>Addresses</h1>

                    @if(count($user->addresses) > 0)
                        <div class="col-md-3">

                            @foreach($user->addresses as $address)
                                <p>{{$address->house}} {{$address->address1}}</p>
                                <p>{{$address->address2}}</p>
                                <p>{{$address->area}}</p>
                                <p>{{$address->county}}</p>
                                <p>{{$address->postcode}}</p>             
                            @endforeach

                        </div>
                        <div class="col-md-9">
                            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                        </div>
                    @else

                        <p>No address saved</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
