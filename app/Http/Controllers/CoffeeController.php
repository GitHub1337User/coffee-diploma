<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoffeeController extends Controller
{
    public function index(){
        $coffees = Product::all();

        return view('pages.coffee',compact('coffees'));
    }
    public function getById($id){
        $product = Product::find($id);
        $product_type = 'coffee';
        $product_in_cart = false;
        if(Auth::user()){
            $productsCart = Auth::user()->userCart->products ?? false;
            if($productsCart){
                if($productsCart->contains('product_id',$id)){
                    $product_in_cart= true;
                }
            }
        }
        return view('pages.inspect',compact('product','product_type','product_in_cart'));
    }
}
