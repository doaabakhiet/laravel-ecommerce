<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index()
    {
        $data=Product::all();
        return view("admin.product",compact('data'));
    }
    public function add()
    {
        $category=Category::all();
        return view("admin.addProduct",compact('category'));
    }
    public function insertProduct(Request $req){
        $newProd=new Product();
        if($req->HasFile('image')){
             $image=$req->file('image'); 
            $ext=$image->getClientOriginalExtension();
            $filename=time().','.$ext;
            $image->move("img/products/",$filename);
            $newProd->image=$filename;
        }
        $newProd->catId=$req->input('catId');
        $newProd->name=$req->input('name');
        $newProd->small_description=$req->input('small_description');
        $newProd->description=$req->input('description');
        $newProd->original_Price=$req->input('original_Price');
        $newProd->selling_price=$req->input('selling_price');
        $newProd->qty=$req->input('qty');
        $newProd->taxes=$req->input('taxes');
        $newProd->status=$req->input('status')==TRUE ?0:1;
        $newProd->trending=$req->input('trending')==TRUE ?0:1;
        $newProd->meta_title=$req->input('meta_title');
        $newProd->meta_description=$req->input('meta_description');
        $newProd->meta_keywords=$req->input('meta_keywords');
        $newProd->save();
        return redirect("product")->with('status','Product Added Successfully');
    }
    public function EditProduct($id){
        $data=Product::find($id);
        $categorydata=Category::find($data->catId);
        $category=Category::all();
        return view("admin.EditProduct",compact('data','category','categorydata'));
    }
    public function UpdateProduct(Request $req){
        $id=$req->input('id');
        $dat=Product::find($id);
        
        if($req->HasFile('image')){
            $image=$req->file('image'); 
           $ext=$image->getClientOriginalExtension();
           $filename=time().','.$ext;
           $image->move("img/products/",$filename);
           $dat->image=$filename;
       }
       else{ 
        
        $dat->image=$req->input('image2');
       }
       $dat->catId=$req->input('catId');
       $dat->name=$req->input('name');
       $dat->small_description=$req->input('small_description');
       $dat->description=$req->input('description');
       $dat->original_Price=$req->input('original_Price');
       $dat->selling_price=$req->input('selling_price');
       $dat->qty=$req->input('qty');
       $dat->taxes=$req->input('taxes');
       $dat->status=$req->input('status')==TRUE ?0:1;
       $dat->trending=$req->input('trending')==TRUE ?0:1;
       $dat->meta_title=$req->input('meta_title');
       $dat->meta_description=$req->input('meta_description');
       $dat->meta_keywords=$req->input('meta_keywords');
       $dat->save();
       return redirect("product")->with('status','Product Updated Successfully');
    }

    public function DeleteProduct($id){
        $product=Product::find($id);
        if($product->image){
            $path='img/products/'.$product->image;
            if(File::Exists($path)){
                File::delete($path);
            }
            $product->delete();
            return redirect("product")->with('status','Product Deleted Successfully');
        }
    }
    
}
