<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/login', [MainController::class, '']);
Route::get('/', [MainController::class, 'products_categories']);  
Route::get('/cart', function () {
  return view('cart');
});
Route::get('/cart', function () {
  return view('cart');
});
Route::get('/checkout', function () {
  return view('checkout');
});
Route::get('/contact', function () {
  return view('contact');
});
Route::get('/detail/{id}', [MainController::class, 'detail']); 
Route::get('/shop', function () {
  return view('shop');
});
  