@extends('myDashboard.App')

@section('content')
    
<nav class="breadcrumb mb-4 col-md-12 justify-content-between">
    <div>
        <a class="breadcrumb-item" href="/myDashboard">myDashBoard</a>
        <a class="breadcrumb-item" href="/pesananPelanggan">Pesanan</a>
        <span class="breadcrumb-item active">Rekap</span>
    </div>

    <div class="d-flex align-items-center breadcrumb-item active me-2">
        <i class="align-middle me-1" data-feather="calendar"></i>
        <span>{{ date('Y-m-d') }}</span>
    </div>
</nav>


<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="col-md-12 mt-1">

                @can('karyawan')

                <div class="row mb-5">
                    <div class="col-12 d-flex align-items-center">

                        <a href="/export/pesanan/excel?data=pesanan" class="btn btn-light btn-lg " style="box-shadow: 3px 3px 7px -3px rgba(44, 43, 43,.3)">
                            <i class="fas fa-file-excel me-1"></i>
                            EXCEL
                        </a>
                        <a href="/pesanan/export/pdf?data=pesanan" class="btn btn-light btn-lg mx-2" style="box-shadow: 3px 3px 7px -3px rgba(44, 43, 43,.3)">
                            <i class="fas fa-file-pdf me-1"></i>
                            PDF
                        </a>

                        <form action="/Rekap/Pesanan" method="post">
                            @csrf
                            <input type="hidden" id="forRekap" name="typeRekap" value="{{ old('filterTgl', 'today') }}">                            
                            <button class="btn btn-light btn-lg" style="box-shadow: 3px 3px 7px -3px rgba(44, 43, 43,.3)">
                                <i class="fa fa-print me-1" aria-hidden="true"></i>
                                CETAK
                            </button>
    
                        </form>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="/Rekap/RPesanan" class="d-flex">
                            <div class="form-group">
                                <label for="filterRekap">Filter Berdasarkan</label>
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
                    </div>
                </div>
                    
                @endcan
            </div>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table table-hover table-striped my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pemesan</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">M.Pengiriman</th>
                        <th scope="col">M.Bayar</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pesanan == '')
                    <tr>
                        <td colspan="6" class="text-center">                                
                            @if ($filter == 'today')
                            
                                Tidak Ada pesanan hari ini    
                            
                            @endif
                            
                            @if ($filter == 'yester')
                            
                                Tidak Ada Pesanan Di hari Kemarin

                            @endif

                            @if ($filter == 'tmonth')
                            
                                Tidak Ada Pesanan Di Bulan Ini

                            @endif

                            @if ($filter == 'tyear')
                            
                                Tidak Ada Pesanan Di Tahun Ini

                            @endif

                            @if ($filter == 'all')
                            
                                Tidak Ada Pesanan

                            @endif
                        </td>
                    </tr>
                    @else

                        @foreach ($pesanan as $t)
                        <tr>
                            <td>{{ $t->waktu_pesan }}</td>
                            <td>{{ $t->pelanggan->nama }}</td>
                            <td>Rp.{{ $t->total_harga }}</td>
                            <td>{{ $t->tipe_kirim }}</td>
                            <td>{{ $t->tipePembayaran }}</td>
                            <td style="text-align: center">
                
                                <a href="transaksi/{{ $t->token }}" class="btn btn-primary my-1">
                                    <i class="align-middle" data-feather="eye"></i>
                                </a>
                                
                            </td>
                        </tr>    
                        @endforeach

                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('js/CostumJs/filterRPesan.js') }}"></script>


@endsection