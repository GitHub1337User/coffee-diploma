<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/admin.php';
Route::get('/', [MainController::class,'index'])->name('main');
Route::get('/coffee', [CoffeeController::class,'index'])->name('coffee');
Route::get('/ingredients', [IngredientController::class,'index'])->name('ingredients');
Route::get('/productselse/{id}', [IngredientController::class,'productselse'])->name('productselse');
Route::get('/aboutus', function () {
    return view('pages.about');
})->name('aboutus');
Route::get('/personal', function () {
    return view('pages.personal');
})->middleware('auth')->name('personal');
Route::get('/buy', [CartController::class,'index'])->middleware('auth')->name('buy');
Route::get('/products/{id}', [CoffeeController::class,'getById'])->name('products');

Route::name('user.')->group(function () {

    Route::get('/register',[RegisterController::class,'index'])->name('index')->middleware('guest');
    Route::post('/register/create',[RegisterController::class,'create'])->name('create')->middleware('guest');

    Route::get('/login',[LoginController::class,'index'])->name('indexLogin')->middleware('guest');
    Route::post('/login/login',[LoginController::class,'login'])->name('login')->middleware('guest');
    Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
});
require __DIR__.'/cart.php';
require __DIR__.'/order.php';
