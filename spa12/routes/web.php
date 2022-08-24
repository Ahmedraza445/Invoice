<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/api/customers', [CustomerController::class, 'search']);
Route::get('/api/products', [ProductController::class,'search']);
// Route::get('/api/invoices', [InvoiceController::class,'index']);

Route::resource('/api/invoices', 'App\Http\Controllers\InvoiceController');

Route::get('{vue?}',function(){
    return view('welcome');
})->where('vue', '[\/\w\.-]*');


