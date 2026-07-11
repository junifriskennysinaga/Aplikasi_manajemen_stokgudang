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

        return view('barang_masuk.index', compact('barang', 'riwayat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id'       => 'required|exists:barangs,id',
            'jumlah'          => 'required|integer|min:1',
            'tanggal'         => 'required|date',
            'tanggal_expired' => 'nullable|date',
        ]);

        BarangMasuk::create([
            'barang_id'       => $request->barang_id,
            'jumlah'          => $request->jumlah,
            'tanggal'         => $request->tanggal,
            'tanggal_expired' => $request->tanggal_expired,
        ]);

        return redirect()->back()->with('success', 'Barang masuk berhasil ditambahkan');
    }

    public function show(BarangMasuk $barangMasuk)
    {
        return redirect()->route('barang-masuk.index');
    }

    public function edit(BarangMasuk $barangMasuk)
    {
        $barang = Barang::all();
        return view('barang_masuk.edit', compact('barangMasuk', 'barang'));
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'barang_id'       => 'required|exists:barangs,id',
            'jumlah'          => 'required|integer|min:1',
            'tanggal'         => 'required|date',
            'tanggal_expired' => 'nullable|date',
        ]);

        // Hitung selisih jumlah untuk update stok
        $selisih = $request->jumlah - $barangMasuk->jumlah;

        $barangMasuk->update([
            'barang_id'       => $request->barang_id,
            'jumlah'          => $request->jumlah,
            'tanggal'         => $request->tanggal,
            'tanggal_expired' => $request->tanggal_expired,
        ]);

        if ($selisih !== 0) {
            $barang = Barang::findOrFail($request->barang_id);
            $barang->increment('stok', $selisih);
        }

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil diperbarui');
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        $barang = $barangMasuk->barang;
        if ($barang) {
            $barang->decrement('stok', $barangMasuk->jumlah);
        }

        $barangMasuk->delete();

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil dihapus');
    }
}