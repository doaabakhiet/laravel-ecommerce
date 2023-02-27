<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Orderitem;
class Checkout extends Model
{
    use HasFactory;
    protected $table="checkouts";
    protected $fillable=[
        'user_id',
        'fname',
        'lname',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'pincode',
        'tracking_no',
        'totalPrice'
    ];
    // public function user(){
    //     return $this->belongsTo(User::class,'userId','id');
    // }
    public function orderitems(){
        return $this->hasMany(Orderitem::class);
    }
}
