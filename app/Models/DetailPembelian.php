<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;
    protected $table = 'detail_pembelian'; 
    protected $fillable = [
        'id_pembelian', 
        'tgl_kadaluarsa', 
        'harga_beli', 
        'jumlah_beli',
        'sub_total_beli',
        'persen_margin_jual',
        'id_obat'
    ];

    public function fobat(){
        // relasi untuk ke obat
        return $this->belongsTo(obat::class, 'id_obat', 'id');
    }

    public function fpembelian(){
        // relasi untuk ke penjualan
        return $this->belongsTo(pembelian::class, 'id_pembelian', 'id');
    }
    
}