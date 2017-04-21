@extends('layouts.app')

@section('content')
<div class="container-fluid">

	<h1>Collection Address:</h1>

    <h3>
        Where shall we collect your {{$item}} product{{ $item > 1 ? 's' : '' }} from?
    </h3>

    <form action="{{ url('/item') }}" class="form" id="order" method="post" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" id="house" name="house" placeholder="House Number/Name  *" type="text"/>
        </div>   

        <div class="form-group">
            <input class="form-control" id="address1" name="address1" placeholder="Address Line 1  *" type="text"/>
        </div> 

        <div class="form-group">
            <input class="form-control" id="address2" name="address2" placeholder="Address Line 2" type="text"/>
        </div>               
        
        <div class="form-group">
            <input class="form-control" id="area" name="area" placeholder="Area  *" type="text"/>
        </div>          

        <div class="form-group">
            <input class="form-control" id="county" name="county" placeholder="County  *" type="text"/>
        </div>

        <div class="form-group">
            <input class="form-control" id="postcode" name="postcode" placeholder="Postcode  *" type="text"/>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit" value="submit">Continue</button>
        </div>
    </form>
</div>
@endsection
