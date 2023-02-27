<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Checkout;
class Orderitem extends Model
{
    use HasFactory;

    protected $table="orderitems";
    protected $fillable=[
        'order_id',
        'prod_id',
        'qty',
        'price'
    ];
    public function checkout(){
        return $this->belongsTo(Checkout::class,'order_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
