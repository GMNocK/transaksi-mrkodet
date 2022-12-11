<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan PDF</title>
    {{-- <link rel="stylesheet" href="/bootstrap/bootstrap.min.css"> --}}

    <style>
        .card-header {
            text-align: center;
            margin: 30px 0;
        }
        table tr th{
            padding: 2px 10px;
        }
        table tr td{
            padding: 2px 10px;
        }
        .table-responsive {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="col-md-12 col-lg-12 col-xxl-12 d-flex shadow-none">
        <div class="card flex-fill p-3 shadow-none">
            <div class="card-header fs-3 my-2 d-flex justify-content-center align-items-center">
                <span>Laporan Pesanan</span>
            </div>
    
            <div class="table-responsive col-12 mb-4 shadow-none">
                <table class="table my-0" border="2">
                    <thead class="">
                        <tr>
                            <th scope="col" style="min-width: 100px">Tanggal</th>
                            <th scope="col" style="min-width: 85px">Nama Pemesan</th>
                            <th scope="col" style="min-width: 100px">Total Harga</th>
                            <th scope="col" style="min-width: 100px">Pengiriman</th>
                            <th scope="col" style="min-width: 100px">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $t)
                        <tr>
                            <td>{{ $t->waktu_pesan }}</td>
                            <td>{{ $t->pelanggan->nama }}</td>
                            <td>{{ $t->total_harga }}</td>
                            <td>{{ $t->tipe_kirim }}</td>
                            <td>{{ $t->tipePembayaran }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>