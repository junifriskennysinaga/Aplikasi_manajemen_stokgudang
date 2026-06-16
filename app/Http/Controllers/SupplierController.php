<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        $suppliers = Supplier::latest()->get();
        return view('supplier.index', compact('suppliers'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_supplier' => 'required|string|max:150',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string'
        ]);

        Supplier::create($request->all());
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil didaftarkan');
    }

    public function update(Request $request, Supplier $supplier) {
        $request->validate([
            'nama_supplier' => 'required|string|max:150',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string'
        ]);

        $supplier->update($request->all());
        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diperbarui');
    }

    public function destroy(Supplier $supplier) {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus');
    }
}