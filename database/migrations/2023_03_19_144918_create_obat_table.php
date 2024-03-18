<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obat', function (Blueprint $table){
            $table->id();
            $table->string('kode_obat', 30);
            $table->string('nama_obat', 50);
            $table->string('merk', 50);
            $table->string('jenis', 50);
            $table->string('satuan', 30);
            $table->string('golongan', 255);
            $table->string('kemasan', 255);
            $table->float('harga_jual');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
