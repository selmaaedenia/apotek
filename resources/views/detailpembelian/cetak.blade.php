<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-toke" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Cetak Detail Pembelian</title>

</head>

<body>
    <div class="container text-center form-group">
        <p class="text-center"><b>CETAK DATA DETAIL PEMBELIAN</b></p>
        <table class="table border table-bordered
    table-stripped" id="example2">
            <thead>
                <tr class="border border-black">
                    <th>No.</th>
                    <th>No. Nota Beli</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Harga Beli</th>
                    <th>Jumlah Beli</th>
                    <th>Sub Total</th>
                    <th>Persen Margin Jual</th>
                    <th>Obat</th>
                </tr>
            </thead>
            <tbody class="border border-black">

                @foreach($dp as $key => $detail_pembelian)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$detail_pembelian->fpembelian->nonota_beli}}</td>
                    <td>{{$detail_pembelian->tgl_kadaluarsa}}</td>
                    <td>{{$detail_pembelian->harga_beli}}</td>
                    <td>{{$detail_pembelian->jumlah_beli}}</td>
                    <td>{{$detail_pembelian->sub_total_beli}}</td>
                    <td>{{$detail_pembelian->persen_margin_jual}}</td>
                    <td>{{$detail_pembelian->fobat->nama_obat}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script type="text/javascript">
        window.print();

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
