@extends('frontend.layouts.master')
@section('content')
@include('frontend.layouts.search')
	@include('frontend.layouts.slider')


	<!-- Product -->

	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">

				
				</div>


				<!-- Filter -->
				
			</div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<h3 style="text-align: center">SẢN PHẨM MỚI</h3><br>
      <div class="row mt-3 aa-product-catg">
        @foreach($products as $product)
          @include('frontend.single_pages.one-product', $product)
        @endforeach

        <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">                      
              <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                  <!-- Modal view slider -->
                  <div class="col-md-6 col-sm-6 col-xs-12">                              
                    <div class="aa-product-view-slider">                                
                      <div class="simpleLens-gallery-container" id="demo-1">
                        <div class="simpleLens-container">
                            <div class="simpleLens-big-image-container">
                                <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                    <img src="{{asset('frontend3')}}/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                </a>
                            </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
                  <!-- Modal view content -->
                  
                </div>
              </div>                        
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
      </div>
			
			<h3 style="text-align: center">THƯƠNG HIỆU NỔI TIẾNG</h3><br>
			<div class="row mt-3 aa-product-catg">
        @foreach($products2 as $product)
          @include('frontend.single_pages.one-product', $product)
        @endforeach

        <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">                      
              <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                  <!-- Modal view slider -->
                  <div class="col-md-6 col-sm-6 col-xs-12">                              
                    <div class="aa-product-view-slider">                                
                      <div class="simpleLens-gallery-container" id="demo-1">
                        <div class="simpleLens-container">
                            <div class="simpleLens-big-image-container">
                                <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                    <img src="{{asset('frontend3')}}/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                </a>
                            </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
                  <!-- Modal view content -->
                  
                </div>
              </div>                        
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>

        <div class="aa-product-catg-pagination">
          <nav>
          </nav>
        </div>
      </div>
			
		</div>
	</section>


	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="{{asset('frontend3')}}/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('frontend3')}}/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{asset('frontend3')}}/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend3')}}/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend3')}}/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend3')}}/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('frontend3')}}/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{asset('frontend3')}}/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{asset('frontend3')}}/css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  

  </head>
	<section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->

  <!-- / Testimonial -->

  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              @foreach($news as $key => $news)
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="{{route('news.details',$news->id)}}"><img src="{{asset('upload/news_images/'.$news->image)}}" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      
                      <span href="#"><i class="fa fa-clock-o"></i>{{$news->created_at}}</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="{{route('news.details',$news->id)}}">{{$news->title}}</a></h3>
                    <p>{{$news->description}}</p> 
                    <a href="{{route('news.details',$news->id)}}" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              @endforeach
              <!-- single latest blog -->
              
              <!-- single latest blog -->
             
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              @foreach($sponsor as $key => $sponsor)
              <li><a href="#"><img src="{{asset('upload/sponsor_images/'.$sponsor->image)}}" alt="java img" style="height: 100px"></a></li>
             @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

<section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Subscribe section -->
 

  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('frontend3')}}/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{asset('frontend3')}}/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('frontend3')}}/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="{{asset('frontend3')}}/js/sequence.js"></script>
  <script src="{{asset('frontend3')}}/js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('frontend3')}}/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="{{asset('frontend3')}}/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('frontend3')}}/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('frontend3')}}/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="asset('frontend3')}}/js/custom.js"></script> 


@endsection