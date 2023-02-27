<?php

namespace App\Http\Controllers;
use App\Models\Checkout;
use App\Models\Orderitem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    public function plaOrder(Request $req){
        $order=new Checkout();
        $order->user_id=Auth::id();
        $order->fname=$req->input('fname');
        $order->lname=$req->input('lname');
        $order->phone=$req->input('phone');
        $order->address1=$req->input('address1');
        $order->address2=$req->input('address1');
        $order->city=$req->input('city');
        $order->state=$req->input('state');
        $order->pincode=$req->input('pincode');
        $order->tracking_no='Doaa'.rand(1111,9999);
        $order->totalPrice=$req->input('totalPrice');
        $order->save();
        $cartItems=Cart::where('user_id',Auth::user()->id)->get();
        foreach($cartItems as $item){
            Orderitem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->product->selling_price
            ]);
            $prod=Product::where('id',$item->prod_id)->first();
            $prod->qty=$prod->qty-$item->prod_qty;
            $prod->update();
        }
        Cart::destroy($cartItems);
        return redirect("/checkoutDetail")->with('status','Order Placed Successfully');

    }
    public function myorders(){
        $countCart=Cart::where('user_id',Auth::id())->count();
        $orderItems=Checkout::where('user_id',Auth::user()->id)->get();
        return view('ordersPage',compact('orderItems','countCart'));
    }
    public function viewOrder($id){
        $countCart=Cart::where('user_id',Auth::id())->count();
        $order=Orderitem::where('order_id',$id)->get();
        return view('viewOrder',compact('order','countCart'));
    }
    public function OrderDetails(){
        $data=Orderitem::all();
        return view("admin.OrderDetails",compact('data'));
    }
}
