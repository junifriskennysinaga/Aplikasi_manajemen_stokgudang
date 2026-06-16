<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluars';

    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal'
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'tanggal' => 'date',
    ];

    /**
     * Relasi Kebalikan: BarangKeluar milik sebuah Barang.
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    protected static function booted()
    {
        static::created(function ($barangKeluar) {
            $barang = $barangKeluar->barang;
            if ($barang) {
                // Mengurangi stok barang secara otomatis di database
                $barang->decrement('stok', $barangKeluar->jumlah);
            }
        });
    }
}