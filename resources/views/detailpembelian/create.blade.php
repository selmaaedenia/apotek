@extends('adminlte::page') 
@section('title', 'Tambah Detail Pembelian') 
@section('content_header') 
<h1 class="m-0 text-dark">Tambah Detail Pembelian</h1> 
@stop
@section('content') 
<form action="{{route('detail_pembelian.store')}}"  method="post"> 
    @csrf
    <div class="row"> 
        <div class="col-12"> 
            <div class="card"> 
                <div class="card-body"> 

                    <div class="form-group"> 
                            <label
                            for="id_pembelian">No. Nota pembelian</label> 
                            <div class="input-group">
                                <input type="hidden" name="id_pembelian" id="id_pembelian" readonly value="{{$idbeli}}">
                                <input type="text" name="nonota_beli" id="nonota_beli" readonly value="{{$nonota_beli}}">
                                <!-- <input type="text" class="form-control @error('pembelian') is-invalid @enderror" 
                                placeholder="pembelian" id="pembelian" name="pembelian" value="{{old('pembelian')}}" aria- label="pembelian" aria-describedby="cari" readonly> 
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target=#staticBackdrop>Cari Data pembelian</button> -->
                            </div>
                        </div>

                        <div class="form-group"> 
                        <label for="tgl_kadaluarsa">Tanggal Kadaluarsa</label> 
                            <input type="date" class="form-control 
                            @error('tgl_kadaluarsa') is-invalid @enderror" id="tgl_kadaluarsa"
                            placeholder="Masukkan Tanggal" name="tgl_kadaluarsa" value="{{old('tgl_kadaluarsa')}}"> 
                            @error('tgl_kadaluarsa') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="id_obat">Obat</label> 
                            <div class="input-group">
                                <input type="hidden" name="id_obat" id="id_obat" value="{{old('id_obat')}}">
                                <input type="text" class="form-control @error('obat') is-invalid @enderror" 
                                placeholder="obat" id="obat" name="obat" value="{{old('obat')}}" aria- label="obat" aria-describedby="cari"> 
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target=#staticBackdrop1>Cari Data Obat</button>
                            </div>
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="harga_beli">Harga</label> 
                            <input type="double" class="form-control 
                            @error('harga_beli') is-invalid @enderror" id="harga_beli" 
                            placeholder="Masukan Harga" name="harga_beli" value="{{old('harga_beli')}}"> 
                            @error('harga_beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group"> 
                        <label for="jumlah_beli">Jumlah Beli</label> 
                            <input type="number" class="form-control 
                            @error('jumlah_beli') is-invalid @enderror" id="jumlah_beli" onkeyup="hitung()"
                            placeholder="Masukkan Tanggal" name="jumlah_beli" value="{{old('jumlah_beli')}}"> 
                            @error('jumlah_beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 
                        
                        <div class="form-group"> 
                            <label
                            for="sub_total_beli">Total beli</label> 
                            <input type="double" class="form-control 
                            @error('sub_total_beli') is-invalid @enderror" id="sub_total_beli"
                            placeholder="Masukan Total" value="0" readonly name="sub_total_beli" value="{{old('sub_total_beli')}}"> 
                            @error('sub_total_beli') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group"> 
                            <label
                            for="persen_margin_jual">Persen Margin Jual</label> 
                            <input type="double" class="form-control 
                            @error('persen_margin_jual') is-invalid @enderror" id="persen_margin_jual" onkeyup="jual()"
                            placeholder="Masukan Total" value="{{old('jumlah_beli')}}" name="persen_margin_jual" value="{{old('persen_margin_jual')}}"> 
                            @error('persen_margin_jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group"> 
                            <label
                            for="harga_jual">Harga Jual (Rp)</label> 
                            <input type="double" class="form-control 
                            @error('harga_jual') is-invalid @enderror" id="harga_jual"
                            placeholder="Masukan Total" value="0" readonly name="harga_jual" value="{{old('harga_jual')}}"> 
                            @error('harga_jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        
                    <div class="card-footer"> 
                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('pembelian.index') }}" class="btn btn-danger">Cetak Nota</a>
                                    <a href="{{ route('detail_pembelian.index') }}" class="btn btn-danger">Batal</a>
                    </div> 

                        <!-- Modal untuk relasi ke pembelian -->
                        <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"
                                        id="staticBackdropLabel">Pencarian Data pembelian</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <table class="table table-hover table-bordered tablestripped" id="example2">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Nota Pembelian</th>
                                        <th>Tanggal Beli</th>
                                        <th>Distributor</th>
                                        <th>User</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pembelian as $key => $pembelian)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$pembelian->nonota_beli}}</td>
                                            <td>{{$pembelian->tgl_beli}}</td>
                                            <td>{{$pembelian->fdistributor->nama_distributor}}</td>
                                            <td>{{$pembelian->fusers->name}}</td>
                                            <td>
                                                    <button type="button" class="btn btn-primary 
                                                    btn-xs" onclick="pilih1('{{$pembelian->nonota_beli}}', '{{$pembelian->tgl_beli}}', '{{$pembelian->id_user}}' )" data-bs-dismiss="modal">
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

<!-- Modal untuk relasi ke obat -->
<div class="modal fade" id="staticBackdrop1" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"
                                        id="staticBackdropLabel1">Pencarian Data Obat</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <table class="table table-hover table-bordered tablestripped" id="example3">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Obat</th>
                                            <th>Nama</th>
                                            <th>Merk</th>
                                            <th>Harga Jual</th>
                                            <th>Stock</th>
                                            <th>Opsi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($obat as $key => $obat)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$obat->kode_obat}}</td>
                                                <td>{{$obat->nama_obat}}</td>
                                                <td>{{$obat->merk}}</td>
                                                <td>{{$obat->harga_jual}}</td>
                                                <td>{{$obat->stok}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary 
                                                    btn-xs" onclick="pilih2('{{$obat->id}}', '{{$obat->nama_obat}}', '{{$obat->harga_jual}}')" data-bs-dismiss="modal">
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
function pilih1(id, pembelian){
    document.getElementById('id_pembelian').value = id
    document.getElementById('pembelian').value = pembelian
} 
</script> 

<script>
    $('#example3').DataTable({"responsive": true, });
    function pilih2(id, obat, hrg){
    document.getElementById('id_obat').value = id
    document.getElementById('obat').value = obat
    document.getElementById('harga_beli').value = hrg
        }
</script>

<script>
        function jual() {
            // alert(document.getElementById("jumlah_obat").value)
            let harga = document.getElementById("harga_beli").value
            let margin = document.getElementById("persen_margin_jual").value
            let total = parseInt(harga) + parseInt(harga) * parseInt(margin)/100
            document.getElementById("harga_jual").value = total
            
        }
    </script>

<script>
        function hitung() {
            // alert(document.getElementById("jumlah_obat").value)
            let harga = document.getElementById("harga_beli").value
            let jumlah = document.getElementById("jumlah_beli").value
            let total = parseInt(harga) * parseInt(jumlah)
            document.getElementById("sub_total_beli").value = total
            
        }
    </script>
@endpush