@extends('frontend.layouts.master')
@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center" style="font-family:helvetica; font-weight: bold">
        Danh Sách Yêu Thích
    </h2>
</section>
<section>
    <div class="container">
      <div class="row mt-5 aa-product-catg">
        @foreach($products as $product)
          <div class="col-3 one-product">
            <figure>
              <a class="aa-product-img" href="{{route('products.details.info',$product->slug)}}">
                <img src="{{url('upload/product_images/'.$product->image)}}" alt="polo shirt img" style="height: 300px; width: 100%">
              </a>
              <a class="aa-add-card-btn"href="{{route('products.details.info',$product->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
              <figcaption>
                <h4 class="aa-product-title"><a href="{{route('products.details.info',$product->slug)}}">{{$product->name}}</a></h4>
                <span class="aa-product-price">{{number_format($product->price)}} VND</span>
              </figcaption>
              <span class="aa-badge aa-sale" href="#">SALE!</span>
            </figure>

            <div class="aa-product-hvr-content">
              <a href="" class="remove-wish-list" data-toggle="tooltip" data-placement="top"  
                data-id="{{ $product->id }}" title="Xóa khỏi danh sách yêu thích">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
              <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
              <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
            </div>
            <!-- product badge -->
          </div>
        @endforeach

        @if (count($products) == 0)
          <p class="nothing-wishlist">Không có sản phẩm nào trong danh sách yêu thích</p>
        @endif

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
@endsection