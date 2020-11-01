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
          Thay đổi mật khẩu
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
                    <h3>Thay đổi mật khẩu</h3>
                    <form method="post" action="{{route('customer.password.update')}}" id="myForm">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="current_password">Mật khẩu hiện tại</label>
                          <input type="password" name="current_password" id="current_password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="new_password">Mật khẩu mới</label>
                          <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="again_new_password">Nhập lại mật khẩu</label>
                          <input type="password" name="again_new_password"class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <input type="submit" value="Cập nhật mật khẩu" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
@endsection