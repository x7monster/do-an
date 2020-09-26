@extends('frontend.layouts.master')
@section('content')
<style type="text/css">
	.prof li{
		background: #1781BF;
		padding: 7px;
		margin: 3px;
		border-radius: 10px;
	}
	.prof li a {
		color: #fff;
		padding-left: 15px;
	}
	.mytable tr td{
		padding: 10px
	}
</style>
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Chi Tiết Đơn Hàng
		</h2>
	</section>
		<div class="container">
			<div class="row" style="padding: 15px 0px 15px 0px;">
				<div class="col-md-2">
					<ul class="prof">
						<li><a href="{{route('dashboard')}}">Thông Tin</a></li>
						<li><a href="{{route('customer.password.change')}}">Đổi Mật Khẩu</a></li>
						<li><a href="{{route('customer.order.list')}}">Đơn Đặt Hàng</a></li>
					</ul>
				</div>
				<div class="col-md-10">
					<table class="txt-center mytable" width="100%" border="1">
						<tr>
							<td width="30%">
								<img src="{{url('upload/logo_images/'.$logo->image)}}" alt="IMG-LOGO" width="200px">
							</td>
							<td width="40%">
								<h3><strong>BH SHOP 2020</strong></h3>
								<span><strong>Số Điện Thoại:</strong>{{$contact->mobile_no}}</span><br>
								<span><strong>Email:</strong>{{$contact->email}}</span><br>
								<span><strong>Địa Chỉ:</strong>{{$contact->address}}</span><br>
							</td>
							<td width="30%">
								<strong>Thứ Tự Đơn Hàng: # {{$order->order_no}}</strong>
							</td>
						</tr>
						<tr>
							<td><strong>Thông Tin Hóa Đơn:</strong></td>
							<td colspan="2" style="text-align: left;">
								<strong>Tên:</strong> {{$order['shipping']['name']}} <br>
								<strong>Số Điện Thoại:</strong> {{$order['shipping']['mobile_no']}} <br>
								<strong>Email:</strong> {{$order['shipping']['email']}} <br>
								<strong>Địa Chỉ:</strong> {{$order['shipping']['address']}} <br>
								<strong>Thanh Toán:</strong> 
									{{$order['payment']['payment_method']}}
									@if($order['payment']['payment_method']=='Bkash')
									(Transaction no : {{$order['payment']['transaction_no']}})
									@endif
							</td>
						</tr>
						<tr>
							<td colspan="3"><strong>Chi Tiết Hóa Đơn</strong></td>
						</tr>
						<tr>
							<td><strong>Tên Sản Phẩm & Hình Ảnh</strong></td>
							<td><strong>Màu & Kích Thước</strong></td>
							<td><strong>Số Lượng & Giá</strong></td>
						</tr>
						@foreach($order['order_details'] as $details)
						<tr>
							<td>
								<img src="{{url('upload/product_images/'.$details['product']['image'])}}" style="width: 50px; height:55px;"> &nbsp; {{$details['product']['name']}}
							</td>
							<td>
								{{$details['color']['name']}} & {{$details['size']['name']}}
							</td>
							<td>
								@php
									$sub_total = $details->quantity*$details['product']['price'];
								@endphp
								{{$details->quantity}} x 
								{{$details['product']['price']}} = 
								{{number_format($sub_total)}} VND
							</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="2" style="text-align: right;"><strong>Tổng Tiền :</strong></td>
							<td><strong>{{number_format($order->order_total)}} VND</strong></td>

						</tr>
					</table>
				</div>
			</div>
		</div>
@endsection