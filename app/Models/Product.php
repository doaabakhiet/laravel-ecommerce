<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=[
        'catId',
        'name',
        'small_description',
        'description',
        'original_Price',
        'selling_price',
        'image',
        'qty',
        'taxes',
        'status',
        'trending',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];


    public function category(){
        return $this->belongsTo(category::class,'catId','id');
    }
    
}
