@extends('layouts.app')
@section('title', 'Laporan Stok - GudangKu')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Laporan Stok Gudang</h1>
            <p class="text-slate-400 text-sm mt-1 font-medium">Monitoring barang masuk dan keluar secara real-time</p>
        </div>
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-slate-200 text-xs font-semibold text-slate-500 w-fit">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            {{ $barangMasuk->count() + $barangKeluar->count() }} total aktivitas
        </div>
    </div>

    <!-- FILTER -->
    <div class="bg-white rounded-2xl p-5 border border-slate-200/80">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">

            <div>
                <label class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5 block">Dari Tanggal</label>
                <input type="date" name="dari" value="{{ $dari }}"
                       class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition">
            </div>

            <div>
                <label class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5 block">Sampai Tanggal</label>
                <input type="date" name="sampai" value="{{ $sampai }}"
                       class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition">
            </div>

            <button class="h-[42px] rounded-xl bg-slate-900 hover:bg-slate-700 text-white font-semibold text-sm transition shadow-lg shadow-slate-900/10">
                Tampilkan Laporan
            </button>

        </form>
    </div>

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        <div class="bg-white rounded-2xl p-6 border border-slate-200/80">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wide">Total Barang Masuk</p>
                    <h2 class="text-4xl font-extrabold text-slate-900 mt-2">{{ $totalMasuk }}</h2>
                    <p class="mt-2 text-slate-400 text-xs font-medium">Barang diterima gudang</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0-16l-5 5m5-5l5 5"/></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/80">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wide">Total Barang Keluar</p>
                    <h2 class="text-4xl font-extrabold text-slate-900 mt-2">{{ $totalKeluar }}</h2>
                    <p class="mt-2 text-slate-400 text-xs font-medium">Barang keluar gudang</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20V4m0 16l-5-5m5 5l5-5"/></svg>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">
            <h2 class="text-base font-extrabold text-slate-900">Detail Aktivitas Gudang</h2>
            <p class="text-slate-400 text-xs mt-0.5">Riwayat transaksi barang masuk dan keluar</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-100 text-slate-400 font-bold text-[11px] uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-3.5 text-left">Tanggal</th>
                        <th class="px-6 py-3.5 text-left">Nama Barang</th>
                        <th class="px-6 py-3.5 text-center">Jumlah</th>
                        <th class="px-6 py-3.5 text-center">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($barangMasuk as $m)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-6 py-4 text-slate-500 font-medium">{{ \Carbon\Carbon::parse($m->tanggal)->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0-16l-5 5m5-5l5 5"/></svg>
                                </div>
                                <span class="font-bold text-slate-800">{{ $m->barang->nama_barang ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-blue-50 text-blue-700 font-bold px-3 py-1 rounded-lg text-xs">+{{ $m->jumlah }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-emerald-50 text-emerald-600 text-xs font-bold px-3 py-1 rounded-full">Masuk</span>
                        </td>
                    </tr>
                    @empty
                    @endforelse

                    @forelse($barangKeluar as $k)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-6 py-4 text-slate-500 font-medium">{{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-amber-50 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20V4m0 16l-5-5m5 5l5-5"/></svg>
                                </div>
                                <span class="font-bold text-slate-800">{{ $k->barang->nama_barang ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-rose-50 text-rose-600 font-bold px-3 py-1 rounded-lg text-xs">-{{ $k->jumlah }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-rose-50 text-rose-600 text-xs font-bold px-3 py-1 rounded-full">Keluar</span>
                        </td>
                    </tr>
                    @empty
                    @endforelse

                    @if($barangMasuk->isEmpty() && $barangKeluar->isEmpty())
                    <tr><td colspan="4" class="px-6 py-10 text-center text-slate-400 text-sm">Belum ada data aktivitas</td></tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection