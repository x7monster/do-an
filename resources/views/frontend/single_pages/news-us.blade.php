@extends('frontend.layouts.master')
@section('content')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			HOT NEWS
		</h2>
	</section>
	<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{asset('frontend2')}}/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>TIN TỨC</title>
		<link href="{{asset('frontend2')}}/https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/linearicons.css">
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/bootstrap.css">
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/magnific-popup.css">
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/nice-select.css">
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/animate.min.css">
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/owl.carousel.css">
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/jquery-ui.css">
		<link rel="stylesheet" href="{{asset('frontend2')}}/css/main.css">
	</head>
	<body>
		
		<div class="site-main-container">
			<!-- Start top-post Area -->
			
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start latest-post Area -->
							<div class="latest-post-wrap">
								<h4 class="cat-title">TIN MỚI</h4>
								@foreach($news as $key => $news)
								<div class="single-latest-post row align-items-center">
									<div class="col-lg-5 post-left">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="{{asset('upload/news_images/'.$news->image)}}" alt="">
										</div>
									</div>
									<div class="col-lg-7 post-right">
										<a href="{{route('news.details',$news->id)}}">
											<h4>{{$news->title}}</h4>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-user"></span>Quản Trị Viên</a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$news->created_at}}</a></li>
											
										</ul>
										<p class="excert">
											{{$news->description}}
										</p>
									</div>
								</div>
								@endforeach
								<div class="load-more">
									<a href="{{asset('frontend2')}}/#" class="primary-btn">Xem Thêm</a>
								</div>
								
							</div>
							<!-- End latest-post Area -->
						</div>
						<div class="col-lg-4">
							<div class="sidebars-area">
								
								<div class="single-sidebar-widget most-popular-widget">
									<h6 class="title">Tin Liên Quan</h6>
									@foreach($news2 as $key => $news2)
									<div class="single-list flex-row d-flex">
										<div class="thumb">
											<img src="{{asset('upload/news_images/'.$news2->image)}}" alt="" style="height: 50px">
										</div>
										<div class="details">
											<a href="{{route('news.details',$news2->id)}}">
												<h6>{{$news2->title}}</h6>
											</a>
											<ul class="meta">
												<li><a href="{{asset('frontend2')}}/#"><span class="lnr lnr-calendar-full"></span>{{$news2->created_at}}</a></li>
											
											</ul>
										</div>
									</div>
									@endforeach
								</div>
								<div class="single-sidebar-widget social-network-widget">
									<h6 class="title">Social Networks</h6>
									<ul class="social-list">
										<li class="d-flex justify-content-between align-items-center fb">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-facebook" aria-hidden="true"></i>
												<p>983 Likes</p>
											</div>
											<a href="{{asset('frontend2')}}/#">Like our page</a>
										</li>
										<li class="d-flex justify-content-between align-items-center tw">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-twitter" aria-hidden="true"></i>
												<p>983 Followers</p>
											</div>
											<a href="{{asset('frontend2')}}/#">Follow Us</a>
										</li>
										<li class="d-flex justify-content-between align-items-center yt">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-youtube-play" aria-hidden="true"></i>
												<p>983 Subscriber</p>
											</div>
											<a href="{{asset('frontend2')}}/#">Subscribe</a>
										</li>
										<li class="d-flex justify-content-between align-items-center rs">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-rss" aria-hidden="true"></i>
												<p>983 Subscribe</p>
											</div>
											<a href="{{asset('frontend2')}}/#">Subscribe</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End latest-post Area -->
		</div>
		
		<!-- start footer Area -->
		
		<!-- End footer Area -->
		<script src="{{asset('frontend2')}}/js/vendor/jquery-2.2.4.min.js"></script>
		<script src="{{asset('frontend2')}}/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="{{asset('frontend2')}}/js/vendor/bootstrap.min.js"></script>
		<script src="{{asset('frontend2')}}/https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="{{asset('frontend2')}}/js/easing.min.js"></script>
		<script src="{{asset('frontend2')}}/js/hoverIntent.js"></script>
		<script src="{{asset('frontend2')}}/js/superfish.min.js"></script>
		<script src="{{asset('frontend2')}}/js/jquery.ajaxchimp.min.js"></script>
		<script src="{{asset('frontend2')}}/js/jquery.magnific-popup.min.js"></script>
		<script src="{{asset('frontend2')}}/js/mn-accordion.js"></script>
		<script src="{{asset('frontend2')}}/js/jquery-ui.js"></script>
		<script src="{{asset('frontend2')}}/js/jquery.nice-select.min.js"></script>
		<script src="{{asset('frontend2')}}/js/owl.carousel.min.js"></script>
		<script src="{{asset('frontend2')}}/js/mail-script.js"></script>
		<script src="{{asset('frontend2')}}/js/main.js"></script>
	</body>
</html>		
@endsection

