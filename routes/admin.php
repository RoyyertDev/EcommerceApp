<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('admin/Dashboard');
})->name('dashboard');

Route::get('/users', [UserController::class, 'create'])->name('users');

Route::get('/products', function () {
    return Inertia::render('admin/Products');
})->name('products');

Route::get('/landing', function (){
    return Inertia::render('admin/Landing');
})->name('landing');