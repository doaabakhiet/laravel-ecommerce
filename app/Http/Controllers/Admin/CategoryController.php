<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index()
    {
        $data=Category::all();
        return view("admin.index",compact('data'));
    }
    public function add()
    {
        
        return view("admin.addCategory");
    }
    public function insertCategory(Request $req){
        $newCat=new Category();
        if($req->HasFile('image')){
             $image=$req->file('image'); 
            $ext=$image->getClientOriginalExtension();
            $filename=time().','.$ext;
            $image->move("img/categories/",$filename);
            $newCat->image=$filename;
        }
        $newCat->name=$req->input('name');
        $newCat->slug=$req->input('slug');
        $newCat->description=$req->input('description');
        $newCat->popular=$req->input('popular')==TRUE ?0:1;
        $newCat->status=$req->input('status')==TRUE ?0:1;
        $newCat->meta_title=$req->input('meta_title');
        $newCat->meta_description=$req->input('meta_description');
        $newCat->meta_keywords=$req->input('meta_keywords');
        $newCat->save();
        return view("admin.dashboard")->with('status','Category Added Successfully');
    }
    public function editCategory($id){
        $data=Category::find($id);
        return view("admin.editCategory",compact('data'));
    }
    public function UpdateCategory(Request $req){
        $id=$req->input('id');
        $dat=Category::find($id);
        
        if($req->HasFile('image')){
            $image=$req->file('image'); 
           $ext=$image->getClientOriginalExtension();
           $filename=time().','.$ext;
           $image->move("img/categories/",$filename);
           $dat->image=$filename;
       }
       else{ 
        $updatedCat->image=$data->image;
       }
        $dat->name=$req->input('name');
        $dat->slug=$req->input('slug');
        $dat->description=$req->input('description');
        $dat->popular=$req->input('popular')==TRUE ?0:1;
        $dat->status=$req->input('status')==TRUE ?0:1;
        $dat->meta_title=$req->input('meta_title');
        $dat->meta_description=$req->input('meta_description');
        $dat->meta_keywords=$req->input('meta_keywords');
        $dat->save();
        return view("admin.dashboard")->with('status','Category Updated Successfully');
    }
    public function DeleteCategory($id){
        $category=Category::find($id);
        if($category->image){
            $path='img/categories/'.$category->image;
            if(File::Exists($path)){
                File::delete($path);
            }
            $category->delete();
            return view("admin.dashboard")->with('status','Category Deleted Successfully');
        }
    }
}
