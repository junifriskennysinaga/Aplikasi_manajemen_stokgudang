@extends('layouts.app')

@section('content')
<div class="space-y-6 animate-fade-in">
    <div>
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Kemitraan Supplier</h2>
        <p class="text-slate-400 text-sm font-medium">Manajemen relasi agen distribusi pasokan bahan baku kue</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <form action="{{ route('supplier.store') }}" method="POST" class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm space-y-4 h-fit">
            @csrf
            <h3 class="font-extrabold text-slate-900 text-base mb-2">Registrasi Kontrak Baru</h3>
            
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Nama Perusahaan / Agen</label>
                <input type="text" name="nama_supplier" class="w-full bg-slate-50 border border-slate-200 focus:border-slate-950 px-3 py-2 rounded-xl text-sm font-medium focus:bg-white focus:outline-none transition" required>
            </div>
            
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Nomor Telepon Kontrak</label>
                <input type="text" name="telepon" class="w-full bg-slate-50 border border-slate-200 focus:border-slate-950 px-3 py-2 rounded-xl text-sm font-medium focus:bg-white focus:outline-none transition" required>
            </div>
            
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Alamat Kantor Distribusi</label>
                <textarea name="alamat" class="w-full bg-slate-50 border border-slate-200 focus:border-slate-950 px-3 py-2 rounded-xl text-sm font-medium focus:bg-white focus:outline-none h-20 transition resize-none" required></textarea>
            </div>
            
            <button type="submit" class="w-full py-3 bg-slate-950 hover:bg-black text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow-md transition">Otorisasi Agen</button>
        </form>

        <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/70 border-b border-slate-200/80 text-slate-400 font-bold text-[10px] uppercase tracking-widest">
                    <tr>
                        <th class="p-4 pl-6">Vendor Pemasok</th>
                        <th class="p-4">Saluran Telepon</th>
                        <th class="p-4">Alamat Kantor</th>
                        <th class="p-4 pr-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                    @forelse($suppliers as $sup)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="p-4 pl-6 font-bold text-slate-900">{{ $sup->nama_supplier }}</td>
                        <td class="p-4 font-mono text-slate-500">{{ $sup->telepon }}</td>
                        <td class="p-4 text-slate-500 text-xs">{{ $sup->alamat }}</td>
                        <td class="p-4 pr-6 text-right">
                            <form action="{{ route('supplier.destroy', $sup->id) }}" method="POST" class="inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 font-bold text-xs hover:text-rose-700 transition" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-slate-400">
                             Tidak ada supplier terdaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection