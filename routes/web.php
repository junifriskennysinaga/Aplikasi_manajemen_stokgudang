<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
})->name('landing');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [BarangController::class, 'dashboard'])
        ->name('dashboard');

    Route::middleware('role:admin')->group(function () {

        Route::resource('kategori', KategoriController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('barang', BarangController::class);
        Route::resource('barang-masuk', BarangMasukController::class);
        Route::resource('barang-keluar', BarangKeluarController::class);

    });

    Route::middleware('role:admin,manajer')->group(function () {

        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');

        Route::get('/laporan/masuk', [LaporanController::class, 'masuk'])
            ->name('laporan.masuk');

        Route::get('/laporan/keluar', [LaporanController::class, 'keluar'])
            ->name('laporan.keluar');

        Route::get('/laporan/masuk/pdf', [LaporanController::class, 'pdfMasuk'])
            ->name('laporan.masuk.pdf');

        Route::get('/laporan/keluar/pdf', [LaporanController::class, 'pdfKeluar'])
            ->name('laporan.keluar.pdf');

    });

    Route::middleware('role:manajer')->group(function () {

        Route::get('/laporan/masuk/excel', [LaporanController::class, 'excelMasuk'])
            ->name('laporan.masuk.excel');

        Route::get('/laporan/keluar/excel', [LaporanController::class, 'excelKeluar'])
            ->name('laporan.keluar.excel');

    });

});

require __DIR__.'/auth.php';