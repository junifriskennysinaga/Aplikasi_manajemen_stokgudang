<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        $kategori = Kategori::latest()->get();
        return view('kategori.index', compact('kategori'));
    }

    // TAMBAH DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100'
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan');
    }

    // EDIT DATA (UPDATE)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100'
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return back()->with('success', 'Kategori berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus');
    }
}