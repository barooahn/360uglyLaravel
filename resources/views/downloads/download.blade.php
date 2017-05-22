@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Your download should start automatically</div>
				<div class="panel-body">
					<p>If your download hasn't started please click <a href="{{ URL::to( $path)  }}" target="_blank">here</a>.</p>

					<p><b>Please read the Install Instructions attached in the zip of your files - install.txt or install.pdf</b></p>

				</div>
			</div>
		</div>
	</div>
		<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default instructions">
				<div class="panel-heading">ADDING THE 360 PRODUCT TO YOUR WEBSITE</div>
				<div class="panel-body">

					<h1>QUICK START</h1> 

					<h3>UNZIP FILES TO SAME DIRECTORY AS WEBPAGE DISPLAYING 360 PRODUCT</h3>

					<img src="/images/zip_download_files.png">

					<h3>COPY AND PASTE THIS CODE TO YOUR WEBSITE</h3> 
												<pre><xmp><script src="randj.js"></script>
<div style="height:400px; width:600px;" class="Example00020002"></div>
<script src="Example00020002.js"></script></xmp></pre>

					<p><b>Note: </b></p>

						<p><b>The first line:</b></p>  	
						<pre><xmp><script src="randj.js"></script></xmp></pre>

						<p><b>Must be located above </b></p> 

						<p><b>the last line :  </b></p>
						<pre><xmp><script src="Example00020002.js"></script></xmp></pre>


						<p><b>Order is important! </b></p>


						<p><b>Note: </b></p>

						<p><b>The files and folder Must be in the same folder as the webpage you wish to display the 360 image in.  </b></p>


					
						<h1>FULL INSTRUCTIONS</h1> 

						<h3>Download</h3> 
						<p>Download from ‘Ready for download’ tab in your profile page:  </p>
						<p>Once you have downloaded your file you should have a Zip file, which should be something like Example00020002.zip.   
						Note: The numbers will be different for your download. </p>

						<img src="/images/zip.png">


						<h3>UNZIP TO YOUR WEBSITE </h3>
						<p>Next you need to unzip the file with a program like WinZip.  If you don’t have the program it is free to download and the link is below.  <p> 

						<a href="http://www.winzip.com/landing/download-winzip.html">http://www.winzip.com/landing/download-winzip.html</a>

						<p>Extract the files to the directory you wish to use your 360 Image.</p> 

						<img src="/images/zip_download_files.png">

						<p>Here myWebsite.html is the site you wish to use the 360 download in.  The other 2 files and folder are your download.</p> 

						<h3>SAMPLE WEBSITE WITH 360 PRODUCT CALLED: EXAMPLE00020002 </h3>
						<p>If we look in the myWebsite.html file: </p>

						<img src="/images/download_website_html.png">

						<h3>WHAT DO I DO? </h3>
						<p>There are 3 lines of code you will need to add: </p>

						<pre><xmp><script src="randj.js"></script> 
<div style="height:400px; width:600px;" class="Example00020002"></div> 
<script src="Example00020002.js"></script></xmp></pre> 

						<p><b>Note:</b></p> 

						<p><b>The first line:  </b></p> 
						<pre><xmp><script src="randj.js"></script></xmp></pre> 
						<p><b>Must be located above  </b></p> 

						<p><b>the last line :  </b></p> 
						<pre><xmp><script src="Example00020002.js"></script></xmp></pre>  

						<p><b>Order is important! </b></p> 

						<h3>What does this code do?</h3>
						<pre><xmp><script src="randj.js"></script></xmp></pre> 
						<p>• Loads the libraries needed to run your 360 product</p>  
						<pre><xmp><script src="Example00020002.js"></script></xmp></pre> 
						<p>• Loads your 360 product</p>  
						<pre><xmp><div style="height:400px; width:600px;" class="Example00020002"></div></xmp></pre>   
						<p>The place where you want the 360 product to display.  The width and height values can be omitted or changed if required  
						e.g.</p> 
						<pre><xmp><div class="Example00020002"></div></xmp></pre>  
						<p>or,</p> 
						<pre><xmp><div style="height:200px; width:300px;" class="Example00020002"></div></xmp></pre> 

						<p><b>Note: </b></p>

						<p><b>The files and folder Must be in the same folder as the webpage you wish to display the 360 image in.   </b></p>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">location.href = "{{ URL::to( $path)  }}";</script>
@endsection

