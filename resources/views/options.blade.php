@extends('layouts.options-template')

@section('pageTitle', 'Options')

@section('content')
<div class="container-fluid">
	<h1>
		options to suit your website
	</h1>
	<div class="resolution full-height">
		<h2>
			Resolution
		</h2>

		<p>
			We use a 3:2 aspect ratio.  You can choose the size of either width or height and the other dimesion will automatically change.  
		</p>

		<p>The higher the resolution the clearer the image but the larger the file size and longer to load
		</p>
		<div class="row">
			<div class="col-md-6">
				<div class="uglymanHiRes">
				</div>
				<button class="btn btn-primary full-hires" type="button">
					Full Screen
				</button>
			</div>
			<div class="col-md-6">			
				<div class="uglymanLowRes">
				</div>
				<button class="btn btn-primary full-lowres" type="button">
					Full Screen
				</button>
			</div>
		</div>

		<h5>Example resolutions</h5>

	</div>
</div>
<div class="resolution full-height-orange">
	<h2>Frames</h2>

	<p>
		More frames gives a smooter animation but comes at the cost of file size and slower load times.
	</p>
	<div>
		<h5>
			Example frames
		</h5>
	</div>
</div>
</div>

@endsection