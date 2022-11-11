@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Hello {{ auth()->user()->username }}</h1>
</div>
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4 ">
        <div class="card shadow border-primary border-end-0 border-top-0 border-bottom-0 border-start-3 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col ms-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaksi }} transaksi</div>
                    </div>
                    <div class="col-auto w-25 me-2">
                        <span data-feather="dollar-sign" class="w-100 h-100 text-secondary"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col ms-2 ">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Customer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $customer }} pelanggan</div>
                    </div>
                    <div class="col-auto w-25 me-2">
                        <span data-feather="users" class="w-100 h-100 text-secondary"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col ms-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Karyawan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $karyawan }} Karyawan</div>
                    </div>
                    <div class="col-auto w-25 me-2">  
                        <span data-feather="activity" class="h-100 w-100 text-secondary"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
        	<div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col ms-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin }} Admin</div>
                    </div>
                    <div class="col-auto me-2 w-25">
                        <span data-feather="user" class="h-100 w-100 text-secondary"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @cannot('pelanggan')
        
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col ms-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Laporan Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lp }} Laporan</div>
                        </div>
                        <div class="col-auto me-2 h-100">
                            <span data-feather="activity" class="h-100 w-100 text-secondary"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endcannot
    
    @can('karyawan')
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-start-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col ms-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Laporan Saya</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ls }} Laporan</div>
                    </div>
                    <div class="col-auto me-2 h-100">
                        <span data-feather="activity" class="h-100 w-100 text-secondary"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

</div>

@cannot('pelanggan')
    <div>
        <canvas id="myChart"></canvas>
    </div>    
@endcannot

<script src="{{ asset('js/DashboardChart.js') }}"></script>

<script src="{{ asset('js/mySweetAlert.js') }}"></script>

  
  

@endsection