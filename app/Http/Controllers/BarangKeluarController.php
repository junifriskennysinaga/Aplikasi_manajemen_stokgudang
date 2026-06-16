<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang_keluar.index', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok < $request->jumlah) {
            return redirect()
                ->back()
                ->with('error', 'Stok tidak mencukupi');
        }

        BarangKeluar::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'tanggal' => now()
        ]);

        return redirect()
            ->back()
            ->with('success', 'Barang keluar berhasil ditambahkan');
    }
}