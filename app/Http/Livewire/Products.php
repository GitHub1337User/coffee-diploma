<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class Products extends Component
{
    use WithPagination;
    use WithFileUploads;
    public  Product $product;
    public $popUp  = false;
    protected $rules =[
        'product.title'=>['required','string','min:2'],
        'product.description'=>['required','string','min:2','max:500'],
        'product.price'=>['required','numeric'],
        'product.category_id'=>['required'],
//        'product.image' => ['image','max:1024'],
    ];
    public function add(){
        $this->popUp = true;
        $this->product = new Product();
    }
    public function delete(Product $product){
        $product->delete();
    }

    public function store(){
       $data =  $this->validate();
       $this->product->save($data);
       $this->close();

    }
    public function update(Product $product){
        $this->popUp = true;
        $this->product=$product;

    }
    public function close(){
        $this->reset(['popUp']);
    }
    public function render()
    {
        $products = Product::orderByDesc('created_at')->simplePaginate(5);
        $categories= Category::all();
        return view('livewire.products',['products'=>$products,'categories'=>$categories]);
    }
}
