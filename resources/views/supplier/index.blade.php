@extends('layouts.app')
@section('title', 'Supplier - GudangKu')

@section('content')

<div class="space-y-6">
    <div>
        <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Supplier</h1>
        <p class="text-slate-400 text-sm mt-1 font-medium">Kelola data pemasok bahan baku</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        <form action="{{ route('supplier.store') }}" method="POST" class="bg-white p-6 rounded-2xl border border-slate-200/80 space-y-4 h-fit">
            @csrf
            <h3 class="font-extrabold text-slate-900">Tambah Supplier</h3>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Nama Perusahaan</label>
                <input type="text" name="nama_supplier"
                    class="w-full border border-slate-200 px-3.5 py-2.5 rounded-xl text-sm focus:border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900/10 transition" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Nomor Telepon</label>
                <input type="text" name="telepon"
                    class="w-full border border-slate-200 px-3.5 py-2.5 rounded-xl text-sm focus:border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900/10 transition" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Alamat</label>
                <textarea name="alamat"
                    class="w-full border border-slate-200 px-3.5 py-2.5 rounded-xl text-sm h-20 resize-none focus:border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900/10 transition" required></textarea>
            </div>

            <button type="submit" class="w-full py-3 bg-slate-900 hover:bg-slate-700 text-white font-semibold rounded-xl text-sm transition shadow-lg shadow-slate-900/10">
                Simpan Supplier
            </button>
        </form>

        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200/80 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-100 text-slate-400 font-bold text-[11px] uppercase tracking-widest">
                    <tr>
                        <th class="p-4 pl-6">Nama Supplier</th>
                        <th class="p-4">Telepon</th>
                        <th class="p-4">Alamat</th>
                        <th class="p-4 pr-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse($suppliers as $sup)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="p-4 pl-6 font-bold text-slate-900">{{ $sup->nama_supplier }}</td>
                        <td class="p-4 font-mono text-slate-500">{{ $sup->telepon }}</td>
                        <td class="p-4 text-slate-500 text-xs max-w-xs">{{ $sup->alamat }}</td>
                        <td class="p-4 pr-6 text-right">
                            <form action="{{ route('supplier.destroy', $sup->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-500 hover:text-rose-700 font-semibold text-xs transition" onclick="return confirm('Hapus supplier ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-10 text-center text-slate-400 text-sm">Belum ada supplier terdaftar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection