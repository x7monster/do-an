@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản Lý Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
           		<h3>Chỉnh Sửa Slider
           			<a class="btn btn-success float-right btn-sm" href="{{route('sliders.view')}}"><i class="fa fa-list"></i>Danh Sách Slider</a>
           		</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{route('sliders.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="short_title">Tiêu Đề Ngắn</label>
                           <input type="text" name="short_title" value="{{$editData->short_title}}" class="form-control">
                        </div>
                         <div class="form-group col-md-6">
                           <label for="long_title">Tiêu Đề Dài</label>
                           <input type="text" name="long_title" value="{{$editData->long_title}}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="image">Hình Ảnh</label>
                           <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-group col-md-2">
                          <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/slider_images/'.$editData->image):url('public/upload/no_img.png')}}" style="width: 150px; height:160px; border: 1px solid #000; ">
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
@endsection