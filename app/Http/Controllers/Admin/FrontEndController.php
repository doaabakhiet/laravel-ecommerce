<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Rating;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class FrontEndController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }
    public function mainHome()
    {
        $products=Product::where("trending","=","1")->take(15)->get();
        $trending_category=category::where("popular","=","1")->take(15)->get();
        $countCart=Cart::where('user_id',Auth::id())->count();
        return view("mainHome",compact('products','trending_category','countCart'));
    }
    public function categoryPage(){
        $category=Category::where("status",0)->get();
        $countCart=Cart::where('user_id',Auth::id())->count();
        return view("categoryPage",compact('category','countCart'));
    }
    public function categoryProducts($id){
        $catProducts=Product::where("catId","=",$id)->where("status","=","1")->get();
        $countCart=Cart::where('user_id',Auth::id())->count();
        return view("catProducts",compact('catProducts','countCart'));
    }
    public function productDetail($id){
        $productDetail=Product::where("id","=",$id)->get();
        $countCart=Cart::where('user_id',Auth::id())->count();
        $checkCart=Cart::where('user_id',Auth::id())->where('prod_id',$id)->exists();
        $starRate=0;
        $numOfRating=0;
        if(Rating::where('prod_id',$id)->exists())
        {
            $numOfRating=Rating::where('prod_id',$id)->count();
        }
        if(Rating::where('user_id',Auth::id())->where('prod_id',$id)->exists()){
            $starNum=Rating::where('user_id',Auth::id())->where('prod_id',$id)->first();
            $starRate=$starNum->numStars;
        }
        $commentCount=0;
        if(Comment::where('prod_id',$id)->exists()){
            $commentCount= Comment::where('prod_id',$id)->count();
        }
        $commentsData=Comment::where('prod_id',$id)->get();
        return view("productDetail",compact('productDetail','countCart','checkCart','starRate','numOfRating','commentCount','commentsData'));
    }
    public function cartDetail(){
        $cartDetail=Cart::where('user_id',Auth::id())->get();
        $countCart=Cart::where('user_id',Auth::id())->count();
        return view("cartPage",compact('cartDetail','countCart'));
    }
    public function checkoutDetail()
    {
        $countCart=Cart::where('user_id',Auth::id())->count();
        $cartItems=Cart::where('user_id',Auth::id())->get();
        return view("checkout",compact('countCart','cartItems'));
    }
    public function productList(){
        $productList=Product::select('name')->where('status','1')->get();
        $data=[];
        foreach($productList as $item){
            $data[]=$item['name'];
        }
        return $data;
    }
    public function searchReasult(Request $req){
        $prod_name=$req->input('prod_name');
        if($prod_name!=null){
            $product=Product::where('name','like','%'.$prod_name.'%')->first();
            if($product){
            return redirect('/productDetail/'.$product->id);
            }else{
                return redirect()->back()->with('status','No Product With That Name, Try Again..!');
            }
        }else{
            return redirect()->back();
        }

    }
}
