<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\User;
class UserController extends Controller
{
    public function UserDetails(){
        $data=User::all();
        return view('admin.UsersDetails.UserDetails',compact('data'));
    }
    public function viewUser($id){
        $data=User::where('id',$id)->first();
        $userdata=Checkout::where('user_id',$id)->first();
        return view('admin.UsersDetails.UserView',compact('data','userdata'));
    }
}
