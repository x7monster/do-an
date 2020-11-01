@extends('frontend.layouts.master')
@section('content')
<style type="text/css">
	.prof li{
		background: #1781BF;
		padding: 10px;
		margin: 3px;
	}
	.prof li a {
		color: #fff;
		padding-left: 15px;
	}
</style>
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Đơn đặt hàng của tôi
		</h2>
	</section>
		<div class="container">
			<div class="row" style="padding: 15px 0px 15px 0px;">
				<div class="col-md-3">
					<ul class="prof">
						<li><a href="{{route('dashboard')}}">Thông tin</a></li>
						<li><a href="{{route('customer.password.change')}}">Thay đổi mật khẩu</a></li>
						<li><a href="{{route('customer.order.list')}}">Đơn đặt hàng</a></li>
					</ul>
				</div>
				<div class="col-md-9">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Mã đơn hàng</th>
								<th>Tổng tiền</th>
								<th>Loại</th>
								<th>Trạng thái</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td># {{$order->order_no}}</td>
								<td>{{$order->order_total}}</td>
								<td>
									{{$order['payment']['payment_method']}}
									@if($order['payment']['payment_method']=='Bkash')
									(Transaction no : {{$order['payment']['transaction_no']}})
									@endif
								</td>
								<td>
									@if($order->status=='0')
									<span style="background: #DD4F42; padding: 5px; color: white">Unapproved</span>
									@elseif($order->status=='1')
									<span style="background: green; padding: 5px; color: white">Approved</span>
									@endif
								</td>
								<td>
									<a title="Details" href="{{route('customer.order.details',$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
									<a title="Print" target="_blank" href="{{route('customer.order.print',$order->id)}}" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
@endsection