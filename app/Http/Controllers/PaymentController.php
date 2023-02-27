<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    //
    public function proceedToPay(Request $req){
        $user_id=Auth::id();
        $fname=$req->get('fname');
        $lname=$req->get('lname');
        $phone=$req->get('phone');
        $address1=$req->get('address1');
        $address2=$req->get('address2');
        $city=$req->get('city');
        $state=$req->get('state');
        $pincode=$req->get('pincode');
        $tracking_no=$req->get('tracking_no');
        $totalPrice=$req->get('totalPrice');

        return response()->json([
            'fname'=>$fname,
            'lname'=>$lname,
            'phone'=>$phone,
            'address1'=>$address1,
            'address2'=>$address2,
            'city'=>$city,
            'state'=>$state,
            'pincode'=>$pincode,
            'tracking_no'=>$tracking_no,
            'totalPrice'=>$totalPrice
        ]);
    }
}
