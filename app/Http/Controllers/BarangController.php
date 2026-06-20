<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function dashboard()
    {
        $totalBahan = Barang::count();

        $stokMenipis = Barang::where('stok', '<=', 15)->count();

        $alertBahan = Barang::where('stok', '<=', 15)
            ->latest()
            ->take(15)
            ->get();

        $totalMasuk = 0;
        $totalKeluar = 0;

        $aktivitas = [
            'Belum ada aktivitas gudang'
        ];

        // Grafik stok barang
        $chartLabel = Barang::pluck('nama_barang');
        $chartData = Barang::pluck('stok');

        return view('dashboard', compact(
            'totalBahan',
            'stokMenipis',
            'alertBahan',
            'totalMasuk',
            'totalKeluar',
            'aktivitas',
            'chartLabel',
            'chartData'
        ));
    }

    public function index()
    {
        $barangs = Barang::with([
            'kategori',
            'supplier'
        ])->latest()->get();

        $kategoris = Kategori::all();

        $suppliers = Supplier::all();

        return view('barang.index', compact(
            'barangs',
            'kategoris',
            'suppliers'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'nullable'
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'kategori_id' => $request->kategori_id,
            'supplier_id' => $request->supplier_id
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'nullable'
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'kategori_id' => $request->kategori_id,
            'supplier_id' => $request->supplier_id
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}
