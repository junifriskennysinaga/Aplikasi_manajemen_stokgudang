<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanController;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $totalBarang = Barang::count();
    $barangMasuk = BarangMasuk::sum('jumlah');
    $barangKeluar = BarangKeluar::sum('jumlah');

    return view('dashboard', compact(
        'totalBarang',
        'barangMasuk',
        'barangKeluar'
    ));
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // KATEGORI
    Route::resource('kategori', KategoriController::class);

    // BARANG
    Route::resource('barang', BarangController::class);

    // BARANG MASUK
    Route::resource('barang-masuk', BarangMasukController::class);

    // BARANG KELUAR
    Route::resource('barang-keluar', BarangKeluarController::class);

    // LAPORAN
    Route::get('/laporan', [LaporanController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');
});

require __DIR__.'/auth.php';