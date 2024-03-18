@extends('adminlte::page')
@section('title', 'Tambah Distributor')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Distributor</h1>
@stop
@section('content')
    <form action="{{route('distributor.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                <!-- Input Nama Distributor -->
                <div class="form-group">
                    <label for="exampleInputnama_distributor">Nama Distributor</label>
                    <input type="text" class="form-control
                    @error('nama_distributor') is-invalid @enderror" id="exampleInputnama_distributor"
                    placeholder="Nama Distributor" name="nama_distributor" value="{{old('nama_distributor')}}">
                    @error('nama_distributor') <span class="textdanger">{{$message}}</span> @enderror
                </div>
     
                <!-- Input Alamat -->
                <div class="form-group">
                    <label for="exampleInputalamat">Alamat</label>
                    <input type="text" class="form-control
                    @error('alamat') is-invalid @enderror" id="exampleInputalamat"
                    placeholder="Alamat" name="alamat" value="{{old('alamat')}}">
                    @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                </div>

                <!-- Input Nomor Telepon -->
                <div class="form-group">
                    <label for="exampleInputnotelepon">Nomor Telepon</label>
                    <input type="text" class="form-control
                    @error('notelepon') is-invalid @enderror" id="exampleInputnotelepon"
                    placeholder="Nomor Telepon" name="notelepon" value="{{old('notelepon')}}">
                    @error('notelepon') <span class="textdanger">{{$message}}</span> @enderror
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('distributor.index')}}" class="btn btn-default">
                    Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop