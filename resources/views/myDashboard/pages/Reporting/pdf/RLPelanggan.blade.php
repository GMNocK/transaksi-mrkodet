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

    <title>LP PDF</title>
</head>
<body>
    <div class="col-md-12 col-lg-12 col-xxl-12 d-flex shadow-none">
        <div class="card flex-fill p-3 shadow-none">
            <div class="card-header fs-3 my-2 d-flex justify-content-center align-items-center">
                <span>Laporan Kaluhan Pelanggan</span>
            </div>
    
            <div class="table-responsive col-12 mb-4 shadow-none">
                <table class="table my-0">
                    <thead class="">
                        <tr>
                            <th scope="col" style="min-width: 100px">Tanggal kirim</th>
                            <th scope="col" style="min-width: 85px">judul</th>
                            <th scope="col" style="min-width: 100px">Nama Pengirim</th>
                            <th scope="col" style="min-width: 100px">Email Pengirim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lpelanggan as $t)
                        <tr>
                            <td>{{ $t->send_at }}</td>
                            <td>{{ $t->pelanggan->nama }}</td>
                            <td>{{ $t->title }}</td>
                            <td>{{ $t->pelanggan->user->email }}</td>
                            {{-- <td>{{ $t->tipePembayaran }}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>