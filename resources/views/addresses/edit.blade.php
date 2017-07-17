@extends('layouts.app')

@section('pageTitle', 'Edit Address')

@section('content')
<div class="container">
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Where shall we collect your products from?</h4></div>
				<div class="panel-body">
					{{ Form::model($address, array('route' => array('addresses.update', $address->id), 'method' => 'PUT')) }}

					{{ csrf_field() }}
					<div class="form-group">
						{{ Form::text('house', null, ['class' => 'form-control', ' placeholder' => 'House number or name *', 'required']) }}
					</div>   

					<div class="form-group">
						{{ Form::text('address1', null, ['class' => 'form-control', ' placeholder' => 'Address Line 1  *', 'required']) }}
					</div> 

					<div class="form-group">
						{{ Form::text('address2', null, ['class' => 'form-control', ' placeholder' => 'Address Line 2']) }}                        </div>               

						<div class="form-group">
							{{ Form::text('area', null, ['class' => 'form-control', ' placeholder' => 'Area']) }}
						</div>          

						<div class="form-group">
							{{ Form::text('county', null, ['class' => 'form-control', ' placeholder' => 'County  *', 'required']) }}
						</div>

						<div class="form-group">
							{{ Form::text('postcode', null, ['class' => 'form-control', ' placeholder' => 'Postcode  *', 'required']) }}
						</div>

						<div class="pricing-button">
							{{ Form::submit('Update Address', ['class' => 'btn btn-primary']) }}
						</div>
					</div>

					{{ Form::close() }}
				</div>

				<div class="pricing-button">
                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'addresses.destroy', $address->id ] ])}}

                    <button type="submit" class="icon-size btn">
                        <img src="/images/icons/004-delete.png"> Delete
                    </button>

                    {{ Form::close() }}

                </div>    
			</div>
		</div>

	</div>
</div>
@endsection
