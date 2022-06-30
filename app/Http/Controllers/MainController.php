<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $coffees = Product::get()->random(3);
        $ingredients = Ingredient::get()->random(3);
        return view('pages.main',compact('coffees','ingredients'));
    }
}
