<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Compound;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::all();
        $products = Product::orderByDesc('created_at')->paginate(5);
        return view('admin.pages.products', compact('categories','products'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('admin.pages.products.create', compact('categories','ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'string'],
            'image' => ['required','image','max:4096'],
        ]);
        $image = $this->upload($request);
//        $input = $request->all();
//        Product::create($input);
        $newProduct = Product::create([
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'image'=>$image,
        ]);
        $components = $request['components'];
        if(isset($components)){
            foreach ($components as $component){
                    Compound::create([
                        'product_id'=>$newProduct->id,
                        'ingredient_id'=>$component,
                    ]);
            }
        }
        return redirect()->route('admin.products.create')->with('message', 'Запись добавлена');;
    }
    public function upload(Request $request){
        $file = $request->hasFile('image');
        if($file){
            $newFile = $request->file('image');
            $fileName = $newFile->hashName();
            $newFile->storeAs('image', $fileName);
            return $fileName;
        }
        return null;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $categories = Category::all();
        $product = Product::find($id);
        $ingredients = Ingredient::all();
        return view('admin.pages.products.show', compact('categories','product','ingredients'));

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
        $product = Product::findOrFail($id);
        $components = $request['components'];
        if(isset($components)){
          if(!in_array('deleteCompound',$components)){
              Compound::where('product_id',$product->id)->delete();
              foreach ($components as $component){
                  Compound::create([
                      'product_id'=>$product->id,
                      'ingredient_id'=>$component,
                  ]);
              }
          }
          else{
              Compound::where('product_id',$product->id)->delete();
          }
        }
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'string'],
            'image' => ['image','max:4096'],
        ]);

//        $input = $request->all();

//        $product->fill($input)->save();
        if($request->hasFile('image')){
            Storage::delete('image/'.$product->image);
            $image = $this->upload($request);
        }
        else{
            $image = $product->image;
        }
        $product->update([
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'image'=>$image,
        ]);

        return redirect()->back()->with('message', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
            Storage::delete('image/'.$product->image);
        $product->delete();

        return redirect()->route('admin.products.index')->with('message', 'Запись удалена');
    }
}
