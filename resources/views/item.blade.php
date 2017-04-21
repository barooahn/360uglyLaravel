@extends('layouts.app')

@section('content')
<div class="container-fluid">

	<h1>Tell us about your products</h1>

    <h3>
        Please give us details about your product for our couriers and photographers.
    </h3>

    <p><b>* Please note products must be under 40cm in each and all dimensions and also less than 10kg *</b></p>

    <form action="{{ url('/item') }}" class="form" id="order" method="post" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" id="name" name="name" placeholder="What is the name of this product?  *" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" id="height" name="height" placeholder="How high is the product? (cm)  *" type="text"/>
        </div>   

        <div class="form-group">
            <input class="form-control" id="length" name="length" placeholder="How long is the product? (cm)  *" type="text"/>
        </div> 

        <div class="form-group">
            <input class="form-control" id="width" name="width" placeholder="How wide is the product? (cm)" type="text"/>
        </div>               
        
        <div class="form-group">
            <input class="form-control" id="weight" name="weight" placeholder="How much does the product weigh? (kg)  *" type="text"/>
        </div>          

        <div class="form-group">
            <button class="btn btn-primary" type="submit" value="submit">Continue</button>
        </div>
    </form>
</div>
@endsection
