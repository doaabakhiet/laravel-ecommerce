<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Comment extends Model
{
    use HasFactory;
    protected $table="comments";
    protected $fillable=[
        'user_id',
        'prod_id',
        'comment'
    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
