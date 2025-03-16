<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('admin/Dashboard');
})->name('dashboard');

Route::get('/users', function (){
    return Inertia::render('admin/Users');
})->name('users');

Route::get('/products', function () {
    return Inertia::render('admin/Products');
})->name('products');

Route::get('/landing', function (){
    return Inertia::render('admin/Landing');
})->name('landing');