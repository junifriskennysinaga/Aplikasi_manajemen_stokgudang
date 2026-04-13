<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('barang_keluar.index', compact('barang'));
    }

    public function store(Request $request){

        $barang = Barang::find($request->barang_id);

        BarangKeluar::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'tanggal' => now()
        ]);

        $barang->stok -= $request->jumlah;
        $barang->save();

        return back();
    }
}