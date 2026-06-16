<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;

        $barangMasuk = BarangMasuk::with('barang')
            ->when($dari && $sampai, function ($q) use ($dari, $sampai) {
                $q->whereBetween('tanggal', [$dari, $sampai]);
            })
            ->latest()
            ->get();

        $barangKeluar = BarangKeluar::with('barang')
            ->when($dari && $sampai, function ($q) use ($dari, $sampai) {
                $q->whereBetween('tanggal', [$dari, $sampai]);
            })
            ->latest()
            ->get();

        return view('laporan.index', [
            'barangMasuk' => $barangMasuk,
            'barangKeluar' => $barangKeluar,
            'totalMasuk' => $barangMasuk->sum('jumlah'),
            'totalKeluar' => $barangKeluar->sum('jumlah'),
            'dari' => $dari,
            'sampai' => $sampai
        ]);
    }

    public function masuk()
    {
        $data = BarangMasuk::with('barang')
            ->latest()
            ->get();

        return view('laporan.masuk', compact('data'));
    }

    public function keluar()
    {
        $data = BarangKeluar::with('barang')
            ->latest()
            ->get();

        return view('laporan.keluar', compact('data'));
    }

    public function excelMasuk()
    {
        return Excel::download(new class implements FromCollection, WithHeadings {

            public function collection()
            {
                return BarangMasuk::with('barang')->get()->map(function ($item) {
                    return [
                        'barang' => $item->barang->nama_barang ?? '-',
                        'jumlah' => $item->jumlah,
                        'tanggal' => $item->tanggal,
                    ];
                });
            }

            public function headings(): array
            {
                return ['Barang', 'Jumlah', 'Tanggal'];
            }

        }, 'laporan-barang-masuk.xlsx');
    }

    public function excelKeluar()
    {
        return Excel::download(new class implements FromCollection, WithHeadings {

            public function collection()
            {
                return BarangKeluar::with('barang')->get()->map(function ($item) {
                    return [
                        'barang' => $item->barang->nama_barang ?? '-',
                        'jumlah' => $item->jumlah,
                        'tanggal' => $item->tanggal,
                    ];
                });
            }

            public function headings(): array
            {
                return ['Barang', 'Jumlah', 'Tanggal'];
            }

        }, 'laporan-barang-keluar.xlsx');
    }
}