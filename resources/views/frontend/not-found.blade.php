@extends('frontend.layouts')
@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/10.jpg)">
        <div class="auto-container">
			<h2>Not Found</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="index.html">Home</a></li>
				<li>404</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!--Error Section-->
    <section class="error-section">
    	<div class="auto-container">
        	<div class="content">
            	<h1>404</h1>
                <h2>Oops! That page can’t be found</h2>
                <div class="text">Sorry, but the page you are looking for does not existing</div>
				<a href="index.html" class="theme-btn btn-style-four"><span class="txt">Go to Home Page</span></a>
            </div>
        </div>
    </section>
    <!--End Error Section-->

@endsection
