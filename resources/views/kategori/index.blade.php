@extends('layouts.app')
@section('title', 'Kategori - GudangKu')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Kategori</h1>
            <p class="text-slate-400 text-sm mt-1 font-medium">Pengelompokan jenis barang gudang</p>
        </div>

        <form action="{{ route('kategori.store') }}" method="POST" class="flex gap-2 bg-white p-1.5 rounded-xl border border-slate-200/80 w-full md:w-auto">
            @csrf
            <input type="text" name="nama_kategori" placeholder="Nama kategori baru"
                class="px-3.5 py-2 text-sm font-medium focus:outline-none w-full md:w-56" required>
            <button type="submit" class="bg-slate-900 hover:bg-slate-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shrink-0">
                Tambah
            </button>
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-100 text-slate-400 font-bold text-[11px] uppercase tracking-widest">
                <tr>
                    <th class="p-4 pl-6">ID</th>
                    <th class="p-4">Nama Kategori</th>
                    <th class="p-4 pr-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @forelse($kategori as $kat)
                <tr class="hover:bg-slate-50/70 transition">
                    <td class="p-4 pl-6 font-mono text-slate-400">#{{ str_pad($kat->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td class="p-4 font-bold text-slate-900">{{ $kat->nama_kategori }}</td>
                    <td class="p-4 pr-6 text-right">
                        <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-rose-500 hover:text-rose-700 font-semibold text-xs transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="p-10 text-center text-slate-400 text-sm">Belum ada data kategori</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection