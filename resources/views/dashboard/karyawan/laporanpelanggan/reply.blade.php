@extends('dashboard.layouts.main')

@section('container')
    <div class="container bg-danger">
        <div class="row justify-content-center">
            <div class="col-10 my-3 bg-light" style="border-radius: 10px; padding: 15px 25px">
                <div class="header">
                    <img src="" alt=".." width="35px" height="35px">
                    <span>{{ $laporanpelanggan->pelanggan->nama }}</span>
                    <div class="float-end me-2">{{ $laporanpelanggan->send_at }}</div>
                    <div class="mt-3 mb-2">
                        <h5>{{ $laporanpelanggan->title }}</h5>
                    </div>
                </div>
                <div class="fs-7">
                    {{ $laporanpelanggan->body }}
                </div>
                <div class="float-end me-3">
                    <p>i</p>
                </div>
            </div>

        </div>

        <div class="row justify-content-end me-4">
            <form action="/karyawan/laporanuser/reply" method="post">
            @csrf
                <div class="col-7 my-3 bg-light float-end" style="border-radius: 10px; padding: 15px 25px">
                    <div class="fs-7">
                        <textarea class="form-control " placeholder="Leave a comment here" style="height: 200px" name="Fk"></textarea>                        
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-outline-success float-end">Send</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
@endsection