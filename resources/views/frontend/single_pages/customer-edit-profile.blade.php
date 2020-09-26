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
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Chỉnh Sửa Thông Tin
        </h2>
    </section>
        <div class="container">
            <div class="row" style="padding: 15px 0px 15px 0px;">
                <div class="col-md-2">
                    <ul class="prof">
                        <li><a href="{{route('dashboard')}}">Thông Tin</a></li>
                        <li><a href="{{route('customer.password.change')}}">PW Change</a></li>
                        <li><a href="{{route('customer.order.list')}}">Đơn Đặt Hàng</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <h3>Chỉnh Sửa Thông Tin</h3>
                   <form method="post" action="{{route('customer.update.profile')}}" enctype="multipart/form-data">
                       @csrf
                       <div class="row">
                           <div class="col-md-4">
                               <label>Tên Đầy Đủ</label>
                               <input type="text" name="name" value="{{$editData->name}}" class="form-control">
                               <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                           </div>
                           <div class="col-md-4">
                               <label>Email</label>
                               <input type="email" name="email" value="{{$editData->email}}" class="form-control">
                               <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                           </div>
                           <div class="col-md-4">
                               <label>Số Điện Thoại</label>
                               <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
                               <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                           </div>
                           <div class="col-md-4">
                               <label>Địa Chỉ</label>
                               <input type="text" name="address" value="{{$editData->address}}" class="form-control">
                           </div>
                           <div class="col-md-4">
                               <label>Giới Tính</label>
                               <select name="gender" class="form-control">
                                   <option value="">Chọn Giới Tính</option>
                                   <option value="Male" {{($editData->gender=="Male")?"selected":""}}>Nam</option>
                                   <option value="Female" {{($editData->gender=="Female")?"selected":""}}>Nữ</option>
                               </select>
                           </div>
                           <div class="col-md-4">
                               <label>Hình Ảnh</label>
                               <input type="file" name="image" id="image" class="form-control">
                           </div>
                           <div class="col-md-2">
                             <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/no_img.png')}}" style="width: 80px; height:90px; border: 1px solid #000; ">
                           </div>
                           <div class="col-md-4" style="padding-top: 30px">
                               <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin</button>
                           </div>
                       </div>
                   </form>
                </div>
            </div>
        </div>
@endsection