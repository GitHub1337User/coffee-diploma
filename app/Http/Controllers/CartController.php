<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index(){
        $products= Auth::user()->userCart->productsCart ?? null;
        $ingredients= Auth::user()->userCart->ingredientsCart ?? null;
//        $full_price = ($ingredients!=null) ? Auth::user()->userCart->ingredientsCart->sum('price')+ ($ingredients!=null) ? Auth::user()->userCart->productsCart->sum('price') : null;
//        return view('pages.cart.cart',compact('products','ingredients','full_price'));
        $full_price = null;
        return view('pages.cart.cart',compact('products','ingredients','full_price'));
    }
    public function add(Request $request){
        $product_id = $request->get('product_id');
        $product_type = $request->get('product_type');

        $cart =  Auth::user()->userCart;
        if($product_type=='coffee'){
            Cart_Products::create([
                'cart_id'=>$cart->id ?? $this->newCart(),
                'product_id'=>$product_id,
                'count'=>1,
            ]);
        }
        else{
            Cart_Products::create([
                'cart_id'=>$cart->id ?? $this->newCart(),
                'ingredient_id'=>$product_id,
                'count'=>1,
            ]);
        }

        return true;
    }

    public function incrementCount(){

    }
    public function newCart(){
        $user_id = Auth::user()->id;
        $newCart = Cart::create([
            'user_id'=>$user_id,
        ]);
        return $newCart->id;
    }
}
