<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/dashboard', [Dashboard::class, 'index'])->name('index');

Route::get('/dashboard/products', [Dashboard::class, 'GetProducts'])->name('products');

Route::post('/product/createProducts' , [Dashboard::class, 'CreateProducts'])->name('createproducts');
