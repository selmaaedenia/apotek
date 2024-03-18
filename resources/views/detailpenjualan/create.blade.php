@extends('adminlte::page')
@section('title', 'Tambah Detail Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Detail Penjualan</h1>
@stop
@section('content')
<form action="{{ route('detail_penjualan.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">

                        <!-- Input Detail Penjualan -->
                        <div class="form-group">
                            <label for="id_penjualan">Nomor Nota Penjualan</label>
                            <div class="input-group">
                                <input type="hidden" name="id_penjualan" id="id_penjualan" readonly value="{{$idjual}}">
                                <input type="text" name="nonota_jual" id="nonota_jual" readonly value="{{$nonota_jual}}">
                                <!-- <input type="text" class="form-control @error('penjualan')  is-invalid  @enderror"
                                    placeholder="Penjualan" id="penjualan" name="penjualan" value="{{old('penjualan')}}"
                                    aria- label="Penjualan" aria-describedby="cari" readonly>
                                <button class="btn  btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop"></i> Cari Data Users</button> -->
                            </div>

                            <!-- Input Obat -->
                            <div class="form-group">
                                <label for="Id_Obat">Id Obat</label>
                                <div class="input-group">
                                    <input type="hidden" name="id_obat" id="id_obat" value="{{old('id_obat')}}">
                                    <input type="text" class="form-control @error('obat')  is-invalid  @enderror"
                                        placeholder="Obat" id="obat" name="obat" value="{{old('obat')}}" aria-
                                        label="Obat" aria-describedby="cari" readonly>
                                    <button class="btn  btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                        data-bs-target="#staticBackdrop1"></i> Cari Data Obat</button>
                                </div>

                                <!-- Input Harga Jual -->
                            <div class="form-group">
                                <label for="exampleInputharga_jual">Harga Jual</label>
                                <input type="number" class="form-control @error('harga_jual') is-invalid @enderror"
                                    id="harga_jual" value="0" placeholder="Harga Jual" name="harga_jual" readonly value="{{old('harga_jual')}}">
                                @error('harga_jual')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Input Jumlah Jual -->
                            <div class="form-group">
                                <label for="exampleInputjumlah_jual">Jumlah Jual</label>
                                <input type="number" class="form-control @error('jumlah_jual') is-invalid @enderror"
                                    id="jumlah_jual" onkeyup="hitung()" placeholder="Jumlah Jual" name="jumlah_jual"
                                    value="{{ old('jumlah_jual') }}">
                                @error('jumlah_jual')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Input Sub Total Jual -->
                            <div class="form-group">
                                <label for="exampleInputsub_total_jual">Sub Total Jual</label>
                                <input type="double" class="form-control @error('sub_total_jual') is-invalid @enderror"
                                    id="sub_total_jual" placeholder="Sub Total Jual" value="0" readonly name="sub_total_jual"
                                    value="{{ old('sub_total_jual') }}">
                                @error('sub_total_jual')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                                <!--  Modal Penjualan -->
                                <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data
                                                    Penjualan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <table class="table table-hover table-bordered tablestripped"
                                                    id="example2">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nomor Nota Jual</th>
                                                            <th>Tanggal Jual</th>
                                                            <th>Total Jual</th>
                                                            <th>User</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($penjualan as $key => $penjualan)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$penjualan->nonota_jual}}</td>
                                                            <td>{{$penjualan->tgl_jual}}</td>
                                                            <td>{{$penjualan->total_jual}}</td>
                                                            <td>{{$penjualan->fusers->name}}</td>
                                                            <td>
                                                                <button type="button" class="btn  btn-primary btn-xs"
                                                                    onclick="pilih('{{$penjualan->id}}',  '{{$penjualan->nonota_jual}}', '{{$penjualan->tgl_jual}}', '{{$penjualan->total_jual}}', '{{$penjualan->fusers->name}}')"
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
                                <!--  Modal  Obat-->
                                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data
                                                    Obat</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <table class="table table-hover table-bordered tablestripped"
                                                    id="example3">
                                                    <thead>
                                                        <tr>
                                                        <th>No.</th>
                                                        <th>Kode Obat</th>
                                                        <th>Nama Obat</th>
                                                        <th>Merk</th>
                                                        <th>Jenis</th>
                                                        <th>Satuan</th>
                                                        <th>Golongan</th>
                                                        <th>Kemasan</th>
                                                        <th>Harga Jual</th>
                                                        <th>Stok</th>
                                                     </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($obat as $key => $obat)
                                                        <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$obat->kode_obat}}</td>
                                                        <td>{{$obat->nama_obat}}</td>
                                                        <td>{{$obat->merk}}</td>
                                                        <td>{{$obat->jenis}}</td>
                                                        <td>{{$obat->satuan}}</td>
                                                        <td>{{$obat->golongan}}</td>
                                                        <td>{{$obat->kemasan}}</td>
                                                        <td>{{$obat->harga_jual}}</td>
                                                        <td>{{$obat->stok}}</td>
                                                        <td>
                                                                <button type="button" class="btn  btn-primary 
    btn-xs" onclick="pilih1('{{$obat->id}}', '{{$obat->nama_obat}}', '{{$obat->harga_jual}}' )"
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
                                    <a href="{{ route('penjualan.index') }}" class="btn btn-danger">Cetak Nota</a>
                                    <a href="{{ route('detail_penjualan.index') }}" class="btn btn-danger">Batal</a>
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
                    //Fungsi pilih untuk memilih data Penjualan dan mengirimkan data Penjualan dari Modal ke form tambah
                    function pilih(id, penjualan) {
                        document.getElementById('id_penjualan').value = id
                        document.getElementById('penjualan').value = penjualan
                    }
                    $('#example3').DataTable({
                        "responsive": true,
                    });
                    //Fungsi pilih untuk memilih data Obat dan mengirimkan data Obat dari Modal ke form tambah
                    function pilih1(id, obat, hrg) {
                        document.getElementById('id_obat').value = id
                        document.getElementById('obat').value = obat
                        document.getElementById('harga_jual').value = hrg
                    }

                </script>
<script>
        function hitung() {
            // alert(document.getElementById("jumlah_obat").value)
            let harga = document.getElementById("harga_jual").value
            let jumlah = document.getElementById("jumlah_jual").value
            let total = parseInt(harga) * parseInt(jumlah)
            document.getElementById("sub_total_jual").value = total
            
        }
    </script>
@endpush