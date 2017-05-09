@extends('layouts.general')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
              <li role="presentation" class="active"><a href="#">Your Profile</a></li>
              <li role="presentation"><a href="#">Orders in Process</a></li>
              <li role="presentation"><a href="#">Awaiting download</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
