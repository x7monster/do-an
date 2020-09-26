@extends('frontend.layouts.master')
@section('content')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Thông Tin Thanh Toán Khách Hàng
		</h2>
	</section>
	<section class="about_us">
		<div class="container">
			<div class="row" style="padding: 20px 0px 20px 0px">
				<div class="col-md-12">
					 <form method="post" action="{{route('customer.checkout.store')}}" id="checkoutForm">
                       @csrf
                       <div class="row">
                           <div class="col-md-6">
                               <label>Tên Đầy Đủ</label>
                               <input type="text" name="name" class="form-control">
                               <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                           </div>
                           <div class="col-md-6">
                               <label>Email</label>
                               <input type="email" name="email" class="form-control">
                           </div>
                           <div class="col-md-6">
                               <label>Số Điện Thoại</label>
                               <input type="text" name="mobile_no" class="form-control">
                               <font color="red">{{($errors->has('mobile_no'))?($errors->first('mobile_no')):''}}</font>
                           </div>
                           <div class="col-md-6">
                               <label>Địa Chỉ</label>
                               <input type="text" name="address" class="form-control">
                               <font color="red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                           </div>
                           <div class="col-md-4" style="padding-top: 30px">
                               <button type="submit" class="btn btn-primary">Xác Nhận</button>
                           </div>
                       </div>
                   </form>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
    $(document).ready(function () {
          $('#checkoutForm').validate({
            rules: {
              name: {
                required: true,
              },
              mobile_no: {
                required: true,
              },
              address: {
                required: true,
                }
              },
            messages: {
              name : {
                required : 'Nhập tên khách hàng',
              },
              mobile_no : {
                required : 'Nhập số điện thoại khách hàng',
              },
              address: {
                required: 'Nhập địa chỉ khách hàng',
              }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
</script>
@endsection