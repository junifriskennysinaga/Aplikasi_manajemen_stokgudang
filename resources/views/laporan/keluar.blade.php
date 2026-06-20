@extends('layouts.app')
@section('title', 'Laporan Barang Keluar - GudangKu')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-3">
        <div>
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Laporan Barang Keluar</h1>
            <p class="text-slate-400 text-sm mt-1 font-medium">Statistik dan riwayat barang keluar gudang</p>
        </div>

        @if(auth()->user()->role == 'manajer')
        <a href="{{ route('laporan.keluar.excel') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 rounded-xl font-semibold text-sm transition w-fit">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H8a2 2 0 01-2-2V5a2 2 0 012-2h6l6 6v11a2 2 0 01-2 2z"/></svg>
            Unduh Excel
        </a>
        @endif
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 p-6">
        <h3 class="font-bold text-slate-900 mb-1">Grafik Barang Keluar</h3>
        <p class="text-slate-400 text-xs font-medium mb-5">Jumlah barang keluar per item</p>
        <div style="height:340px">
            <canvas id="chartKeluar"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">
            <h3 class="font-bold text-slate-900">Riwayat Barang Keluar</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-100 text-slate-400 font-bold text-[11px] uppercase tracking-widest">
                    <tr>
                        <th class="p-4 pl-6 text-left">Barang</th>
                        <th class="p-4 text-center">Jumlah</th>
                        <th class="p-4 pr-6 text-center">Tanggal</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($data as $item)

                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="p-4 pl-6 font-semibold text-slate-800">{{ $item->barang->nama_barang ?? '-' }}</td>
                        <td class="p-4 text-center">
                            <span class="bg-rose-50 text-rose-600 font-bold px-3 py-1 rounded-lg text-xs">-{{ $item->jumlah }}</span>
                        </td>
                        <td class="p-4 pr-6 text-center text-slate-500">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="3" class="p-10 text-center text-slate-400 text-sm">
                            Belum ada data barang keluar
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const keluarLabels = [
@foreach($data as $item)
'{{ $item->barang->nama_barang ?? "-" }}',
@endforeach
];

const keluarData = [
@foreach($data as $item)
{{ $item->jumlah }},
@endforeach
];

new Chart(document.getElementById('chartKeluar'), {
    type: 'bar',
    data: {
        labels: keluarLabels,
        datasets: [{
            label: 'Barang Keluar',
            data: keluarData,
            backgroundColor: '#e11d48',
            borderRadius: 6,
            maxBarThickness: 36
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
            x: { grid: { display: false } }
        }
    }
});

</script>

@endsection