<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::with('kategori')->get();
        return view('barang.index', compact('barang'));
    }

    public function create(){
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request){

        $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'kategori_id' => 'required'
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'kategori_id' => $request->kategori_id,
            'stok' => 0
        ]);

        return redirect('/barang');
    }

    public function destroy($id){
        Barang::destroy($id);
        return back();
    }
}