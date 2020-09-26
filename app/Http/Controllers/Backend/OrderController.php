<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;

class OrderController extends Controller
{
    public function pendingList(){
    	$data['orders'] = Order::where('status','0')->get();
    	return view('backend.order.pending-list',$data);
    }

    public function approvedList(){
    	$data['orders'] = Order::where('status','1')->get();
    	return view('backend.order.approved-list',$data);
    }

    public function details($id){
    	$data['order'] = Order::find($id);
    	return view('backend.order.order-details',$data);
    }

    public function approve($id){
        $order = Order::find($id);
        $order->status = '1';
        $order->save();
        return redirect()->route('orders.pending.list')->with('success','Data Deleted Successfully');
    }
}
