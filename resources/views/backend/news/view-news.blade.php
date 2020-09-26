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
              <h3>News List
                <a class="btn btn-success float-right btn-sm" href="{{route('news.add')}}"><i class="fa fa-plus-circle"></i>Add News</a>
              </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-responsive">
                  <thead>
                   <tr>
                      <th>SL.</th>
                      <th>Date</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Content</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $news)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$news->created_at}}</td>
                      <td>{{$news->title}}</td>
                      <td>{{$news->description}}</td>
                      <td>{{$news->content}}</td>
                      <td><img src="{{(!empty($news->image))?url('public/upload/news_images/'.$news->image):url('public/upload/no_img.png')}}" width="120px" height="130px"></td>
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