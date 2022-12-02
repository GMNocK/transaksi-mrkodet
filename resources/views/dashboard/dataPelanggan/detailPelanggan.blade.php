@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-10 my-3 bg-light" style="border-radius: 10px; padding: 15px 25px">
            <div class="header">
                <img src="" alt=".." width="35px" height="35px">
                <span class="fs-3" style="font-weight: 600">Nama {{ $pelanggan->nama }}</span>
                <div class="float-end">{{ $pelanggan->alamat }}</div>
                <div class="mt-3 mb-2">
                    <h5>{{ $pelanggan->no_tlp }}</h5>
                </div>
            </div>
            <div class="fs-7">
                {{ $pelanggan->user_id }}
            </div>
            <div class="footer">
            </div>
        </div>

    </div>
</div>
@endsection