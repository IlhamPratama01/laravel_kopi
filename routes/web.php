<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksinotaController;
use Illuminate\Support\Facades\Auth;

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
Route::middleware(['guest'])->group(function () {

    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class,'landing']);
    Route::get('/login',[App\Http\Controllers\Admin\DashboardController::class,'login']);
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
Route::prefix('manager')->group(function (){
    
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'manager']);
    Route::get('role', [RoleController::class,'tampil']);
    Route::get('/role/ubah/{id}', [RoleController::class,'ubah']);
    Route::get('produk', [UserController::class,'produk']);
    Route::get('pembelian', [UserController::class,'pembelian']);
    Route::get('grafik', [UserController::class,'grafik']);
    
});

Route::prefix('admin')->group(function (){

Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'admin']);
Route::get('produk', [ProdukController::class,'tampil']);
Route::get('form', [ProdukController::class,'tambah']);
Route::post('submit', [ProdukController::class,'simpan']);
Route::get('orderan', [UserController::class,'orderan']);
Route::get('historyor', [UserController::class,'historyor']);
Route::get('ubah/{id}', [UserController::class,'ubah']);


});

Route::prefix('user')->group(function (){

Route::get('menu', [UserController::class,'tampil']);
Route::get('history', [UserController::class,'history']);

});


Route::post('/produk/edit', [ProdukController::class,'edit']);

Route::get('/produk/ubah/{id}', [ProdukController::class,'ubah']);

Route::get('/destroy/{id}',[ProdukController::class,'hapus']);

Route::get('/hapus/{id}',[RoleController::class,'hapus']);

Route::get('/role/ubah/{id}', [RoleController::class,'ubah']);

Route::post('/role/edit', [RoleController::class,'edit']);

Route::any('/pesan/{id}', [TransaksiController::class,'pesan']);

Route::any('/kirim/{id}', [TransaksiController::class,'kirim']);

Route::get('/transaksi', [TransaksiController::class,'cart']);

Route::get('/delete/{id}', [TransaksiController::class,'delete']);

Route::any('/order', [TransaksiController::class,'order']);

Route::get('/pembelian/cetak_pdf', [UserController::class, 'cetak_pdf']);

Route::get('/produk/cetak_pdf', [UserController::class, 'produk_pdf']);








});