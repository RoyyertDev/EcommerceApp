<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('admin/Dashboard');
})->name('dashboard');

Route::get('/users', [UserController::class, 'create'])->name('users');

Route::get('/products', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/variant/{product}', [VariantController::class, 'create'])->name('product.variant');

Route::get('/landing', function (){
    return Inertia::render('admin/Landing');
})->name('landing');