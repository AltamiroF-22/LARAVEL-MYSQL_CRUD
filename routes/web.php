<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Lista os produtos
Route::get('/product', [ProductController::class, 'index'])->name('product.index'); 
// Página de criação
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create'); 
// Salvar produto
Route::post('/product', [ProductController::class, 'store'])->name('product.store'); 
// Página de edição
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
// Atualizar produto
Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update'); 
