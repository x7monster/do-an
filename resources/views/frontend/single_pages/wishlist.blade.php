@extends('frontend.layouts.master')
@section('content')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center" style="font-family:helvetica; font-weight: bold">
			Liên Hệ
		</h2>
	</section>

	<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                  	<thead>
                      <tr>
                        <th>Action</th>
                        <th>Picture</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th>Add To Cart</th>
                      </tr>
                    </thead>
                  	<?php
                   	if($products->isEmpty()) { ?>

                   		<h4>Sorry, Products not found</h4>
               <?php } else{ ?>
               		@foreach($products as $product)

               		<tbody>
                      <tr>
                        <td><a class="remove" href="#"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{url('public/upload/product_images/'.$product->image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$product->name}}</a></td>
                        <td>{{number_format($product->price)}} VND</td>
                        <td>In Stock</td>
                        <td><a href="" class="aa-add-to-cart-btn">Add To Cart</a></td>
                      </tr>
                     
                      </tbody>

               		@endforeach
               <?php }?>
                  </table>
                </div>
             </form>             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection

