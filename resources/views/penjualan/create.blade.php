@extends('adminlte::page')
@section('title', 'Tambah penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah penjualan</h1>
@stop
@section('content')
<form action="{{ route('penjualan.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">

                        <!-- Input Nomor Nota Jual -->
                        <label for="exampleInputNonota_Jual">Nomor Nota Jual</label>
                        <input type="text" class="form-control @error('nonota_jual') is-invalid @enderror"
                            id="nonota_jual" placeholder="Nomor Nota Jual" name="nonota_jual"
                            value="{{ old('nonota_jual') }}">
                        @error('nonota_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Tanggal Jual -->
                    <div class="form-group">
                        <label for="tgl_jual">Tanggal Jual</label>
                        <input type="text" class="form-control 
                            @error('tgl_jual') is-invalid @enderror" id="tgl_jual" readonly
                            placeholder="Masukkan Tanggal Jual" name="tgl_jual" value="{{date('Y-d-m') ?? old('tgl_jual')}}">
                        @error('tgl_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <!-- Input Total Beli -->
                    <div class="form-group">
                        <label for="exampleInputTotal_Beli">Total Jual</label>
                        <input type="text" value="0" readonly
                            class="form-control @error('total_jual') is-invalid @enderror" id="exampleInputTotal_jual"
                            placeholder="Total Jual" name="total_jual" value="{{ old('total_jual') }}">
                        @error('total_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input User -->
                    <div class="form-group">
                        <!-- <label for="Id_User">Id User</label> -->
                        <!-- <div class="input-group"> -->
                        <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                        <!-- <input type="text" class="form-control @error('users')  is-invalid  @enderror" placeholder="Users" id="users" name="users" value="{{old('users')}}" aria- label="Users" aria-describedby="cari" readonly>
                            <button class="btn  btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i> Cari Data Users</button> -->
                        <!-- </div> -->

                        <!--  Modal  -->
                        <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false"
                            tabindex="-1" arialabelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Users
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <table class="table table-hover table-bordered tablestripped" id="example2">
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
                                                        <button type="button" class="btn  btn-primary btn-xs"
                                                            onclick="pilih('{{$user->id}}',  '{{$user->name}}', '{{$user->email}}', '{{$user->level}}','{{$user->aktif}}')"
                                                            data-bs-dismiss="modal">
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



                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('penjualan.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Users dari Modal ke form tambah
        function pilih(id, usr) {
            document.getElementById('id_user').value = id
            document.getElementById('users').value = usr
        }

    </script>
    @endpush
