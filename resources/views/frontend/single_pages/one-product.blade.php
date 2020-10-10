<div class="col-6 col-md-4 col-lg-3 one-product">
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