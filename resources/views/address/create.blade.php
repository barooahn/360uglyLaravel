@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Collection Address:</h1>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Where shall we collect your products from?</h4></div>
                <div class="panel-body">

                    <form action="{{ url('/address') }}" class="form" id="order" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" id="house" name="house" placeholder="House Number/Name  *" type="text" required/>
                        </div>   

                        <div class="form-group">
                            <input class="form-control" id="address1" name="address1" placeholder="Address Line 1  *" type="text" required/>
                        </div> 

                        <div class="form-group">
                            <input class="form-control" id="address2" name="address2" placeholder="Address Line 2" type="text"/>
                        </div>               

                        <div class="form-group">
                            <input class="form-control" id="area" name="area" placeholder="Area  " type="text"/>
                        </div>          

                        <div class="form-group">
                            <input class="form-control" id="county" name="county" placeholder="County  *" type="text" required/>
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="postcode" name="postcode" placeholder="Postcode  *" type="text" required/>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" value="submit">Add Address</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>Or post to here:</h1>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>You can post the products if you prefer</h4></div>
                <div class="panel-body">
                    <p>address here</p>
                </div>
                <div class="pricing-button">
                    <a class="btn btn-primary btn-lg" href="{{ url('item') }}">
                        Continue
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
