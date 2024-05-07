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
  Route::get('/export-category', [CategoryController::class, 'export'])->name('export-category');

  Route::get('/export-menu/pdf', [MenuController::class, 'exportPdf'])->name('export-menu-pdf');
  Route::get('/export-category/pdf', [CategoryController::class, 'exportPdf'])->name('export-category-pdf');
  Route::get('/export-stock/pdf', [StockController::class, 'exportPdf'])->name('export-stock-pdf');
  Route::get('/export-pelanggan/pdf', [PelangganController::class, 'exportPdf'])->name('export-pelanggan-pdf');
  Route::get('/export-meja/pdf', [MejaController::class, 'exportPdf'])->name('export-meja-pdf');

  Route::post('/import-menu', [MenuController::class, 'import'])->name('import-menu');
  Route::post('/import-category', [CategoryController::class, 'import'])->name('import-category');
  Route::post('/import-stock', [StockController::class, 'import'])->name('import-stock');
  Route::post('/import-pelanggan', [PelangganController::class, 'import'])->name('import-pelanggan');
  Route::post('/import-meja', [MejaController::class, 'import'])->name('import-meja');
});

Route::get('/login', [LoginController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
