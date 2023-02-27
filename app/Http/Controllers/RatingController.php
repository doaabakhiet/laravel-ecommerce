<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Checkout;
use App\Models\Orderitem;
class RatingController extends Controller
{
    public function addRating(Request $req){
        $user_id=Auth::id();
        $prod_id=$req->get('prodId');
        $numStars=$req->get('product_rating');
        if(Auth::check()){
            $verify_order=Checkout::where('checkouts.user_id',Auth::id())
            ->join('orderitems','checkouts.id','orderitems.order_id')
            ->where('orderitems.prod_id',$prod_id)->get();
            if($verify_order){
                if(Rating::where('user_id',$user_id)->where('prod_id',$prod_id)->exists()){
                    $rating=Rating::where('user_id',$user_id)->where('prod_id',$prod_id)->first();
                    $rating->user_id=$user_id;
                    $rating->prod_id=$prod_id;
                    $rating->numStars=$numStars;
                    $rating->update();
                    return response()->json(['status'=>'before']);
                }
                else{
                    $rating=new Rating();
                    $rating->user_id=$user_id;
                    $rating->prod_id=$prod_id;
                    $rating->numStars=$numStars;
                    $rating->save();
                    return response()->json(['status'=>'rate successfully']);
                }
            }else{
                return response()->json(['LoginPurchase'=>'You have to Purchase Before Rating']);
            }
            
        }else{
            return response()->json(['LoginPurchase'=>'Login To continue']);
        }
    }

    //
    public function StarratingCount(Request $req){
        $user_id=Auth::id();
        $prod_id=$req->get('prodId');
        if(Rating::where('user_id',$user_id)->where('prod_id',$prod_id)->exists()){
            $starNum=Rating::where('user_id',$user_id)->where('prod_id',$prod_id)->first();
            return response()->json(['status'=>$starNum->numStars]);
        }else{
            return response()->json(['status'=>'not Rated']);
        }
        
    }
}
