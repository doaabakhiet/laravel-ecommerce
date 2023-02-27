<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Product;
class CommentController extends Controller
{
    public function addComment(Request $req){
        $prod_id=$req->input('prodCommentid');
        $comment=$req->input('newComment');
        $user_id=Auth::id();
        if($prod_id || $comment || $user_id){
            Comment::create([
                'user_id'=>$user_id,
                'prod_id'=>$prod_id,
                'comment'=>$comment
            ]);
            return redirect('/productDetail/'.$prod_id)->with('status','Comment Added Successfully');
        }else{
            return redirect()->back()->with('status','The Link You Followed Was Broken');
        }
        // return redirect('/')->with('status','Comment Added Successfully');
    }
    public function deleteComment(Request $req){
        $comment_id=$req->get('comment_id');
        if(Comment::where('user_id',Auth::id())->where('id',$comment_id)->exists()){
            $CommentToCancel=Comment::where('user_id',Auth::id())->where('id',$comment_id)->first();
            $CommentToCancel->delete();
            return response()->json(['status'=>'Comment Deleted successfully']);
        }
    }
    public function EditComment(Request $req){
        $comment_id=$req->input('prodCommentEditid');
        $NewEditComment=$req->input('newEditComment');
        if($NewEditComment!=null){
            if(Comment::where('user_id',Auth::id())->where('id',$comment_id)->exists()){
                $EditComment=Comment::where('user_id',Auth::id())->where('id',$comment_id)->first();
                $EditComment->comment=$NewEditComment;
                $EditComment->update();
                return redirect('/productDetail/'.$EditComment->product->id)->with('status','Comment Added Successfully');
            }
        }else{
            return response()->json(['status'=>"You Cann't Let It Empty"]);
        }
        

    }
}
