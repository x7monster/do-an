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
              <h3>Danh Sách Sản Phẩm
                <a class="btn btn-success float-right btn-sm" href="{{route('products.add')}}"><i class="fa fa-plus-circle"></i>Thêm Sản Phẩm</a>
              </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr>
                      <th width="6%">SL.</th>
                      <th>Loại Sản Phẩm</th>
                      <th>Nhãn Hiệu</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Giá</th>
                      <th>Hình Ảnh</th>
                      <th width="12%">Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $product)
                      <tr class="{{$product->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$product['category']['name']}}</td>
                      <td>{{$product['brand']['name']}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{number_format($product->price)}} VND </td>
                      <td><img src="{{(!empty($product->image))?url('public/upload/product_images/'.$product->image):url('public/upload/no_img.png')}}" style="width: 50px; height:55px;"></td>
                      <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href="{{route('products.edit',$product->id)}}"><i class="fa fa-edit"></i></a>
                        <a title="Details" class="btn btn-sm btn-success" href="{{route('products.details',$product->id)}}"><i class="fa fa-eye"></i></a>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('products.delete',$product->id)}}"><i class="fa fa-trash"></i></a>
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