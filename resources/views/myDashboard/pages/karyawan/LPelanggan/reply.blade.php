@extends('myDashboard.App')

@section('content')
    <div class="container bg-white shadow-lg rounded">
        <div class="row justify-content-center">
            <div class="col-10 my-3 bg-light" style="border-radius: 10px; padding: 15px 25px">
                <div class="header mb-3">
                    {{-- <img src="" alt=".." width="35px" height="35px"> --}}
                    <i class="fa fa-user-circle fs-5" aria-hidden="true"></i>
                    <span>{{ $laporanpelanggan->pelanggan->nama }}</span>
                    <div class="float-end me-2">{{ $laporanpelanggan->send_at }}</div>
                    <div class="mt-3 mb-2">
                        <h4>{{ $laporanpelanggan->title }}</h4>
                    </div>
                </div>
                <div class="fs-5">
                    {{ $laporanpelanggan->body }}
                </div>
                <div class="float-end me-3">
                    <p>i</p>
                </div>
            </div>

        </div>

        <div class="row justify-content-end me-4">
            <form action="/laporanPelanggan/reply" method="POST">
            @csrf
                <div class="col-7 my-3 float-end" style="border-radius: 10px; padding: 15px 25px">
                    <div class="fs-7">
                        <textarea class="form-control " placeholder="Leave a comment here" style="height: 200px" name="body"></textarea>
                        <input type="hidden" name="lp" value="{{ $laporanpelanggan->id }}">                      
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-outline-success float-end">Balas</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
@endsection