<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Product Routes
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// Placeholder routes for other sections
Route::get('/order-list', function () {
    return view('order-list');
})->name('order-list');

Route::get('/customer', function () {
    return view('customer');
})->name('customer');

Route::get('/operator', function () {
    return view('operator');
})->name('operator');

Route::get('/history', function () {
    return view('history');
})->name('history');