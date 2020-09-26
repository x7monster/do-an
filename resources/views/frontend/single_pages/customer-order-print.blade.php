<!DOCTYPE html>
<html>
<head>
	<title>Hóa Đơn Khách Hàng</title>
	<style type="text/css">
		.mytable tr td{
			padding: 10px
		}
	</style>
</head>
<body>
	<center>
		<table class="mytable" width="900px" border="1">
						<tr style="text-align: center;">
							<td width="30%">
								<img src="{{url('public/upload/logo_images/'.$logo->image)}}" alt="IMG-LOGO" width="200px">
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
						<tr style="text-align: center;">
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
						<tr style="text-align: center;">
							<td colspan="3"><strong>Chi Tiết Đặt Hàng</strong></td>
						</tr>
						<tr style="text-align: center;">
							<td><strong>Tên Sản Phẩm & Hình Ảnh</strong></td>
							<td><strong>Màu & Size</strong></td>
							<td><strong>Số Lượng & Giá</strong></td>
						</tr>
						@foreach($order['order_details'] as $details)
						<tr style="text-align: center;">
							<td>
								<img src="{{url('public/upload/product_images/'.$details['product']['image'])}}" style="width: 50px; height:55px;"> &nbsp; {{$details['product']['name']}}
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
								{{$sub_total}}
							</td>
						</tr>
						@endforeach
						<tr style="text-align: center;">
							<td colspan="2" style="text-align: right;"><strong>Tổng Tiền</strong></td>
							<td><strong>{{$order->order_total}}</strong></td>
						</tr>
					</table>
	</center>
</body>
</html>