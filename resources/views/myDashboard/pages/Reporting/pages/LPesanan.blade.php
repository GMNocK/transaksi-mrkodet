@extends('myDashboard.pages.Reporting.layMain')

@section('isi')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex shadow-none">
    <div class="card flex-fill p-3 shadow-none">
        <div class="card-header fs-3 my-3 d-flex justify-content-center align-items-center">
            <span>Laporan Pesanan</span>
        </div>

        <div class="table-responsive col-12 mb-4 shadow-none">
            <table class="table my-0">
                <thead class="">
                    <tr>
                        <th scope="col" style="min-width: 100px">Tanggal Pesan</th>
                        <th scope="col" style="min-width: 85px">Nama Pemesan</th>
                        <th scope="col" style="min-width: 100px">Total Harga</th>
                        <th scope="col" style="min-width: 100px">metode Pengiriman</th>
                        <th scope="col" style="min-width: 100px">Metode Pembayaran</th>
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

<div id="kembali" class="my-3">
    <a href="/Rekap/RPesanan" class="btn btn-success btn-lg">
        <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
        Kembali
    </a>
</div>

@endsection