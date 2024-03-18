<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\Obat;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    //Menampilkan Data Penjualan
    public function index(){
        $penjualan = Penjualan::all();
        return view('penjualan.index', [
            'penjualan' => $penjualan
        ]);
    }

    public function create()
    {
    //Menampillkan Form Tambah Data Penjualan
    return view(
        'penjualan.create', [
            'users' => User::all() //Mengirim semua data user ke Modal pada halaman create
        ]
        );
    }

    public function store(Request $request)
    {
        //Menyimpan Data Penjualan
        $request->validate([
            'nonota_jual' => 'required',
            'tgl_jual' => 'required',
            'total_jual' => 'required',
            'id_user' => 'required'
        ]);
        $array = $request->only([
            'nonota_jual',
            'tgl_jual',
            'total_jual',
            'id_user'
        ]);

        $nonotajual = $array['nonota_jual'];
        $penjualan = Penjualan::create($array);
        $cari_id = Penjualan::where('nonota_jual', '=', $nonotajual)->get('id');
        // return redirect()->route('detailpenjualan.create')->with('success_message', 'Berhasil menambah data penjualan baru');
        return view(
            'detailpenjualan.create', [
                'penjualan' => Penjualan::all(), //Mengirim semua data Penjualan ke Modal pada halaman create
                'obat' => Obat::all(), //Mengirim semua data Obat ke Modal pada halaman create
                'idjual' => $cari_id[0]['id'],
                'nonota_jual' => $array['nonota_jual']
            ]
            );
    }

    public function edit($id)
    {
        //Menampilkan Form Edit
        $penjualan = Penjualan::find($id);
        if (!$penjualan) return redirect()->route('penjualan.index')->with('error_message', 'data penjualan dengan id = '.$id.' tidak ditemukan');
        return view('penjualan.edit', ['penjualan' => $penjualan,
        'users' => User::all() //Mengirimkan semua data user ke Modal pada halaman edit
        ]);
    }

    public function update(Request $request, $id)
        {
            //Mengedit Data Penjualan
            $request->validate([
                'nonota_jual' => 'required',
                'tgl_jual' => 'required',
                'total_jual' => 'required',
                'id_user' => 'required'
            ]);

            $penjualan = Penjualan::find($id);
            $penjualan->nonota_jual = $request->nonota_jual;
            $penjualan->tgl_jual = $request->tgl_jual;
            $penjualan->total_jual = $request->total_jual;
            $penjualan->id_user = $request->id_user;
            $penjualan->save();
            return redirect()->route('penjualan.index')->with('success_message', 'Berhasil mengubah data Penjualan');
        }

        public function destroy(Request $request, $id)
        {
            //Menghapus penjualan
            $penjualan = Penjualan::find($id);
            if ($penjualan) $penjualan->delete();
            return redirect()->route('penjualan.index')->with('success_message', 'Berhasil menghapus data Penjualan');
        }
}
