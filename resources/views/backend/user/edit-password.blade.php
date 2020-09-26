@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản Lý Mật Khẩu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Mật Khẩu</li>
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
           		<h3>Chỉnh Sửa Mật Khẩu
           			
           		</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{route('profiles.password.update')}}" id="myForm">
                      @csrf
                      <div class="form-row">
                      	<div class="form-group col-md-4">
                          <label for="current_password">Mật Khẩu Hiện Tại</label>
                          <input type="password" name="current_password" id="current_password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="new_password">Mật Khẩu Mới</label>
                          <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="again_new_password">Nhập Lại Mật Khẩu Mới</label>
                          <input type="password" name="again_new_password"class="form-control">
                        </div>
                        <div class="form-group col-md-6">
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
              current_password: {
                required: true,
            },
              new_password: {
                required: true,
                minlength: 6
              },
               again_new_password: {
                required: true,
                equalTo : '#new_password'
                }
              },
            messages: {
              current_password: {
                required: 'Nhập mật khẩu hiện tại',
              },
              new_password: {
                required: 'Nhập mật khẩu mới',
                minlength: 'Mật khẩu tối thiểu là 6 ký tự',
              },
              again_new_password: {
                required: 'Nhập lại mật khẩu mới',
                equalTo: 'Mật khẩu nhập lại không chính xác',
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