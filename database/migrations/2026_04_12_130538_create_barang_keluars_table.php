<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();

            // RELASI KE BARANG + AUTO DELETE
            $table->foreignId('barang_id')
                  ->constrained('barangs')
                  ->cascadeOnDelete();

            $table->date('tanggal');
            $table->integer('jumlah');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};