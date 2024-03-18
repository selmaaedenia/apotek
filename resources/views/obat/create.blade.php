@extends('adminlte::page')
@section('title', 'Tambah Obat')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Obat</h1>
@stop
@section('content')
    <form action="{{route('obat.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                <!-- Input Kode Obat -->
                    <div class="form-group">
                        <label
for="exampleInputkode_obat">Kode Obat</label>
                        <input type="text" class="form-control
@error('kode_obat') is-invalid @enderror" id="exampleInputkode_obat"
placeholder="Kode Obat" name="kode_obat" value="{{old('kode_obat')}}">
                        @error('kode_obat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Input Nama Obat -->
                    <div class="form-group">
                        <label for="exampleInputnama_obat">Nama Obat</label>
                        <input type="text" class="form-control
@error('nama_obat') is-invalid @enderror" id="exampleInputnama_obat"
placeholder="Nama Obat" name="nama_obat" value="{{old('nama_obat')}}">
                        @error('nama_obat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Input Merk -->
                    <div class="form-group">
                        <label for="exampleInputmerk">Merk</label>
                        <input type="merk" class="form-control
@error('merk') is-invalid @enderror" id="exampleInputmerk"
placeholder="Masukkan Merk" name="merk" value="{{old('merk')}}">
                        @error('merk') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Input Jenis -->
                    <div class="form-group">
                        <label
for="exampleInputjenis">Jenis</label>
                        <input type="jenis" class="form-control
@error('jenis') is-invalid @enderror" id="exampleInputjenis"
placeholder="Jenis" name="jenis">
                        @error('jenis') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Input Satuan -->
                    <div class="form-group">
                        <label
for="exampleInputsatuan">Satuan</label>
                        <input type="satuan" class="form-control
@error('satuan') is-invalid @enderror" id="exampleInputsatuan"
placeholder="Satuan" name="satuan">
                        @error('satuan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Input Golongan -->
                    <div class="form-group">
                        <label
for="exampleInputgolongan">Golongan</label>
                        <input type="golongan" class="form-control
@error('golongan') is-invalid @enderror" id="exampleInputgolongan"
placeholder="Golongan" name="golongan">
                        @error('golongan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Input Kemasan -->
                    <div class="form-group">
                        <label
for="exampleInputkemasan">Kemasan</label>
                        <input type="kemasan" class="form-control
@error('kemasan') is-invalid @enderror" id="exampleInputkemasan"
placeholder="Kemasan" name="kemasan">
                        @error('kemasan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Input Harga Jual -->
                    <div class="form-group">
                        <label
for="exampleInputharga_jual">Harga Jual</label>
                        <input type="number" class="form-control
@error('harga_jual') is-invalid @enderror" id="exampleInputharga_jual" value="0" readonly
placeholder="Harga Jual" name="harga_jual">
                        @error('harga_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    
                    <!-- Input Stok -->
                    <div class="form-group">
                        <label
for="exampleInputStok">Stok</label>
                        <input type="stok" class="form-control
@error('stok') is-invalid @enderror" id="exampleInputstok" value="0" readonly
placeholder="Stok" name="stok">
                        @error('stok') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    
                    
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-default">
                    Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
