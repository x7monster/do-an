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
			Giỏ Hàng
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
						</table>
					</div>
				</div>

				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1" style="font-family:helvetica; font-weight: bold">
                                    <h5>BẠN MUỐN LÀM GÌ TIẾP THEO ?</h5>

                                </th>
                            </tr>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="total_area">
                                        <ul>
                                        <li>Tổng Tiền Giỏ Hàng <span>{{number_format($total)}} VND</span></li>
                                        <li>Thuế Thêm <span>0.00</span> VND</li>
                                        <li>Tiền Vận Chuyển <span>Miễn Phí</span></li>
                                        <li>Tổng Tiền<span>{{number_format($total)}} VND</span></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm" style="font-family:helvetica;">
                        <div class="flex-w flex-m m-r-20 m-tb-5" style="font-family:helvetica;">
                            <a href="" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" style="font-family:helvetica;">Tiếp Tục Mua Hàng</a>
                            &nbsp;&nbsp;
                            @if(@Auth::user()->id != NULL && Session::get('shipping_id') ==NULL)
                            <a href="{{route('customer.checkout')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Thanh Toán</a>
                            @elseif(@Auth::user()->id != NULL && Session::get('shipping_id') !=NULL)
                            <a href="{{route('customer.payment')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Thanh Toán</a>
                            @else
                            <a href="{{route('customer.login')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Thanh Toán</a>
                            @endif 
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection