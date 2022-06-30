<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Compound;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Ingredient::orderByDesc('created_at')->paginate(5);
        return view('admin.pages.ingredients', compact('categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = Category::all();
//        $ingredients = Ingredient::all();
        return view('admin.pages.ingredients.create');
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
            'description' => ['required', 'string'],
            'price' => ['required', 'string'],
        ]);
        $image = $this->upload($request);
//        $input = $request->all();
//        Product::create($input);
        Ingredient::create([
            'title' => $request['title'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'image'=>$image,
        ]);

        return redirect()->route('admin.ingredients.create')->with('message', 'Запись добавлена');;
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
        $product = Ingredient::find($id);
        return view('admin.pages.ingredients.show', compact('product'));
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
        $product = Ingredient::findOrFail($id);

        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'string'],
            'image' => ['image','max:4096'],
        ]);

        if($request->hasFile('image')){
            Storage::delete('image/'.$product->image);
            $image = $this->upload($request);
        }
        else{
            $image = $product->image;
        }
        $product->update([
            'title' => $request['title'],
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
        $ingredient = Ingredient::findOrFail($id);
        Storage::delete('image/'.$ingredient->image);
        $ingredient->delete();

        return redirect()->route('admin.ingredients.index')->with('message', 'Запись удалена');
    }
}
