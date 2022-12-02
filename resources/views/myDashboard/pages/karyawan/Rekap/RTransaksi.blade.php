@extends('myDashboard.App')

@section('content')
    
<nav class="breadcrumb mb-4 col-md-12 justify-content-between bg-transparent">
    <div>
        <a class="breadcrumb-item" href="#">myDashBoard</a>
        <span class="breadcrumb-item active">Transaksi</span>
    </div>

    <div class="d-flex align-items-center breadcrumb-item active me-2">
        <i class="align-middle me-1" data-feather="calendar"></i>
        <span>{{ date('Y-m-d') }}</span>
    </div>
</nav>


<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="col-md-12 mt-1 d-flex justify-content-between">

                @can('karyawan')

                    <form action="/Rekap/RTransaksi" class="d-flex">
                        <div class="form-group">
                            <label for="filterRekap">Rekap Transaksi Berdasarkan</label>
                            <select class="custom-select" name="filterTgl" id="filterRekap">
                                <option value="today" {{ $filter == 'today' ? 'selected' : '' }} >Hari Ini</option>
                                <option value="tmonth" {{ $filter == 'tmonth' ? 'selected' : '' }}>Bulan Ini</option>
                                <option value="tyear" {{ $filter == 'tyear' ? 'selected' : '' }}>Tahun Ini</option>
                                <option value="yester" {{ $filter == 'yester' ? 'selected' : '' }}>Kemarin</option>
                                <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Semua</option>
                            </select>
                        </div>
                        <div class="form-group d-flex align-items-end ms-4">
                            <button class="btn btn-success btn-lg">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                Refresh
                            </button>
                        </div>
                    </form>
                    <form action="/Rekap/Transaksi" method="post">
                        @csrf
                        <input type="hidden" id="forRekap" name="typeRekap" value="{{ old('filterTgl', 'today') }}">
                        <div class="form-group d-flex align-items-end ms-4">
                            <button class="btn btn-primary btn-lg">
                                <i class="fa fa-print me-2" aria-hidden="true"></i>
                                Cetak
                            </button>
                        </div>

                    </form>
                    
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
                        <th scope="col" class="text-center" style="min-width: 90px">status</th>
                        <th scope="col" class="text-center" style="min-width:80px;"></th>
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
                        <td class="text-center">
                            @if ($t->status == '' || $t->status == false)
                                <span class="badge bg-danger p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                    Belum Bayar
                                </span>
                            @endif
                            @if ($t->status == true)
                                <span class="badge bg-success p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                    Lunas
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

<script src="{{ asset('js/CostumJs/filterRekapTrans.js') }}"></script>

@endsection