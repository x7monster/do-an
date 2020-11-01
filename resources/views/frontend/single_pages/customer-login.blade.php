@extends('frontend.layouts.master')
@section('content')
<style type="text/css">
#login .container #login-row #login-column #login-box {
  max-width: 600px;
  border: 1px solid #9C9C9C;
  margin-bottom: 100px;
  margin-top: 40px;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Đăng Nhập Khách Hàng
		</h2>
	</section>
	 <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('login')}}" method="post">
                          @csrf
                          @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          @foreach($errors->all() as $error)
                          <strong>{{$error}}</strong><br/>
                          @endforeach
                      </div>
                        @endif
                        @if(Session::get('message'))
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>{{Session::get('message')}}</strong>
                        </div>
                        @endif
                            <h3 class="text-center text-info">Đăng Nhập</h3>
                            <div class="form-group">
                                <label class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-info">Mật Khẩu:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md mr-3" value="Login">
                                <i class="fa fa-user"></i> Bạn chưa có tài khoản !! <a href="{{route('customer.signup')}}"><span>Đăng ký mới tại đây!!</span></a>
                            </div>

                            <div class="form-group">
                                <a class="btn btn-danger btn-block btn-lg" href="{{ route('authSocial_redirect', ['provider' => 'google']) }}">Đăng nhập bằng Google</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection