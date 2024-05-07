<?php

use App\Exports\pelangganExport;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\JenisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Meja;
use App\Models\stock;

Route::middleware('cekLogin')->group(function () {
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  Route::get('/', [HomeController::class, 'index']);
  Route::resource('menu', MenuController::class);
  Route::resource('category', CategoryController::class);
  Route::resource('stock', StockController::class);
  Route::resource('pelanggan', PelangganController::class);
  Route::resource('meja', MejaController::class);
  Route::resource('jenis', JenisController::class);
  Route::resource('transaksi', TransaksiController::class);
  Route::get('/export-pelanggan', [PelangganController::class, 'export'])->name('export-pelanggan');
  Route::get('/export-stock', [stockController::class, 'export'])->name('export-stock');
  Route::get('/export-meja', [MejaController::class, 'export'])->name('export-meja');
  Route::get('/export-jenis', [jenisController::class, 'export'])->name('export-jenis');
  Route::get('/export-menu', [MenuController::class, 'export'])->name('export-menu');
  Route::get('/export-category', [categoryController::class, 'export'])->name('export-category');


  Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('import-pelanggan');
});

Route::get('/login', [LoginController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
