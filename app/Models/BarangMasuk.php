<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuks';

    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal',
        'tanggal_expired'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'tanggal_expired' => 'date',
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    protected static function booted()
    {
        static::created(function ($barangMasuk) {

            $barang = $barangMasuk->barang;

            if ($barang) {
                $barang->increment(
                    'stok',
                    $barangMasuk->jumlah
                );
            }
        });
    }
}