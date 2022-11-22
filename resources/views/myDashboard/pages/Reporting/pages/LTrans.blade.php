@extends('myDashboard.pages.Reporting.layMain')

@section('isi')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill p-3">
        <div class="card-header fs-3 my-3 d-flex justify-content-center align-items-center">
            <span>Laporan Transaksi</span>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table table-hover my-0">
                <thead class="">
                    <tr>
                        <th scope="col" style="min-width: 100px">Tanggal</th>
                        <th scope="col" style="min-width: 85px">Total Harga</th>
                        <th scope="col" style="min-width: 100px">Pencatat</th>
                        <th scope="col" class="text-center" style="min-width: 90px">Pesanan</th>
                    </tr>
                </thead>
                <tbody>            
                    @foreach ($transaksi as $t)
                    <tr>
                        <td>{{ $t->tgl_transaksi }}</td>
                        <td>Rp.{{ $t->total_harga }}</td>
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

@endsection