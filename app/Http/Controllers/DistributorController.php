<?php

namespace App\Http\Controllers;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        //Menampilkan Data Distributor
        $distributor = Distributor::all();
        return view('distributor.index', [
            'distributor' => $distributor
        ]);
    }

    public function create()
    {
        // Menampilkan Form Tambah Distributor
        return view('distributor.create');
    }
    
    public function store(Request $request)
    {
        //Menyimpan Data Distributor
        $request->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'notelepon' => 'required'
        ]);
        $array = $request->only([
            'nama_distributor',
            'alamat',
            'notelepon'
        ]);
        $distributor = Distributor::create($array);
        return redirect()->route('distributor.index')->with('success_message', 'Berhasil menambah distributor');
    }
    public function edit($id)
    {
        //Menampilkan Form Edit
        $distributor = Distributor::find($id);
        if (!$distributor) return redirect()->route('distributor.index')->with('error_message', 'distributor dengan id = '.$id.' tidak ditemukan');
        return view('distributor.edit', ['distributor' => $distributor
        ]);
    }
    public function update(Request $request, $id)
        {
            //Mengedit Data Distributor
            $request->validate([
                'nama_distributor' => 'required',
                'alamat' => 'required',
                'notelepon' => 'required'
            ]);
            $distributor = Distributor::find($id);
            $distributor->nama_distributor = $request->nama_distributor;
            $distributor->alamat = $request->alamat;
            $distributor->notelepon = $request->notelepon;
            $distributor->save();
            return redirect()->route('distributor.index')->with('success_message', 'Berhasil mengubah Distributor');
        }

        public function destroy(Request $request, $id)
        {
            //Menghapus distributor
            $distributor = Distributor::find($id);
            if ($distributor) $distributor->delete();
            return redirect()->route('distributor.index')->with('success_message', 'Berhasil menghapus Distributor');
        }
}