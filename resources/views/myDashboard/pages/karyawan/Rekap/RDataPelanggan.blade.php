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
            <div class="col-md-12 mt-1 d-flex justify-content-between">

                @can('karyawan')

                    <form action="/Rekap/RPelanggan" class="d-flex">
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
                    <form action="/Rekap/Pelanggan" method="post">
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
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>

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
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end col-12 mb-5">
            <span class="me-4">
                {{ $pelanggan->links() }}            
            </span>
        </div>

    </div>
</div>

{{-- <script src="{{ asset('js/CostumJs/filterRPesan.js') }}"></script> --}}


@endsection