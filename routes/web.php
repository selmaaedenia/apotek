<?php

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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', function() {
    return view('home');
})->name('login')->middleware('auth');

// Auth::routes();

// Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');

Route::resource('obat', \App\Http\Controllers\ObatController::class)->middleware('auth');

Route::resource('distributor', \App\Http\Controllers\DistributorController::class)->middleware('auth');

Route::resource('penjualan', \App\Http\Controllers\PenjualanController::class)->middleware('auth');

Route::resource('detail_penjualan', \App\Http\Controllers\DetailPenjualanController::class)->middleware('auth');

Route::resource('pembelian', \App\Http\Controllers\PembelianController::class)->middleware('auth');

Route::resource('detail_pembelian', \App\Http\Controllers\DetailPembelianController::class)->middleware('auth');

Route::get('/cetak', [\App\Http\Controllers\DetailPembelianController::class, 'cetak'])->name('cetak');

