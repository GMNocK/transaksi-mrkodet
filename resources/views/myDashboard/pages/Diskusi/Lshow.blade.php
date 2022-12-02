@extends('myDashboard.App')

@section('content')
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="ms-2 col-md-4 justify-content-start d-flex">

                <a href="/Laporan/create" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-2 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">Buat Laporan</h6>
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-11 my-3 bg-light" style="border-radius: 10px; padding: 15px 25px">
                <div class="header">
                    <i class="fa fa-user-circle fs-4 me-2" aria-hidden="true"></i>
                    <span class="fs-4">{{ $laporanPelanggan->pelanggan->nama }}</span>
                    <div class="float-end">{{ $laporanPelanggan->send_at }}</div>
                    <div class="mt-3 mb-2">
                        <h5>{{ $laporanPelanggan->title }}</h5>
                    </div>
                </div>
                <div class="fs-7">
                    {{ $laporanPelanggan->body }}
                </div>
                <div class="footer">
                    <form action="/laporanPelanggan/reply/{{ $laporanPelanggan->id }}/create" method="POST">
                        @csrf
                        <button class="text-primary fs-6 float-end me-3 mt-2 link-info border-0" style="background: none;">Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection