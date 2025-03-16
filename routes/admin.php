<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('admin/Dashboard');
})->name('dashboard');

Route::get('/users', function (){
    return Inertia::render('admin/Users');
})->name('users');

Route::get('/products', [ProductController::class, 'create'])->name('products');

Route::get('/landing', function (){
    return Inertia::render('admin/Landing');
})->name('landing');

Route::get('/variantsProduct/{id}', function ($id) {
    return "<h1>hola</h1>" . $id;
})->name('products.variant');