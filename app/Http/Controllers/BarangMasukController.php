<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barang = Barang::all();

        $riwayat = BarangMasuk::with('barang')
            ->latest()
            ->get();

        return view(
            'barang_masuk.index',
            compact(
                'barang',
                'riwayat'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'tanggal_expired' => 'nullable|date'
        ]);

        BarangMasuk::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'tanggal_expired' => $request->tanggal_expired
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Barang masuk berhasil ditambahkan'
            );
    }
}