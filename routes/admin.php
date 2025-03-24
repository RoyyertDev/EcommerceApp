<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('admin/Dashboard');
})->name('dashboard');

Route::get('/users', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::get('/users/{user}',[UserController::class, 'create'])->name('users.read');

Route::get('/products', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/variant/{product}', [VariantController::class, 'create'])->name('variants.create');
Route::post('/products/variant/{product}', [VariantController::class, 'store'])->name('variants.store');

Route::get('/landing', function (){
    return Inertia::render('admin/Landing');
})->name('landing');