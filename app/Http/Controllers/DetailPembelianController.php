<?php

namespace App\Http\Controllers;
use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Distributor;
use App\Models\Obat;

use Illuminate\Http\Request;

class DetailPembeliancontroller extends Controller
{
    public function index()
    {
        //Menampilkan Semua Data Detail pembelian
        $detail_pembelian = DetailPembelian::all();
        return view('detailpembelian.index', [
            'detail_pembelian' => $detail_pembelian
        ]);
    } 

    public function create()
    {
        //Menampilkan Form Tambah 
        return view(
            'detailpembelian.create',[
                'pembelian' => Pembelian::all(), //mengirim data semua user ke form create data pembelian
                'obat' => Obat::all() //mengirim data semua distributor ke form create data pembelian
            ]);
    }
    public function cetak()
    {
        $dp = DetailPembelian::all();
        return view ('detailpembelian.cetak', [
            'dp' => $dp
        ]);
    }
    public function store(Request $request)
    {
        //Menyimpan Data Detail pembelian
        // dd($request);
        $request->validate([
            'id_pembelian' => 'required', 
            'tgl_kadaluarsa' => 'required',
            'harga_beli' => 'required',
            'jumlah_beli' => 'required',
            'sub_total_beli' => 'required',
            'persen_margin_jual' => 'required',
            'id_obat' => 'required'
        ]);
        $array = $request->only([
            'id_pembelian', 
            'tgl_kadaluarsa',
            'harga_beli',
            'jumlah_beli',
            'sub_total_beli',
            'persen_margin_jual',
            'id_obat'
        ]);
        DetailPembelian::create($array);
        return view(
            'detailpembelian.create', [
                'pembelian' => Pembelian::all(), //Mengirim semua data Penjualan ke Modal pada halaman create
                'obat' => Obat::all(), //Mengirim semua data Obat ke Modal pada halaman create
                'idbeli' => $array['id_pembelian'],
                'nonota_beli' => $request['nonota_beli']
            ]
            );
    } 
}