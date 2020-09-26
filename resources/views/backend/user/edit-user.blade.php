@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản Lý Người Dùng</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Người Dùng</li>
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
           		<h3>Chỉnh Sửa Người Dùng
           			<a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"><i class="fa fa-list"></i>Danh Sách Người Dùng</a>
           		</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{route('users.update',$editData->id)}}" id="myForm">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="role">Vai Trò Người Dùng</label>
                          <select name="role" id="role" class="form-control">
                            <option value="">Chọn Vai Trò</option>
                            <option value="Admin" {{($editData->role=="Admin")?"selected":""}}>Admin</option>
                            <option value="User" {{($editData->role=="User")?"selected":""}}>Nhân Viên</option>
                          </select>
                        </div>
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