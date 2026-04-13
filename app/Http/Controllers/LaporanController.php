<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;

        // 🔥 TAMBAH with('barang')
        $barangMasuk = BarangMasuk::with('barang')
            ->when($dari, function ($q) use ($dari) {
                return $q->whereDate('tanggal', '>=', $dari);
            })
            ->when($sampai, function ($q) use ($sampai) {
                return $q->whereDate('tanggal', '<=', $sampai);
            })
            ->get();

        $barangKeluar = BarangKeluar::with('barang')
            ->when($dari, function ($q) use ($dari) {
                return $q->whereDate('tanggal', '>=', $dari);
            })
            ->when($sampai, function ($q) use ($sampai) {
                return $q->whereDate('tanggal', '<=', $sampai);
            })
            ->get();

        $totalMasuk = $barangMasuk->sum('jumlah');
        $totalKeluar = $barangKeluar->sum('jumlah');

        return view('laporan.index', compact(
            'barangMasuk',
            'barangKeluar',
            'totalMasuk',
            'totalKeluar',
            'dari',
            'sampai'
        ));
    }
}