@extends('adminlte::page')
@section('title', 'Edit Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Pembelian</h1>
@stop
@section('content')
    <form action="{{route('pembelian.update', $pembelian)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group"> 
                        <label for="nonota_beli">No. Nota pembelian</label> 
                        <input type="text" class="form-control 
                        @error('nonota_beli') is-invalid @enderror" id="nonota_beli"
                        placeholder="Nomor Nota" name="nonota_beli" value="{{$pembelian->nonota_beli ?? old('nonota_beli')}}"> 
                        @error('nonota_beli') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 

                    <div class="form-group"> 
                        <label for="tgl_beli">Tanggal beli</label> 
                            <input type="date" class="form-control 
                            @error('tgl_beli') is-invalid @enderror" id="tgl_beli"
                            placeholder="Masukkan Tanggal" name="tgl_beli" value="{{$pembelian->tgl_beli ?? old('tgl_beli')}}"> 
                            @error('tgl_beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="total_beli">Total beli</label> 
                            <input type="double" class="form-control 
                            @error('total_beli') is-invalid @enderror" id="total_beli"
                            placeholder="Masukan Total" name="total_beli" value="{{$pembelian->total_beli ?? old('total_beli')}}"> 
                            @error('total_beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group">
                            <label for="id_distributor">Distributor</label>
                            <div class="input-group">
                                <input type="hidden" name="id_distributor" id="id_distributor" value="{{$pembelian->fdistributor->id_distributor ?? old('id_distributor')}}">
                                <input type="text" class="form-control @error('distributor') is-invalid @enderror" placeholder="distributor" id= "distributor" name="distributor" value="{{$pembelian->fdistributor->nama_distributor ?? old('nama_distributor')}}" aria-label="distributor" aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop">Cari Data distributor</button>
                            </div>

                        <div class="form-group">
                            <label for="id_user">User</label>
                            <div class="input-group">
                                <input type="hidden" name="id_user" id="id_user" value="{{$pembelian->fusers->id_user ?? old('id_user')}}">
                                <input type="text" class="form-control @error('users') is-invalid @enderror" placeholder="Users" id= "users" name="users" value="{{$pembelian->fusers->name ?? old('name')}}" aria-label="User" aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop1">Cari Data User</button>
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

<!-- Modal untuk relasi ke distributor -->
<div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"
                                        id="staticBackdropLabel">Pencarian Data Distributor</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <table class="table table-hover table-bordered tablestripped" id="example2">
                                        <thead>
                                        <tr>
                            <th>No.</th>
                            <th>Nama Distributor</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($distributor as $key => $distributor)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$distributor->nama_distributor}}</td>
                                <td>{{$distributor->alamat}}</td>
                                <td>{{$distributor->notelepon}}</td>
                                <td>
                                                    <button type="button" class="btn btn-primary 
                                                    btn-xs" onclick="pilih1('{{$distributor->id}}', '{{$distributor->nama_distributor}}', '{{$distributor->alamat}}', '{{$distributor->notelepon}}')" data-bs-dismiss="modal">
                                                    Pilih
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
<!-- End Modal -->
                    
                        <!-- Modal untuk relasi ke user -->
                        <div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"
                                        id="staticBackdropLabel1">Pencarian Data User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <table class="table table-hover table-bordered tablestripped" id="example3">
                                        <thead>
                                            <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Aktif</th>
                                            <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->level}}</td>
                                            <td>{{$user->aktif}}</td>
                                            <td>
                                                    <button type="button" class="btn btn-primary 
                                                    btn-xs" onclick="pilih2('{{$user->id}}', '{{$user->name}}', '{{$user->email}}', '{{$user->level}}', '{{$user->aktif}}' )" data-bs-dismiss="modal">
                                                    Pilih
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
<!-- End Modal -->
                </div> 
            </div> 
        </div> 
@stop
@push('js') 
<script> 
$('#example2').DataTable({"responsive": true, });
 //Fungsi pilih untuk memilih data user dan mengirimkan data user dari Modal ke form tambah
function pilih1(id, distributor){
    document.getElementById('id_distributor').value = id
    document.getElementById('distributor').value = distributor
} 
</script> 
<script>
$('#example3').DataTable({"responsive": true, });
    function pilih2(id, user){
    document.getElementById('id_user').value = id
    document.getElementById('users').value = user
} 
</script>
@endpush