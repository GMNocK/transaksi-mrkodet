@extends('myDashboard.pages.Reporting.layMain')

@section('isi')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header fs-3 my-3 d-flex justify-content-center align-items-center">
            <span>Laporan Pesanan</span>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table my-0">
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
<div id="kembali" class="my-3">
    <a href="/Rekap/RPelanggan" class="btn btn-success btn-lg">
        <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
        Kembali
    </a>
</div>


@endsection