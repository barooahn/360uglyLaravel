@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- {{$items}} -->

    @if($items != null)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Current products</h2>
            @foreach($items as $item)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 itemthumb">
                <h4>{{$item->name}}</h4>
                <p>Dimensions: {{$item->height}} x {{$item->width}} x {{$item->length}} cm</p>
                <p>Weight: {{$item->weight}} kg</p>
                <p>Price: £{{sprintf("%01.2f", $item->price)}}</p>
                @if($item->return == 0)
                    <p>Return item: N</p>
                @else
                    <p>Return item: Y</p>
                @endif

                <div class="pricing-button">
                     {{ Form::open(array('url' => 'items/' . $item->id, 'class' => '')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                   
               </div> 
           </div>
           @endforeach
       </div>
   </div>
   <div class="row">
    <div class="col-md-8 col-md-offset-2">
       <div class="pricing-button">
        <a class="btn btn-primary btn-lg" href="{{ url('confirm') }}">
            Complete order
        </a>
    </div> 
</div>
</div>
@endif

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Add product to order</h1>
        <div class="panel panel-default">
            <div class="panel-heading">

               <h4>
                Please give us details about your product for our couriers and photographers.
            </h4>
        </div>
        <div class="panel-body">

            <p><b>* Please note products must be under 40cm in each and all dimensions and also less than 10kg *</b></p>

            <form action="{{ url('/items') }}" class="form" id="order" method="post" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <input class="form-control" id="name" name="name" placeholder="What is the name of this product?  *" type="text" required/>
                </div>
                <div class="form-group">
                    <input class="form-control" id="height" name="height" placeholder="How high is the product? (cm)  *" type="text" required/>
                </div>   

                <div class="form-group">
                    <input class="form-control" id="length" name="length" placeholder="How long is the product? (cm)  *" type="text" required/>
                </div> 

                <div class="form-group">
                    <input class="form-control" id="width" name="width" placeholder="How wide is the product? (cm)" type="text" required/>
                </div>               

                <div class="form-group">
                    <input class="form-control" id="weight" name="weight" placeholder="How much does the product weigh? (kg)  *" type="text" required/>
                </div>    

                <div class="form-group">
                    <input type="checkbox" name="return" value="1"> I would like my item returned  <b>Note: A surcharge of £5 is added to your bill</b><br>
                </div>        

                <div class="pricing-button">
                    <button class="btn btn-primary btn-lg" type="submit" value="submit">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
