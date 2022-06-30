<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(Auth::user()->userCart);
        $validatedData = $request->validate([
            'address' => ['required', 'string', 'max:255'],
            'comments' => ['string', 'min:8'],
        ]);

        $newOrder = Order::create([
            'user_id'=>Auth::user()->id,
            'status_id'=>1,
            'comments'=>$request['comments'],
            'address'=>$request['address'],
        ]);
        $products= Auth::user()->userCart->productsCart ?? null;
        $ingredients= Auth::user()->userCart->ingredientsCart ?? null;
           if($products!=null){
               foreach ($products as $item){
                   Order_Product::create([
                       'product_id'=>$item->id,
                       'order_id'=>$newOrder->id,
                       'count'=>1,
                   ]);
               }
           }
           if($ingredients!=null){
               foreach ($ingredients as $item){
                   Order_Product::create([
                       'ingredient_id'=>$item->id,
                       'order_id'=>$newOrder->id,
                       'count'=>1,
                   ]);
               }
           }
           Auth::user()->userCart->delete();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
