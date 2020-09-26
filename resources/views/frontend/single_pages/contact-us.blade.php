@extends('frontend.layouts.master')
@section('content')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center" style="font-family:helvetica; font-weight: bold">
			Liên Hệ
		</h2>
	</section>

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116" style="margin-right: -550px">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Gữi tin nhắn cho chúng tôi
                        </h4>
                        @if(Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>{{Session::get('success')}}</strong>
                        @endif
                        <form method="post" action="{{route('contact.store')}}">
						@csrf
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Tên Đầy Đủ" value="" required="">
                            <img class="how-pos4 pointer-none" src="{{asset('public/frontend')}}/images/icons/user.png" alt="ICON">
                            <font color="red"><b></b></font>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Địa Chỉ Email" value="" required="">
                            <img class="how-pos4 pointer-none" src="{{asset('public/frontend')}}/images/icons/icon-email.png" alt="ICON">
                            <font color="red"><b></b></font>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="number" name="mobile_no" placeholder="Số điện thoại" value="" required="">
                            <img class="how-pos4 pointer-none" src="{{asset('public/frontend')}}/images/icons/mobile.png" alt="ICON">
                            <font color="red"><b></b></font>
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" placeholder="Địa chỉ" value="" required="">
                            <img class="how-pos4 pointer-none" src="{{asset('public/frontend')}}/images/icons/user.png" alt="ICON">
                            <font color="red"><b></b></font>
                        </div>

                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Tin nhắn của bạn" required=""></textarea>
                            <font color="red"><b></b></font>
                        </div>

                        <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Xác Nhận
                        </button>
                    </form>
				</div>

			
			</div>
		</div>
	</section>	
	
	<!-- Map -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.5983460988937!2d90.42140761445673!3d23.79731309290065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7ba919c9e8f%3A0x74c8c1dc2d04bd18!2sNatun%20Bazar%20Foot%20Over%20Bridge%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1575619103631!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div><br/>
@endsection