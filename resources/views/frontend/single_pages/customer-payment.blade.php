@extends('frontend.layouts.master')
@section('content')
<style type="text/css">
	.sss{
		float: left;
	}
	.s888{
		height: 40px;
		border: 1px solid #e6e6e6;
		margin-top: 0px;
	}
	
</style>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Payment Method
		</h2>
	</section>

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table table-borderd">
							<tr class="table_head">
								<th>Sản Phẩm</th>
								<th>Hình Ảnh</th>
								<th>Size</th>
								<th>Màu</th>
								<th>Giá</th>
								<th>Số Lượng</th>
								<th>Tổng Tiền</th>
								<th>Hành Động</th>
							</tr>
							@php
								$contents = Cart::content();
								$total = 0;
							@endphp
							@foreach($contents as $content)
							<tr class="table_row">
								<td>{{$content->name}}</td>
								<td>
									<div class="how-itemcart1">
										<img src="{{asset('upload/product_images/'.$content->options->image)}}" alt="IMG" style="width:100px; height: 85px; ">
									</div>
								</td>
								<td>{{$content->options->size_name}}</td>
								<td>{{$content->options->color_name}}</td>
								<td>{{number_format($content->price)}} VND</td>
								<td style="width: 200px; min-width: 200px">
									<form method="post" action="{{route('update.cart')}}">
										@csrf
									<div>
										<input class="mtext-104 cl3 txt-center num-product form-control sss" id="qty" type="number" name="qty" value="{{$content->qty}}">
										<input type="hidden" name="rowId" value="{{$content->rowId}}">
										<input type="submit" value="Update" class="flex-c-m stext-101 c12 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
									</div>
								</form>
								</td>
								<td>{{number_format($content->subtotal)}} VND</td>
								<td>
									<a class="btn btn-danger" href="{{route('delete.cart',$content->rowId)}}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@php
							 	$total += $content->subtotal;
							@endphp
							@endforeach
							<tr>
								<td colspan="6" style="text-align: right;"><strong>Tổng Tiền :</strong></td>
								<td colspan="2"><strong>{{number_format($total)}} VND</strong></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<h3>Phương Thức Thanh Toán</h3>
				</div>
				<div class="col-md-4">	
					@if(Session::get('message'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>{{Session::get('message')}}</strong>
                        </div>
                     @endif
				 <form method="post" action="{{route('customer.payment.store')}}">
				 @csrf			
				 @foreach($contents as $content)
				 <input type="hidden" name="product_id" value="{{$content->id}}">
				 @endforeach
				 <input type="hidden" name="order_total" value="{{$total}}">		
					<select name="payment_method" id="payment_method" class="form-control" style="height: 50px">
						<option value="" >Chọn Phương Thức Thanh Toán</option>
						<option value="Hand Cash">Tiền Mặt</option>
						
					</select>
					<font color="red">{{($errors->has('payment_method'))?($errors->first('payment_method')):''}}</font>
					<div class="show_field" style="display: none">
						<span>Bkash No is: 0123456789</span>
						<input type="text" name="transaction_no" class="form-control" placeholder="Write Transaction no">
					</div>
					
					<button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Submit</button>
				</form>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).on('change','#payment_method',function(){
		var payment_method = $(this).val();
		if(payment_method == 'Bkash'){
			$('.show_field').show();
		}else{
			$('.show_field').hide();
		}
	});
</script>
@endsection