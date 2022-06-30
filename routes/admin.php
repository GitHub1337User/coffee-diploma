<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminIngredientController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;










Route::prefix('admin')->name('admin.')->middleware(['auth','checkRole'])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('main');
    Route::resource('products', AdminProductsController::class);
    Route::resource('ingredients', AdminIngredientController::class);
    Route::resource('users', UserController::class);
});
