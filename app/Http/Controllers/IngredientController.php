<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{
    public function index(){
        $ingredients = Ingredient::all();
        return view('pages.ingredients',compact('ingredients'));
    }
    public function productselse($id){
        $product = Ingredient::find($id);
        $product_type = 'ingredient';
        $product_in_cart = false;
        if(Auth::user()){
            $productsCart = Auth::user()->userCart->products ?? false;
            if($productsCart){
                if($productsCart->contains('ingredient_id',$id)){
                    $product_in_cart= true;
                }
            }
        }
        return view('pages.inspect',compact('product','product_type','product_in_cart'));
    }
}
