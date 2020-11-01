@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản lý bài viết</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Quản lý</a></li>
              <li class="breadcrumb-item active">Bài viết</li>
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
              <h3>Bài viết mới
                <a class="btn btn-success float-right btn-sm" href="{{route('news.add')}}"><i class="fa fa-plus-circle"></i>Tạo bài viết</a>
              </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="table-news" class="table table-bordered table-hover table-responsive">
                  <thead>
                   <tr>
                      <th></th>
                      <th>Ngày đăng</th>
                      <th>Tiều đề</th>
                      <th>Mô tả</th>
                      <th>Ảhh</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $news)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$news->created_at}}</td>
                      <td>{{$news->title}}</td>
                      <td>{{$news->description}}</td>
                      <td><img src="{{(!empty($news->image))?url('upload/news_images/'.$news->image):url('upload/no_img.png')}}" width="120px" height="130px"></td>
                      <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href="{{route('news.edit',$news->id)}}"><i class="fa fa-edit"></i></a>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('news.delete',$news->id)}}"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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