<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualan';
    protected $fillable = [
        'id_penjualan',
        'jumlah_jual',
        'harga_jual',
        'sub_total_jual',
        'id_obat',
    ];

    public function fpenjualan(){
        return $this->belongsTo(Penjualan::class, 'id_penjualan', 'id');
    }

    public function fobat(){
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
}
