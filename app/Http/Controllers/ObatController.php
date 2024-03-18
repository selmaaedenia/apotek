<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        //Menampilkan Data Obat
        $obat = Obat::all();
        return view('obat.index', [
            'obat' => $obat
        ]);
    }

    public function create()
    {
        // Menampilkan Form Tambah Obat
        return view(
            'obat.create');
    }
    
    public function store(Request $request)
    {
        //Menyimpan Data Obat
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'satuan' => 'required',
            'golongan' => 'required',
            'kemasan' => 'required',
            'harga_jual' => 'required',
            'stok'=>'required'
        ]);
        $array = $request->only([
            'kode_obat',
            'nama_obat',
            'merk',
            'jenis',
            'satuan',
            'golongan',
            'kemasan',
            'harga_jual',
            'stok'
        ]);
        $obat = Obat::create($array);
        return redirect()->route('obat.index')->with('success_message', 'Berhasil menambah data Obat');
    }
    
    public function edit($id)
    {
        //Menampilkan Form Edit
        $obat = Obat::find($id);
        if (!$obat) return redirect()->route('obat.index')
        ->with('error_message', 'Obat dengan id = '.$id.' tidak ditemukan');
        return view('obat.edit', [
            'obat' => $obat
        ]);
    }
    public function update(Request $request, $id)
        {
            //Mengedit Data Obat
            $request->validate([
                'kode_obat',
                'nama_obat',
                'merk',
                'jenis',
                'satuan',
                'golongan',
                'kemasan',
                'harga_jual',
                'stok'
            ]);

            $obat = Obat::find($id);
            $obat->kode_obat = $request->kode_obat;
            $obat->nama_obat = $request->nama_obat;
            $obat->merk = $request->merk;
            $obat->jenis = $request->jenis;
            $obat->satuan = $request->satuan;
            $obat->golongan = $request->golongan;
            $obat->kemasan = $request->kemasan;
            $obat->harga_jual = $request->harga_jual;
            $obat->stok = $request->stok;
            $obat->save();
            return redirect()->route('obat.index')
                ->with('success_message', 'Berhasil mengubah data Obat');
        }

        public function destroy(Request $request, $id)
        {
            //Menghapus distributor
            $obat = Obat::find($id);
            if ($obat) $obat->delete();
            return redirect()->route('obat.index')->with('success_message', 'Berhasil menghapus data Obat');
        }
}