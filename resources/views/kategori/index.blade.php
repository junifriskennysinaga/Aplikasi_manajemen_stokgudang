@extends('layouts.app')
@section('content')
<div class="space-y-6 animate-fade-in">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Klasifikasi Kategori</h2>
            <p class="text-slate-400 text-sm font-medium">Pengelompokan jenis varian bahan baku kue</p>
        </div>
        
        <form action="{{ route('kategori.store') }}" method="POST" class="flex gap-2 bg-white p-2 rounded-2xl border border-slate-200/80 shadow-sm w-full md:w-auto">
            @csrf
            <input type="text" name="nama_kategori" placeholder="Nama Kategori Baru" class="px-4 py-2 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-slate-400" required>
            <button type="submit" class="bg-slate-950 hover:bg-black text-white px-5 py-2 rounded-xl text-sm font-bold transition shadow-md">Simpan</button>
        </form>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50/70 border-b border-slate-200/80 text-slate-400 font-bold text-[10px] uppercase tracking-widest">
                <tr><th class="p-4 pl-6">ID Kategori</th><th class="p-4">Nama Klasifikasi</th><th class="p-4 pr-6 text-right">Manajemen Aksi</th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                @forelse($kategori as $kat)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="p-4 pl-6 font-mono text-slate-400">#00{{ $kat->id }}</td>
                    <td class="p-4 font-bold text-slate-900">{{ $kat->nama_kategori }}</td>
                    <td class="p-4 pr-6 text-right">
                        <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Hapus Kategori?')">
                            @csrf @method('DELETE')
                            <button class="text-rose-600 hover:text-rose-700 font-bold text-xs underline decoration-2 underline-offset-4">Hapus Permanen</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="p-8 text-center text-slate-400">Data klasifikasi kosong.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection