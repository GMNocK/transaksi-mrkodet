@extends('myDashboard.pages.Reporting.layMain')

@section('isi')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex shadow-none">
    <div class="card flex-fill p-3 shadow-none">
        <div class="card-header fs-3 my-2 d-flex justify-content-center align-items-center">
            <span>Laporan Pesanan</span>
        </div>

        <div class="table-responsive col-12 mb-4 shadow-none">
            <table class="table my-0">
                <thead class="">
                    <tr>
                        <th scope="col" style="min-width: 100px">Tanggal</th>
                        <th scope="col" style="min-width: 85px">Nama Pemesan</th>
                        <th scope="col" style="min-width: 100px">Total Harga</th>
                        <th scope="col" style="min-width: 100px">Pengiriman</th>
                        {{-- <th scope="col" style="min-width: 100px">Pembayaran</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lpelanggan as $t)
                    <tr>
                        <td>{{ $t->send_at }}</td>
                        <td>{{ $t->pelanggan->nama }}</td>
                        <td>{{ $t->title }}</td>
                        <td>{{ $t->excerpt }}</td>
                        {{-- <td>{{ $t->tipePembayaran }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection