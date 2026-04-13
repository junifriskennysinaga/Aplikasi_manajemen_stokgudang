<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang',
        'satuan',
        'kategori_id',
        'stok'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}