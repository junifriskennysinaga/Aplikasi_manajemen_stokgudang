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

// ✅ DASHBOARD ADA DATA
Route::get('/dashboard', function () {
    $totalBarang = Barang::count();
    $barangMasuk = BarangMasuk::sum('jumlah');
    $barangKeluar = BarangKeluar::sum('jumlah');

    return view('dashboard', compact('totalBarang', 'barangMasuk', 'barangKeluar'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('barang-masuk', BarangMasukController::class);
    Route::resource('barang-keluar', BarangKeluarController::class);

    Route::get('/laporan', [LaporanController::class, 'index']);
});

require __DIR__.'/auth.php';