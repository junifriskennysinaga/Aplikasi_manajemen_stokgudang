@extends('layouts.app')

@section('content')

<div class="space-y-6">

```
<div class="flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-extrabold text-slate-900">
            Laporan Barang Masuk
        </h2>
        <p class="text-slate-500">
            Statistik dan riwayat barang masuk gudang
        </p>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6">
    <canvas id="chartMasuk"></canvas>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">

    <div class="p-5 border-b border-slate-200">
        <h3 class="font-bold text-slate-800">
            Riwayat Barang Masuk
        </h3>
    </div>

    <table class="w-full text-sm">
        <thead class="bg-slate-50">
            <tr>
                <th class="p-4 text-left">Barang</th>
                <th class="p-4 text-center">Jumlah</th>
                <th class="p-4 text-center">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $item)

            <tr class="border-t">
                <td class="p-4">
                    {{ $item->barang->nama_barang ?? '-' }}
                </td>

                <td class="p-4 text-center">
                    {{ $item->jumlah }}
                </td>

                <td class="p-4 text-center">
                    {{ $item->tanggal }}
                </td>
            </tr>

            @empty

            <tr>
                <td colspan="3" class="p-5 text-center text-slate-400">
                    Belum ada data
                </td>
            </tr>

            @endforelse
        </tbody>
    </table>

</div>
```

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const masukLabels = [
@foreach($data as $item)
'{{ $item->barang->nama_barang ?? "-" }}',
@endforeach
];

const masukData = [
@foreach($data as $item)
{{ $item->jumlah }},
@endforeach
];

new Chart(document.getElementById('chartMasuk'), {
    type: 'bar',
    data: {
        labels: masukLabels,
        datasets: [{
            label: 'Barang Masuk',
            data: masukData
        }]
    }
});

</script>

@endsection