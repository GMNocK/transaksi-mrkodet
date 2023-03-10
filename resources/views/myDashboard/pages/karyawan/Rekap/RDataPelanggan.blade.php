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
                <div class="row mb-4">
                    <div class="col-12 d-flex justify-content-start ps-1 mb-3">
                        <a href="#" id="btnExcel" data-="{{ $pelanggan }}" class="btn btn-light btn-lg" style="box-shadow: 3px 3px 7px -3px rgba(44, 43, 43,.3)">
                            <i class="fas fa-file-pdf me-1"></i>
                            EXCEL
                        </a>
                        <a href="#" class="btn btn-light btn-lg mx-2" id="btnPdf" style="box-shadow: 3px 3px 7px -3px rgba(44, 43, 43,.3)">
                            <i class="fas fa-file-pdf me-1"></i>
                            PDF
                        </a>
                        <form action="/Rekap/Pelanggan" method="post" id="formCetak">
                            @csrf
                            <input type="hidden" id="forRekap" name="typeRekap" value="{{ old('filterTgl', 'today') }}">                                
                            <button type="button" class="btn btn-light btn-lg" id="btnCetak" style="box-shadow: 3px 3px 7px -3px rgba(44, 43, 43,.3)">
                                <i class="fa fa-print me-1" aria-hidden="true"></i>
                                CETAK
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="/Rekap/RPelanggan" class="d-flex">
                            <div class="form-group">
                                <label for="filterRekap">Filter Berdasarkan</label>
                                <select class="custom-select" name="filterTgl" id="filterRekap">
                                    <option value="today" {{ $filter == 'Hari ini' ? 'selected' : '' }} >Hari Ini</option>
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
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>

                    @if ($pelanggan == '[]')
                        <tr>
                            <td colspan="5" class="text-center">Tidak Ada Pelanggan Baru {{ $filter }}</td>
                        </tr>
                    @else
                        @foreach ($pelanggan as $t)
                        <tr>
                            <td>{{ $t->nama }}</td>
                            <td>{{ $t->alamat }}</td>
                            <td>{{ $t->no_tlp }}</td>
                            <td>{{ $t->user->email }}</td>
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

<script src="{{ asset('js/CostumJs/FilterRekap/DataPelanggan.js') }}"></script>
<script src="{{ asset('js/CostumJs/FilterRekap/ValidasiLaporan.js') }}"></script>
@endsection