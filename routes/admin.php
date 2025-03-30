<?php

use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MaterialProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StickyController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\VitalsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', [DashboardController::class, 'create'])->name('dashboard.create');

Route::get('/users', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

Route::get('/products', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/variant/{product}', [VariantController::class, 'create'])->name('variants.create');
Route::post('/products/variant/{product}', [VariantController::class, 'store'])->name('variants.store');
Route::put('/products/variant/{variant}', [VariantController::class, 'update'])->name('variants.update');

Route::get('/landing', [LandingController::class, 'create'])->name('landing');

Route::get('/vitals', [VitalsController::class, 'create'])->name('vitals.create');

Route::post('/materials', [MaterialProductController::class, 'store'])->name('materials.store');
Route::post('/categories', [CategoryProductController::class, 'store'])->name('categories.store');
Route::post('/colors', [ColorController::class, 'store'])->name('colors.store');
Route::post('/sizes', [SizeController::class, 'store'])->name('sizes.store');
Route::post('/stickies', [StickyController::class, 'store'])->name('stickies.store');