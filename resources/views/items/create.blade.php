@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- {{$order->items}} -->

    @if(count($order->items) > 0)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Current products</h2>
            @foreach($order->items as $item)
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

                    <button type="submit" class="icon-size btn">
                        <img src="/images/icons/004-delete.png"> Delete
                    </button>

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
        <div>
            Total cost: £{{sprintf("%01.2f", $order->total_price)}}
        </div>
        @if(!$order->post)
        <div>
            <p>Note: The first £5 is included in the price and will be deducted from your outstanding balance.</p>
            <p>We have to pay a third party courier so delivery must be paid before we collect your order</p>  
            Total delivery: £{{sprintf("%01.2f", $order->delivery_price)}}
        </div>
        @endif
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
                    <div class="myform2">
                    <input class="form-control" id="name" name="name" placeholder="What is the name of this product?  *" type="text" required/>
                    </div>
                    <div class="myform2">
                        <input class="form-control" id="height" name="height" placeholder="How high is the product? (cm)  *" type="number" min="1" max="40" required/>

                    </div>   

                    <div class="myform2">
                        <input class="form-control" id="length" name="length" placeholder="How long is the product? (cm)  *" type="number" min="1" max="40" required/>
                    </div> 

                    <div class="myform2">
                        <input class="form-control" id="width" name="width" placeholder="How wide is the product? (cm)" type="number" min="1" max="40" required/>
                    </div>               

                    <div class="myform2">
                        <input class="form-control" id="weight" name="weight" placeholder="How much does the product weigh? (kg)  *" type="number"  max="5" required/>
                    </div>    

                    <div class="myform2">
                        <input type="checkbox" name="return" value="1"> I would like my item returned  <b>Note: A surcharge of £5 is added to your bill</b><br>
                    </div>        

                    <div class="pricing-button">
                        <button class="btn btn-primary btn-lg" type="submit" value="submit">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
