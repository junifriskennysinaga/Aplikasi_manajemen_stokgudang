<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->startOfDay();

        $totalBahan  = Barang::count();
        $totalMasuk  = BarangMasuk::count();
        $totalKeluar = BarangKeluar::count();
        $stokMenipis = Barang::where('stok', '<=', 10)->count();
        $stokHabis   = Barang::where('stok', 0)->get();
        $alertBahan  = Barang::where('stok', '<=', 10)->orderBy('stok')->get();

        $nearExpired = BarangMasuk::with('barang')
            ->whereNotNull('tanggal_expired')
            ->where('tanggal_expired', '!=', '')
            ->whereDate('tanggal_expired', '>=', $today)
            ->whereDate('tanggal_expired', '<=', $today->copy()->addDays(30))
            ->orderBy('tanggal_expired')
            ->get();

        $sudahExpired = BarangMasuk::with('barang')
            ->whereNotNull('tanggal_expired')
            ->where('tanggal_expired', '!=', '')
            ->whereDate('tanggal_expired', '<', $today)
            ->orderBy('tanggal_expired')
            ->get();

        $logMasuk = BarangMasuk::with('barang')
            ->latest()
            ->take(10)
            ->get()
            ->map(fn($m) => [
                'tipe'   => 'masuk',
                'pesan'  => 'Barang masuk: ' . ($m->barang->nama_barang ?? '—'),
                'jumlah' => $m->jumlah,
                'waktu'  => Carbon::parse($m->tanggal)->translatedFormat('d M Y'),
                'sort'   => $m->created_at,
            ]);

        $logKeluar = BarangKeluar::with('barang')
            ->latest()
            ->take(10)
            ->get()
            ->map(fn($k) => [
                'tipe'   => 'keluar',
                'pesan'  => 'Barang keluar: ' . ($k->barang->nama_barang ?? '—'),
                'jumlah' => $k->jumlah,
                'waktu'  => Carbon::parse($k->tanggal)->translatedFormat('d M Y'),
                'sort'   => $k->created_at,
            ]);

        $logAktivitas = $logMasuk->concat($logKeluar)
            ->sortByDesc('sort')
            ->take(10)
            ->values();

        // ── Chart bulanan ──
        $chartBulan         = [];
        $chartMasukBulanan  = [];
        $chartKeluarBulanan = [];

        for ($i = 1; $i <= 12; $i++) {
            $chartBulan[]         = Carbon::create(null, $i)->translatedFormat('M');
            $chartMasukBulanan[]  = BarangMasuk::whereYear('tanggal', date('Y'))->whereMonth('tanggal', $i)->count();
            $chartKeluarBulanan[] = BarangKeluar::whereYear('tanggal', date('Y'))->whereMonth('tanggal', $i)->count();
        }

        $semuaBarang = Barang::orderBy('nama_barang')->get();
        $chartLabel  = $semuaBarang->pluck('nama_barang')->toArray();
        $chartData   = $semuaBarang->pluck('stok')->toArray();

        // ── Notifikasi bell navbar (admin only) ──
        $notifications = collect();

        if (auth()->user()->role === 'admin') {

            // 1. Stok habis (prioritas tertinggi)
            foreach (Barang::where('stok', 0)->get() as $b) {
                $notifications->push([
                    'tipe'  => 'habis',
                    'judul' => 'Stok habis — ' . $b->nama_barang,
                    'pesan' => 'Stok saat ini 0 unit. Segera lakukan pengadaan.',
                    'waktu' => now()->translatedFormat('d M Y'),
                ]);
            }

            // 2. Stok menipis (> 0 tapi <= 10)
            foreach (Barang::where('stok', '>', 0)->where('stok', '<=', 10)->orderBy('stok')->get() as $b) {
                $notifications->push([
                    'tipe'  => 'menipis',
                    'judul' => 'Stok menipis — ' . $b->nama_barang,
                    'pesan' => 'Stok saat ini ' . $b->stok . ' unit (batas minimum 10).',
                    'waktu' => now()->translatedFormat('d M Y'),
                ]);
            }

            // 3. Mendekati expired (≤ 30 hari)
            foreach ($nearExpired as $m) {
                $sisa = (int) now()->startOfDay()->diffInDays(Carbon::parse($m->tanggal_expired)->startOfDay());
                $notifications->push([
                    'tipe'  => 'near_expired',
                    'judul' => 'Mendekati expired — ' . ($m->barang->nama_barang ?? '—'),
                    'pesan' => 'Kedaluwarsa ' . Carbon::parse($m->tanggal_expired)->translatedFormat('d M Y') . " ({$sisa} hari lagi).",
                    'waktu' => Carbon::parse($m->tanggal_expired)->translatedFormat('d M Y'),
                ]);
            }

            // 4. Sudah expired
            foreach ($sudahExpired as $m) {
                $lewat = (int) Carbon::parse($m->tanggal_expired)->startOfDay()->diffInDays(now()->startOfDay());
                $notifications->push([
                    'tipe'  => 'expired',
                    'judul' => 'Sudah expired — ' . ($m->barang->nama_barang ?? '—'),
                    'pesan' => 'Kedaluwarsa ' . Carbon::parse($m->tanggal_expired)->translatedFormat('d M Y') . ". Sudah lewat {$lewat} hari.",
                    'waktu' => Carbon::parse($m->tanggal_expired)->translatedFormat('d M Y'),
                ]);
            }

        }

        return view('dashboard', compact(
            'totalBahan',
            'totalMasuk',
            'totalKeluar',
            'stokMenipis',
            'stokHabis',
            'alertBahan',
            'nearExpired',
            'sudahExpired',
            'logAktivitas',
            'chartBulan',
            'chartMasukBulanan',
            'chartKeluarBulanan',
            'chartLabel',
            'chartData',
            'notifications', 
        ));
    }
}