@extends('myDashboard.App')

@section('content')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-between d-flex align-content-center">
            <div class="ol-md-4 ms-3 mt-2 d-flex justify-content-end align-items-center">
                <h5 class="link-secondary card-title">
                    <i class="fa fa-book me-2" aria-hidden="true"></i>
                    Data Laporan Pelanggan
                </h5>
            </div>
            <div class="col-md-4 mt-1 d-flex justify-content-end align-items-center">

                @can('karyawan')
                    <a href="/Rekap/RLaporanPelanggan" class="text-center btn btn-outline-secondary">
                        {{-- <i class="align-middle me-1" data-feather="plus-circle"></i> --}}
                        <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                        Buat Rekap
                    </a>
                @endcan
            </div>
        </div>
        
        <div class="row justify-content-center">
            @foreach ($laporanpelanggans as $i)
                
                <div class="col-11 my-3 bg-light" style="border-radius: 10px; padding: 15px 25px">
                    <div class="header">
                        <i class="fa fa-user-circle fs-4 me-2" aria-hidden="true"></i>
                        <span class="fs-4">{{ $i->pelanggan->nama }}</span>
                        <div class="float-end">{{ $i->send_at }}</div>
                        <div class="mt-3 mb-2">
                            <h5>{{ $i->title }}</h5>
                        </div>
                    </div>
                    <div class="fs-7">
                        {{ $i->body }}
                    </div>
                    <div class="footer">
                        @can('karyawan')
                        <form action="/laporanPelanggan/reply/{{ $i->id }}/create" method="POST">
                            @csrf
                            <button class="text-primary fs-6 float-end me-3 mt-2 link-info border-0" style="background: none;">Reply</button>
                        </form>
                        @endcan
                        @can('mustBeAdmin')
                        <form action="/laporanPelanggan/{{ $i->id }}" method="POST">
                            @csrf
                            <button class="text-primary fs-4 float-end me-3 mt-2 link-info border-0" style="background: none;">Lihat</button>
                        </form>                            
                        @endcan
                    </div>
                </div>
        
            @endforeach
        </div>
        <div class="d-flex justify-content-end col-12 mb-5">
            <span class="me-4">
                {{ $laporanpelanggans->links() }}            
            </span>
        </div>
    </div>
</div>

@if (session('balasBerhasil'))
    <script>
        Swal.fire({
        icon: 'success',
        title: '{{ session("balasBerhasil") }}',
        showConfirmButton: false,
        timer: 1500
    })
    </script>
@endif

@endsection
