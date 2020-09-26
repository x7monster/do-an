@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản Lý Cá Nhân</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Cá Nhân</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
           		<h3>Chỉnh Sửa Cá Nhân
           			<a class="btn btn-success float-right btn-sm" href="{{route('profiles.view')}}"><i class="fa fa-list"></i>Cá Nhân</a>
           		</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{route('profiles.update')}}" id="myForm" enctype="multipart/form-data">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="name">Tên</label>
                          <input type="text" name="name" value="{{$editData->name}}" class="form-control">
                          <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                         <div class="form-group col-md-4">
                          <label for="email">Email</label>
                          <input type="email" name="email" value="{{$editData->email}}" class="form-control">
                          <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                        </div>
                         <div class="form-group col-md-4">
                          <label for="mobile">Số Điện Thoại</label>
                          <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
                          <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="address">Địa Chỉ</label>
                          <input type="text" name="address" value="{{$editData->address}}" class="form-control">
                          <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="gender">Giới Tính</label>
                          <select name="gender" id="gender" class="form-control">
                            <option value="">Chọn Giới Tính</option>
                            <option value="Male" {{($editData->usertype=="Male")?"selected":""}}>Nam</option>
                            <option value="Female" {{($editData->usertype=="Female")?"selected":""}}>Nữ</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                           <label for="image">Hình Ảnh</label>
                           <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-group col-md-2">
                          <img id="showImage" src="{{(!empty($editData->image))?url('upload/user_images/'.$editData->image):url('public/upload/no_img.png')}}" style="width: 150px; height:160px; border: 1px solid #000; ">
                        </div> 
                        <div class="form-group col-md-6" style="padding-top: 30px">
                          <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
              </div><!-- /.card-body -->
            </div>
            
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    $(document).ready(function () {
          $('#myForm').validate({
            rules: {
              name: {
                required: true,
              },
               usertype: {
                required: true,
              },
              email: {
                required: true,
                email: true,
              },
              password: {
                required: true,
                minlength: 6
              },
               password2: {
                required: true,
                equalTo : '#password'
                }
              },
            messages: {
              name : {
                required : 'Please enter username',
              },
              usertype: {
                required: 'Please select user role',
              },
              email: {
                required: 'Please enter a email address',
                email: 'Please enter a <em>valid</em> email address',
              },
              password: {
                required: 'Please enter password',
                minlength: 'Password will be minimum 6 characters or numbers',
              },
              password2: {
                required: 'Please enter confirm password',
                equalTo: 'Confirm password does not match',
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