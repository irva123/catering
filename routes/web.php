<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Product;
use App\Http\Livewire\Transaksi;
use App\Http\Livewire\Customer;
use App\Http\Livewire\Cart;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CheckoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
});



Auth::routes();

Route::group(['middlewere'=>['auth']], function() {
    Route::get('/products',Product::class);
    Route::get('/cart',Cart::class);
    Route::get('/transaksi',Transaksi::class);
    Route::get('/customer',Customer::class);
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/kontak', [App\Http\Controllers\HomeController::class, 'contact'])->name('kontak');
    Route::get('/sukses', [App\Http\Controllers\HomeController::class, 'success'])->name('sukses');
});

