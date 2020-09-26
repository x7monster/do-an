@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản Lý Sản Phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Sản Phẩm</li>
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
              <h3>Chi Tiết Sản Phẩm
                <a class="btn btn-success float-right btn-sm" href="{{route('products.view')}}"><i class="fa fa-plus-list"></i>Danh Sách Sản Phẩm</a>
              </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover table-sm">
                	<tbody>
                		<tr>
                			<td width="50%">Loại Sản Phẩm</td>
                			<td width="50%">{{$product['category']['name']}}</td>
                		</tr>
                		<tr>
                			<td width="50%">Nhãn Hiệu</td>
                			<td width="50%">{{$product['brand']['name']}}</td>
                		</tr>
                		<tr>
                			<td width="50%">Tên Sản Phẩm</td>
                			<td width="50%">{{$product->name}}</td>
                		</tr>
                		<tr>
                			<td width="50%">Giá</td>
                			<td width="50%">{{number_format($product->price)}} VND</td>
                		</tr>
                		<tr>
                			<td width="50%">Mô Tả Ngắn</td>
                			<td width="50%">{{$product->short_desc}}</td>
                		</tr>
                		<tr>
                			<td width="50%">Mô Tả Dài</td>
                			<td width="50%">{{$product->long_desc}}</td>
                		</tr>
                		<tr>
                			<td width="50%">Hình Ảnh</td>
                			<td width="50%">
                				<img src="{{(!empty($product->image))?url('upload/product_images/'.$product->image):url('upload/no_img.png')}}" style="width: 90px; height:95px;">
                			</td>
                		<tr>
                			<td width="50%">Màu </td>
                			<td width="50%">
                				@php 
                					$colors = App\Model\ProductColor::where('product_id',$product->id)->get();
                				@endphp
                				@foreach($colors as $c)
                					{{$c['color']['name']}},
                				@endforeach
                			</td>
                		</tr>
                		<tr>
                			<td width="50%">Kích Thước</td>
                			<td width="50%">
                				@php 
                					$sizes = App\Model\ProductSize::where('product_id',$product->id)->get();
                				@endphp
                				@foreach($sizes as $s)
                					{{$s['size']['name']}},
                				@endforeach
                			</td>
                		</tr>
                		<tr>
                			<td width="50%">Hình Ảnh Liên Quan</td>
                			<td width="50%">
                				@php 
                					$sub_images = App\Model\ProductSubImage::where('product_id',$product->id)->get();
                				@endphp
                				@foreach($sub_images as $img)
                					<img src="{{url('upload/product_images/product_sub_images/'.$img->sub_image)}}" style="width: 90px; height:95px;">	
                				@endforeach
                			</td>
                		</tr>
                		</tr>
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