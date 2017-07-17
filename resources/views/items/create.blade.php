@extends('layouts.app')

@section('pageTitle', 'Add Item')

@section('content')
<div class="container">
    <!-- {{$order->items}} -->

    @if(count($order->items) > 0)
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h1>Current products</h1>
                    <div>
                        <h4>Total cost: £{{sprintf("%01.2f", $order->total_price)}}</h4>
                    </div>
                    @if(!$order->post)
                    <div>
                        <h4>Total delivery: £{{sprintf("%01.2f", $order->delivery_price)}}</h4>
                    </div>
                    @endif
                </div> 
                <div class="panel-body">
                    <div class="pricing-button">
                        <a class="btn btn-primary btn-lg" href="{{ url('confirm') }}">
                            Complete order
                        </a>
                    </div>


                    @foreach($order->items as $item)
                        <div class="col-xs-12 col-sm-5 itemthumb">
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
        </div>


@endif

        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Add product to order</h1>

                    <h4>
                        Please give us your product details
                    </h4>
                </div>
                <div class="panel-body">

                    <p><b>Please note products must be under 40cm in each and all dimensions and also less than 5kg</b></p>

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
