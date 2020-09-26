@extends('frontend.layouts.master')
@section('content')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Thông Tin
		</h2>
	</section>
	<section class="about_us">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 style="padding-top: 15px; padding-bottom:5px; border-bottom: 1px solid black;width: 11%;">Thông Tin</h3>
					<p>{{@$about->description}}</p>
				</div>
			</div>
		</div>
	</section>
@endsection