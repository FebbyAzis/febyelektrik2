<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPelangganController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\UtangPiutangController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/data-barang', [DataBarangController::class, 'data_barang']);
    Route::post('/tambah-barang', [DataBarangController::class, 'tambah_barang']);
    Route::put('/edit-barang/{id}', [DataBarangController::class, 'edit_barang']);
    Route::delete('/hapus-barang/{id}', [DataBarangController::class, 'hapus_barang']);
    
    Route::get('/data-pelanggan', [DataPelangganController::class, 'index']);
    Route::post('/tambah-pelanggan', [DataPelangganController::class, 'tambah_pelanggan']);
    Route::put('/edit-pelanggan/{id}', [DataPelangganController::class, 'edit_pelanggan']);
    Route::delete('/hapus-pelanggan/{id}', [DataPelangganController::class, 'hapus_pelanggan']);
    
    Route::get('/faktur', [FakturController::class, 'index']);
    Route::get('/invoice/{id}', [FakturController::class, 'invoice']);
    Route::post('/tambah-faktur', [FakturController::class, 'tambah_faktur']);
    Route::put('/edit-faktur/{id}', [FakturController::class, 'edit_faktur']);
    
    Route::post('/tambah-invoice', [FakturController::class, 'tambah_invoice']);
    Route::put('/edit-invoice/{id}', [FakturController::class, 'edit_invoice']);
    Route::delete('/hapus-invoice/{id}', [FakturController::class, 'hapus_invoice']);
    Route::get('/cetak-invoice/{id}', [FakturController::class, 'cetak_invoice']);
    Route::get('/piutang', [UtangPiutangController::class, 'piutang']);
    Route::get('/kelola-piutang/{id}', [UtangPiutangController::class, 'kelola_piutang']);
    Route::post('/pembayaran-piutang', [UtangPiutangController::class, 'pembayaran_piutang']);
    Route::delete('/hapus-pembayaran-piutang/{id}', [UtangPiutangController::class, 'hapus_piutang']);
    Route::put('/lunas-piutang/{id}', [UtangPiutangController::class, 'lunas_piutang']);
    Route::get('/utang', [UtangPiutangController::class, 'utang']);
    Route::get('/kelola-utang/{id}', [UtangPiutangController::class, 'kelola_utang']);
    Route::post('/buat-utang', [UtangPiutangController::class, 'buat_utang']);
    Route::put('/edit-utang/{id}', [UtangPiutangController::class, 'edit_utang']);
    Route::post('/pembayaran-utang', [UtangPiutangController::class, 'pembayaran_utang']);
    Route::delete('/hapus-pembayaran-utang/{id}', [UtangPiutangController::class, 'hapus_utang_bayar']);
    Route::put('/lunas-utang/{id}', [UtangPiutangController::class, 'lunas_utang']);
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
