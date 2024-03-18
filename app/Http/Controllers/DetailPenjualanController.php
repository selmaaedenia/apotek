<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Obat;
use App\Models\DetailPenjualan;

class DetailPenjualanController extends Controller
{
    //Menampilkan data detail penjualan
    public function index()
    {
        //Menampilkan Detail Penjualan
        $detail_penjualan = DetailPenjualan::all();
        return view('detailpenjualan.index', [
            'detail_penjualan' => $detail_penjualan
        ]);
    }

    public function create()
    {
    //Menampillkan Form Tambah Detail Penjualan
    return view(
        'detailpenjualan.create', [
            'penjualan' => Penjualan::all(), //Mengirim semua data Penjualan ke Modal pada halaman create
            'obat' => Obat::all() //Mengirim semua data Obat ke Modal pada halaman create
        ]
        );
    }

    public function store(Request $request)
    {
        // dd($request);
        //Menyimpan Data Detail Penjualan
        $request->validate([
            'id_penjualan' => 'required',
            'jumlah_jual' => 'required',
            'harga_jual' => 'required',
            'sub_total_jual' => 'required',
            'id_obat' => 'required'
        ]);
        $array = $request->only([
            'id_penjualan',
            'jumlah_jual',
            'harga_jual',
            'sub_total_jual',
            'id_obat'
        ]);
        DetailPenjualan::create($array);
        return view(
            'detailpenjualan.create', [
                'penjualan' => Penjualan::all(), //Mengirim semua data Penjualan ke Modal pada halaman create
                'obat' => Obat::all(), //Mengirim semua data Obat ke Modal pada halaman create
                'idjual' => $array['id_penjualan'],
                'nonota_jual' => $request['nonota_jual']
            ]
            );
        // return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menambah data detail penjualan');
    }
}
