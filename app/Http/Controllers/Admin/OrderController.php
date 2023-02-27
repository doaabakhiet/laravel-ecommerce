<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Orderitem;
use App\Models\Cart;
use App\Models\Product;
class OrderController extends Controller
{
    public function OrderDetails(){
        $data=Checkout::where('status',0)->get();
        return view("admin.orders.OrderDetails",compact('data'));
    }
    public function viewOrder($id){
        $order=Orderitem::where('order_id',$id)->get();
        return view('admin.orders.viewOrder',compact('order'));
    }
    public function UpdateStatus(Request $req,$id){
        $order=Checkout::where('id',$id)->first();
        $order->status=$req->input('OrderStatus');
        $order->update();
        return redirect('OrderDetails')->with('status','Order Updated Successfully');
    }
    public function orderHistory(){
        $data=Checkout::where('status',1)->get();
        return view("admin.orders.orderHistory",compact('data'));
    }
}
