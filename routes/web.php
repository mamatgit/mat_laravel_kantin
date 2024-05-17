<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[BarangController::class, 'index'])->name('index');
Route::get('/read',[BarangController::class, 'read'])->name('read');
Route::get('/tampilkandata/{id}',[BarangController::class, 'tampilkandata'])->name('tampilkandata');
Route::get('/delete/{id}',[BarangController::class, 'delete'])->name('delete');
Route::post('/insertdata',[BarangController::class, 'insertdata'])->name('insertdata');
Route::post('/updatedata/{id}',[BarangController::class, 'updatedata'])->name('updatedata');
Route::get('/tambahdata',[BarangController::class, 'tambahdata'])->name('tambahdata');
Route::get('/about',[BarangController::class, 'about'])->name('about');
Route::get('/contact',[BarangController::class, 'contact'])->name('contact');
