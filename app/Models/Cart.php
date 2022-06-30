<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = false;
    public $timestamps = false;
    public function products(){
        return $this->hasMany(Cart_Products::class,'cart_id','id');
    }
    public function  productsCart(){
        return $this->belongsToMany(Product::class,'cart__products','cart_id','product_id');
    }
    public function ingredientsCart(){
        return $this->belongsToMany(Ingredient::class,'cart__products','cart_id','ingredient_id');
    }
}
