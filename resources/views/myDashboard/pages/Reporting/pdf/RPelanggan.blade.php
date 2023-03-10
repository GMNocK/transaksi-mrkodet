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

    <title>Pelanggan PDF</title>
</head>
<body>
    <div class="col-md-12 col-lg-12 col-xxl-12 d-flex shadow-none">
        <div class="card flex-fill shadow-none">
            <div class="card-header fs-3 my-3 d-flex justify-content-center align-items-center">
                <span>Laporan Pesanan</span>
            </div>
    
            <div class="table-responsive col-12 mb-4">
                <table class="table my-0" border="2">
                    <thead class="">
                        <tr>
                            <th scope="col" style="min-width: 100px">Nama</th>
                            <th scope="col" style="min-width: 85px">Alamat</th>
                            <th scope="col" style="min-width: 100px">No. Telepon</th>
                            <th scope="col" style="min-width: 100px">Email</th>
                            <th scope="col" style="min-width: 100px">Tanggal Gabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $t)
                        <tr>
                            <td>{{ $t->nama }}</td>
                            <td>{{ $t->alamat }}</td>
                            <td>{{ $t->no_tlp }}</td>
                            <td>{{ $t->user->email }}</td>
                            <td>{{ $t->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>