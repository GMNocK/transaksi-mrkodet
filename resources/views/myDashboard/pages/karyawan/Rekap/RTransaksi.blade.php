@extends('myDashboard.App')

@section('content')
    
<nav class="breadcrumb mb-4 col-md-12 justify-content-between">
    <div>
        <a class="breadcrumb-item" href="#">myDashBoard</a>
        <span class="breadcrumb-item active">Transaksi</span>
    </div>

    <div class="d-flex align-items-center breadcrumb-item active me-2">
        <i class="align-middle me-1" data-feather="calendar"></i>
        <span>{{ date('Y-m-d') }}</span>
    </div>
</nav>


<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="col-md-5 mt-1">

                @can('karyawan')
                {{-- <h2>
                    <a href="transaksi/create" class="text-center btn btn-outline-secondary">
                        <i class="align-middle me-1 mb-1" data-feather="plus-circle"></i>
                        <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                        Buat Transaksi Baru
                    </a>
                </h2> --}}

                <div class="form-group">
                    <label for="filterRekap">Rekap Transaksi Berdasarkan tanggal</label>
                    <select class="custom-select" name="" id="filterRekap">
                        <option value="today" selected>Hari Ini</option>
                        <option value="tmonth">Bulan Ini</option>
                        <option value="tyear">Tahun Ini</option>
                        <option value="yester">Kemarin</option>
                    </select>
                </div>

                @endcan
            </div>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table table-hover table-striped my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col" style="min-width: 100px">Tanggal</th>
                        <th scope="col" style="min-width: 85px">Total Harga</th>
                        <th scope="col" style="min-width: 100px">Pencatat</th>
                        <th scope="col" class="text-center" style="min-width: 90px">Pesanan</th>
                        <th scope="col" class="text-center" style="min-width:80px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>Project Apollo</td>
                        <td class="">01/01/2021</td>
                        <td>
                            <span class="badge bg-success">Done</span>
                        </td>
                        <td class="">Vanessa Tucker</td>
                        <td class="text-center">
                            <a href="/transaksi/create" class="btn btn-primary my-1">
                                <i class="align-middle" data-feather="eye"></i>
                            </a>

                            <a href="/transaksi/create" class="btn btn-primary">
                                <i class="align-middle" data-feather="eye"></i>
                            </a>

                            <a href="/transaksi/create" class="btn btn-primary my-1">
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                        </td>
                    </tr> --}}

                    @foreach ($transaksi as $t)
                    <tr>
                        <td>{{ $t->tgl_transaksi }}</td>
                        <td>Rp.{{ $t->total_harga }}</td>
                        <td>{{ $t->pencatat }}</td>
                        <td class="text-center">
                            @if ($t->pesanan_id == '')                            
                                <span class="badge bg-danger p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                    Offline
                                </span>
                            @else
                                <span class="badge bg-success p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                    {{-- <i class="fa fa-check" aria-hidden="true"></i> --}}
                                    Online
                                </span>                                
                            @endif                            
                        </td>
                        <td style="text-align: center">
                            <a href="/transaksi/{{ $t->token }}" class="btn btn-primary my-1">
                            {{-- <a href="#" class="btn btn-primary my-1" onclick="DltConfirm();"> --}}
                                {{-- <i class="fa-solid fa-eye"></i> --}}
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end col-12 mb-5">
            <span class="me-4">
                {{ $transaksi->links() }}            
            </span>
        </div>

    </div>
</div>

@endsection