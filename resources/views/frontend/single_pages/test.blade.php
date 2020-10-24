@extends('frontend.layouts.master')
@section('content')

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
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center" style="font-family:helvetica; font-weight: bold">
		San Pham
	</h2>
</section>
<section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="mt-3 aa-product-catg">
            @foreach($products as $product)
              <div class="col-6 col-md-3 one-product">
                <figure>
                  <a class="aa-product-img" href="{{route('products.details.info',$product->slug)}}">
                  <img src="{{url('upload/product_images/'.$product->image)}}" alt="polo shirt img" style="height: 300px; width: 100%">
                  </a>
                  <a class="aa-add-card-btn"href="{{route('products.details.info',$product->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                  <h4 class="aa-product-title"><a href="{{route('products.details.info',$product->slug)}}">{{$product->name}}</a></h4>
                  @if($product->sale)
                    <span class="text-muted">
                    <s>{{number_format($product->price)}} VND</s>
                    </span>
                    <span class="aa-product-price">{{ calcPrice($product->price, $product->sale) }} VND</span>
                  @else
                    <span class="aa-product-price">{{number_format($product->price)}} VND</span>
                  @endif
                  </figcaption>
                  @if($product->sale)
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                  @endif
                </figure>

                <div class="aa-product-hvr-content">
                  <a href="" class="add-wish-list" data-toggle="tooltip" data-placement="top" title="Add to Wishlist" 
                  data-id="{{ $product->id }}">
                  <span class="fa fa-heart-o"></span>
                  </a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                </div>
                  <!-- product badge -->
              </div>
            @endforeach
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
              	@foreach($categories as $category)
                <li><a href="{{route('category.wise.product',$category->category_id)}}">{{$category['category']['name']}}</a></li>
                @endforeach
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Brands</h3>
              <div class="tag-cloud">
              	@foreach($brands as $brand)
                <a href="{{route('brand.wise.product',$brand->brand_id)}}"> {{$brand['brand']['name']}}</a>
                @endforeach
              </div>
            </div>
            <!-- single sidebar -->
           
            <!-- single sidebar -->
            
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                	@foreach($products2 as $product)
                  <li>
                    <a href="{{route('products.details.info',$product->slug)}}" class="aa-cartbox-img"><img alt="img" src="{{url('upload/product_images/'.$product->image)}}"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="{{route('products.details.info',$product->slug)}}">{{$product->name}}</a></h4>
                      <p>{{number_format($product->price)}} VND</p>
                    </div>                    
                  </li>
                    @endforeach                      
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                	@foreach($products3 as $product)
                  <li>
                    <a href="{{route('products.details.info',$product->slug)}}" class="aa-cartbox-img"><img alt="img" src="{{url('upload/product_images/'.$product->image)}}"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="{{route('products.details.info',$product->slug)}}">{{$product->name}}</a></h4>
                      <p>{{number_format($product->price)}} VND</p>
                    </div>                    
                  </li>    
                   @endforeach                         
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
      </div>
    </div>
</section>


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
  <script src="{{asset('frontend3')}}/js/custom.js"></script> 
@endsection