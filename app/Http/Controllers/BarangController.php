<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function index()
    {
        $barang = Barang::with('kategori')->latest()->get();

        $barangHabis = Barang::where('stok', '<=', 5)->get();

        return view('barang.index', compact(
            'barang',
            'barangHabis'
        ));
    }

    // ➕ FORM TAMBAH BARANG
    public function create()
    {
        $kategori = Kategori::all();

        $barangHabis = Barang::where('stok', '<=', 5)->get();

        return view('barang.create', compact(
            'kategori',
            'barangHabis'
        ));
    }

    // 💾 SIMPAN DATA BARANG
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'kategori_id' => $request->kategori_id,
            'stok' => 0 // stok awal default
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        $kategori = Kategori::all();

        $barangHabis = Barang::where('stok', '<=', 5)->get();

        return view('barang.edit', compact(
            'barang',
            'kategori',
            'barangHabis'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil diupdate');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();

        return back()
            ->with('success', 'Data barang berhasil dihapus');
    }
}