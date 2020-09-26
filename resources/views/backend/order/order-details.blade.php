@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quản Lý Đặt Hàng</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
              <li class="breadcrumb-item active">Đặt Hàng</li>
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
              <h3>Chi Tiết Đặt Hàng 
                  <a class="btn btn-success float-right btn-sm" href="{{route('orders.approved.list')}}"><i class="fa fa-list"></i>Danh Sách Đã Chấp Nhận</a>
              </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="txt-center mytable" width="100%" border="1">
            <tr>
              <td width="30%"><strong>Thông tin hóa đơn:</strong></td>
              <td width="70%" colspan="2" style="text-align: left;">
                <strong>Tên:</strong> {{$order['shipping']['name']}} <br>
                <strong>Số điện thoại:</strong> {{$order['shipping']['mobile_no']}} <br>
                <strong>Email:</strong> {{$order['shipping']['email']}} <br>
                <strong>Địa chỉ:</strong> {{$order['shipping']['address']}} <br>
                <strong>Thanh toán:</strong> 
                  {{$order['payment']['payment_method']}}
                  @if($order['payment']['payment_method']=='Bkash')
                  (Transaction no : {{$order['payment']['transaction_no']}})
                  @endif
                  <strong>Order no: # {{$order->order_no}}</strong>
              </td>
            </tr>
            <tr>
              <td colspan="3"><strong>Chi tiết đặt hàng</strong></td>
            </tr>
            <tr>
              <td><strong>Tên sản phẩm & Hình ảnh</strong></td>
              <td><strong>Màu & Kích Thước</strong></td>
              <td><strong>Số lượng & Giá</strong></td>
            </tr>
            @foreach($order['order_details'] as $details)
            <tr>
              <td>
                <img src="{{url('public/upload/product_images/'.$details['product']['image'])}}" style="width: 50px; height:55px;"> &nbsp; {{$details['product']['name']}}
              </td>
              <td>
                {{$details['color']['name']}} & {{$details['size']['name']}}
              </td>
              <td>
                @php
                  $sub_total = $details->quantity*$details['product']['price'];
                @endphp
                {{$details->quantity}} x 
                {{$details['product']['price']}} = 
                {{number_format($sub_total)}} VND
              </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="2" style="text-align: right;"><strong>Grand Total</strong></td>
              <td><strong>{{number_format($order->order_total)}} VND</strong></td>
            </tr>
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