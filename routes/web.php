<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserTicketController;

use App\Http\Controllers\DokterController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\userTransaksiController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('home');
    Route::resource('/user/transaksi', UserTransaksiController::class);

    Route::get('/user-get-harga-layanan/{kode_layanan}', [UserTransaksiController::class, 'usergetHargaLayanan']);
    Route::post('/userTransaksi/store', [UserTransaksiController::class, 'store'])->name('userTransaksi.store');
    Route::get('/userTransaksiShow/{id}', [UserTransaksiController::class, 'show'])->name('userTransaksiShow');
    
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
    Route::resource('/admin/dokter', DokterController::class);
    Route::resource('/admin/ruangan', RuanganController::class);
    Route::resource('/admin/layanan', LayananController::class);
    Route::resource('/admin/transaksi', TransaksiController::class);

    Route::get('/admin/transaksi/{id}/confirm', [TransaksiController::class, 'confirm'])->name('transaksi.confirm');
    Route::get('/admin/transaksi/{id}/cancel', [TransaksiController::class, 'cancel'])->name('transaksi.cancel');

    Route::get('/get-harga-layanan/{kode_layanan}', [TransaksiController::class, 'getHargaLayanan']);


   
});

/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});