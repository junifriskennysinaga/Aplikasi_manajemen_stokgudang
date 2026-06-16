<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangExport
{
    public function collection()
    {
        return Barang::all();
    }
}