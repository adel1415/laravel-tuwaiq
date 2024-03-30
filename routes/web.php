<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Shopping;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/dashboard', [Dashboard::class, 'index'])->name('index');

Route::get('/dashboard/products', [Dashboard::class, 'GetProducts'])->name('products');

Route::post('/product/createProducts' , [Dashboard::class, 'CreateProducts'])->name('createproducts');
Route::get('/del/{id}' , [Dashboard::class, 'del'])->name('del');
Route::get('/edit' , [Dashboard::class, 'edit'])->name('edit');

Route::get('/product/search' , [Dashboard::class, 'Search'])->name('search');

Route::get('/dashboard/getproductsdetails' , [Dashboard::class, 'GetProductsDetails'])->name('product-details');
Route::post('/productdetails/createproductdetails' , [Dashboard::class, 'CreateProductDetails'])->name('createproductdetails');

Route::get('/shopping/showitems' , [Shopping::class, 'ShowListItemPhone'])->name('showitems');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');