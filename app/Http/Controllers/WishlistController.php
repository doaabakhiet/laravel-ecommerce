<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist(){
        $countCart=Cart::where('user_id',Auth::id())->count();
        $wishlist=Wishlist::where('user_id',Auth::id())->get();
        return view('wishlist',compact('wishlist','countCart'));
    }
    public function addToWishList(Request $req){
        $prod_id=$req->get('prod_id');
        if(Auth::check()){
            $prod_check=Product::where('id',$prod_id)->exists();
            if($prod_check){
                if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::user()->id)->exists()){
                    return response()->json(['status'=>'Product Already Added Before.']);
                }else{
                    $wishListItem=new Wishlist();
                    $wishListItem->prod_id=$prod_id;
                    $wishListItem->user_id=Auth::id();
                    $wishListItem->save();
                    return response()->json(['status'=>'Added To Wishlist Successfully']);
                }
            }

        }else{
            return response()->json(['status'=>'Login To continue']);
        }
    }
    public function deleteWishlist(Request $req){
        $prod_id=$req->get('prod_id');

        if(Auth::check()){
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $wishListItem=Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $wishListItem->delete();
                 return response()->json(['status'=>'Product Item Deleted Successully from WishList']);
           }
        }
        else{
            return response()->json(['status'=>'Login To continue']);
        }
    }
    public function wishlistCount(){
        $data=Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$data]);
    }
}
