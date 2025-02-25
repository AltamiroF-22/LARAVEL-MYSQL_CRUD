<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product',[ProductController::class,'index'])-> name('product.index');
Route::get('/product/create',[ProductController::class,'create'])-> name('product.index');
Route::post('/product',[ProductController::class,'store'])-> name('product.store');