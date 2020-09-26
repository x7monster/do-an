@extends('backend.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hóa Đơn Chờ Xử Lý</h1>
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
              <h3>Danh Sách Hóa Đơn Chờ Xử Lý
                
              </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr>
                      <th>SL.</th>
                      <th>Thứ Tự Đặt Hàng</th>
                      <th>Tổng Tiền</th>
                      <th>Phương Thức Thanh Toán</th>
                      <th>Trạng Thái</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $key => $order)
                    <tr class="{{$order->id}}">
                      <td>{{$key+1}}</td>
                      <td># {{$order->order_no}}</td>
                      <td>{{number_format($order->order_total)}} VND</td>
                      <td>
                        {{$order['payment']['payment_method']}}
                        @if($order['payment']['payment_method']=='Bkash')
                        (Transaction no : {{$order['payment']['transaction_no']}})
                        @endif
                      </td>
                      <td>
                        @if($order->status=='0')
                      <span style="background: #DD4F42; padding: 5px; color: white">Không Chấp Nhận</span>
                      @elseif($order->status=='1')
                      <span style="background: #1BA160; padding: 5px;">Chấp Nhận</span>    
                      @endif
                    </td>
                    <td>

                    <a title="Approved" id="approve" class="btn btn-sm btn-primary" href="{{route('orders.approve',$order->id)}}"><i class="fa fa-check"></i></a>
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