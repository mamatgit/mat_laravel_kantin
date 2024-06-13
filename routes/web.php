<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//LARAVELBAWAAN
Route::get('/', function () {
    return view('welcome');
});

//Dasdhboard
Route::get('/index',[BarangController::class, 'index'])->name('index');

// fiturlainnya
Route::get('/gallery',[BarangController::class, 'gallery'])->name('gallery');
Route::get('/about',[BarangController::class, 'about'])->name('about');
Route::get('/contact',[BarangController::class, 'contact'])->name('contact');

// User Management
Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');

Route::post('register', [LoginController::class, 'register'])->name('register');

Route::post('logout', function() {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/product/{id}', [CartController::class, 'show'])->name('product.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/read', [AdminController::class, 'index'])->name('read');
    Route::get('/read',[BarangController::class, 'read'])->name('read');
    Route::get('/cartadmin',[AdminController::class, 'cartadmin'])->name('cartadmin');
    //tambahdata
    Route::get('/tambahdata',[BarangController::class, 'tambahdata'])->name('tambahdata');
    Route::post('/insertdata',[BarangController::class, 'insertdata'])->name('insertdata');

    // editdata
    Route::get('/tampilkandata/{id}',[BarangController::class, 'tampilkandata'])->name('tampilkandata');
    Route::post('/updatedata/{id}',[BarangController::class, 'updatedata'])->name('updatedata');

    // hapusdata
    Route::get('/delete/{id}',[BarangController::class, 'delete'])->name('delete');
        // Tambahkan rute admin lainnya di sini
    });

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [LoginController::class, 'login'])->name('user.dashboard');
    //keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/destroy/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    //checkout
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/order/confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');


    // Tambahkan rute user lainnya di sini
});






