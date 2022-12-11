<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <style>
        .card-header {
            text-align: center;
            margin: 30px 0;
        }
        table tr th{
            padding: 2px 5px;
        }
        table tr td{
            padding: 2px 5px;
        }
        .table-responsive {
            display: flex;
            justify-content: center;
        }
    </style>

    <title>Transaksi PDF</title>
</head>
<body>
    
    <div class="col-md-12 col-lg-12 col-xxl-12 d-flex p-0">
        <div class="card flex-fill p-0">
            <div class="card-header fs-3 d-flex justify-content-center align-items-center">
                <span>Laporan Transaksi</span>
            </div>
    
            <div class="table-responsive col-12 mb-4">
                <table class="table my-0">
                    <thead class="">
                        <tr>
                            <th scope="col" style="min-width: 100px">Tanggal</th>
                            <th scope="col" style="min-width: 85px">Total Harga</th>
                            <th scope="col" style="min-width: 85px">Barang Dibeli</th>
                            <th scope="col" style="min-width: 100px">Pencatat</th>
                            <th scope="col" class="text-center" style="min-width: 90px">Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $t)
                        <tr>
                            <td>{{ $t->tgl_transaksi }}</td>
                            <td>Rp.{{ $t->total_harga }}</td>
                            <td>{{ $t->detail_transaksi->count() }}</td>
                            <td>{{ $t->pencatat }}</td>
                            <td class="text-center">
                                <span class="{{ $t->pesanan_id == '' ? 'text-danger' : 'text-success' }} align-items-center">
                                    {{ $t->pesanan_id == '' ? 'Offline' : 'Online' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>