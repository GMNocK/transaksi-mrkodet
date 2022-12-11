@extends('myDashboard.App')

@section('content')
    
<nav class="breadcrumb mb-4 col-md-12 justify-content-between">
    <div>
        <a class="breadcrumb-item" href="/myDashboard">myDashBoard</a>
        <span class="breadcrumb-item active">Rekap</span>
        <span class="breadcrumb-item active">LaporanPelanggan</span>
    </div>

    <div class="d-flex align-items-center breadcrumb-item active me-2">
        <i class="align-middle me-1" data-feather="calendar"></i>
        <span>{{ date('Y-m-d') }}</span>
    </div>
</nav>


<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="col-md-12 mt-1">

                @can('karyawan')
                    @if ($lpelanggan == '')
                        
                        <a href="#" class="text-center link-secondary">
                            <i class="align-middle me-1 mb-1" data-feather="book"></i>
                            Tidak Ada Laporan Dari Pelanggan
                        </a>
                    @else
                        <div class="row mb-4">
                            <div class="col-12 d-flex">
                                <a href="/export/lpelanggan/excel?data=lpelanggan" class="btn btn-light btn-lg " style="box-shadow: 3px 3px 7px -3px rgba(44, 43, 43,.3)">
                                    <i class="fas fa-file-excel me-1"></i>
                                    EXCEL
                                </a>
                                <a href="/export/lpelanggan/pdf?data=lpelanggan" class="btn btn-light btn-lg mx-2" style="box-shadow: 3px 3px 7px -3px rgba(44, 43, 43,.3)">
                                    <i class="fas fa-file-pdf me-1"></i>
                                    PDF
                                </a>
                                <form action="/Rekap/Transaksi" method="post">
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
                        </div>
                    @endif
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
                    @foreach ($lpelanggan as $t)
                    <tr>
                        <td>{{ $t->pelanggan->nama }}</td>
                        <td>Rp.{{ $t->total_harga }}</td>
                        <td>{{ $t->pencatat }}</td>
                        <td class="text-center">
                            <span class="badge {{ $t->pesanan == '0' ? 'bg-danger' : 'bg-success' }} p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                {{ $t->pesanan == '0' ? 'Offline' : 'Online' }}
                            </span>
                        </td>
                        <td style="text-align: center">
                            <a href="laporanPelanggan/{{ $t->token }}" class="btn btn-primary my-1">
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

    </div>
</div>

@endsection