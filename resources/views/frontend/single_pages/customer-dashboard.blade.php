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
			Thông Tin Cá Nhân
		</h2>
	</section>
		<div class="container">
			@if (session('success'))
				<div class="alert alert-success mt-3">
					{{ session('success') }}
				</div>
			@endif


			<div class="row" style="padding: 15px 0px 15px 0px;">
				<div class="col-md-2">
					<ul class="prof">
						<li><a href="{{route('dashboard')}}">Thông Tin</a></li>
						<li><a href="{{route('customer.password.change')}}">Thay đổi mật khẩu</a></li>
						<li><a href="{{route('customer.order.list')}}">Đơn đặt hàng</a></li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="card">
								<div class="card-body">
									<div class="img-circle txt-center">
										<img src="{{(!empty($user->image))?url('upload/user_images/'.$user->image):url('upload/no_img.png')}}" style="width: 130px; height: 140px; border-radius: 5px">
									</div>
									<h3 class="txt-center">{{$user->name}}</h3>
									<p class="txt-center">{{$user->address}}</p>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td>Số Điện Thoại</td>
												<td>{{$user->mobile}}</td>
											</tr>
											<tr>
												<td>Email</td>
												<td>{{$user->email}}</td>
											</tr>
											<tr>
												<td>Giới Tính</td>
												<td>{{ $user->gender == 'Male' ? 'Nam' : 'Nữ' }}</td>
											</tr>
										</tbody>
									</table>
									<a class="btn btn-primary btn-block" href="{{route('customer.edit.profile')}}">Chỉnh Sửa Thông Tin</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection