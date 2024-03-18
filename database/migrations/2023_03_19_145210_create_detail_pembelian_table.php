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
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('id_pembelian');
            $table->dateTime('tgl_kadaluarsa');
            $table->float('harga_beli');
            $table->integer('jumlah_beli');
            $table->double('sub_total_beli');
            $table->boolean('persen_margin_jual', 4);
            $table->UnsignedBigInteger('id_obat');
            $table->foreign('id_pembelian')->references('id')->on('pembelian')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian');
    }
};
