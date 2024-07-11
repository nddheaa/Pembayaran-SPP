<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\KartuSppController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DetailSiswaController;
use App\Http\Controllers\BerandaOperatorController;
use App\Http\Controllers\KwitansiPembayaranController;

Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function () {
    Route::get('beranda', [BerandaOperatorController::class, 'index'])->name('operator.beranda');
    Route::resource('user', UserController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('detailsiswa', DetailSiswaController::class);
    Route::resource('biaya', BiayaController::class);
    Route::resource('tagihan', TagihanController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::get('kwitansi-pembayaran/{id}', [KwitansiPembayaranController::class, 'show'])
    ->name('kwitansipembayaran.show');
    Route::get('kartuspp', [KartuSppController::class, 'index'])->name('kartuspp.index');
});

Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
