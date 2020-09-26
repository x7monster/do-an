@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage News</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">News</li>
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
           		<h3>Edit News
           			<a class="btn btn-success float-right btn-sm" href="{{route('news.view')}}"><i class="fa fa-list"></i>News List</a>
           		</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{route('news.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
                      @csrf
                      <div class="form-row">
                      	<div class="form-group col-md-12">
                           <label for="title">Title</label>
                           <textarea name="title" class="form-control" rows="5">{{$editData->title}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="description">Description</label>
                           <textarea name="description" class="form-control" rows="5">{{$editData->description}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="content">Content</label>
                           <textarea name="content" class="form-control" rows="5">{{$editData->content}}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                           <label for="image">Hình Ảnh</label>
                           <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-group col-md-2">
                          <img id="showImage" src="{{(!empty($editData->image))?url('upload/news_images/'.$editData->image):url('public/upload/no_img.png')}}" style="width: 150px; height:160px; border: 1px solid #000; ">
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
@endsection