<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class AddtocartController extends Controller
{


    public function addToCart(Request $req){
        // return response()->json(['status'=>'Got Simple Ajax Request.']);
        $prod_id=$req->get('prod_id');
        $prod_qty=$req->get('qty');
        if(Auth::check()){
            $prod_check=Product::where('id',$prod_id)->exists();
            if($prod_check){
                  if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::user()->id)->exists()){
                        return response()->json(['status'=>'Product Already Added Before.']);
                    }else{
                    $cartItem=new Cart();
                    $cartItem->prod_id=$prod_id;
                    $cartItem->user_id=Auth::id();
                    $cartItem->prod_qty= $prod_qty;
                    $cartItem->save();
                   return response()->json(['status'=>'Added To Cart Successfully']);
            //     }
            
                    }
                }
        }else{
            return response()->json(['status'=>'Login To continue']);
        }
    }
    public function deleteCart(Request $req){
        $prod_id=$req->get('prod_id');
        if(Auth::check()){
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::user()->id)->exists()){
                $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>'Cart Item Deleted Successully Successfully']);
            }
        }
        else{
            return response()->json(['status'=>'Login To continue']);
        }
    }
    public function changeQty(Request $req){
        $prod_id=$req->get('prod_id');
        $prod_qty=$req->get('qty');
        if(Auth::check()){
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::user()->id)->exists()){
                $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::user()->id)->first();
                // $cartItem->user_id=Auth::user()->id;
                // $cartItem->prod_id=$prod_id;
                $cartItem->prod_qty=$prod_qty;
                $cartItem->update();
                return response()->json(['status'=>'Cart Item Deleted Successully Successfully']);
            }
        }else{
            return response()->json(['status'=>'Login To continue']);
        }
    }
}
