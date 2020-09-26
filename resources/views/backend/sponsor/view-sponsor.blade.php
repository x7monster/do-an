@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản Lý Sponsor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Sponsor</li>
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
           		<h3>Danh Sách Sponsor
           			<a class="btn btn-success float-right btn-sm" href="{{route('sponsors.add')}}"><i class="fa fa-plus-circle"></i>Thêm Sponsor</a>
           		</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              	<table id="example1" class="table table-bordered table-hover">
              		<thead>
              			<tr>
              				<th>SL.</th>
              				<th>Hình Ảnh</th>
              			</tr>
              		</thead>
              		<tbody>
              			@foreach($allData as $key => $sponsor)
              			<tr>
              				<td>{{$key+1}}</td>
              				<td><img src="{{(!empty($sponsor->image))?url('upload/sponsor_images/'.$sponsor->image):url('public/upload/no_img.png')}}" width="120px" height="130px"></td>
              				<td>
              					<a title="Edit" class="btn btn-sm btn-primary" href="{{route('sponsors.edit',$sponsor->id)}}"><i class="fa fa-edit"></i></a>
              					<a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('sponsors.delete',$sponsor->id)}}"><i class="fa fa-trash"></i></a>
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