@extends('dashboard.layouts.main')

@section('container')
    <h2 class="mt-5">{{ $laporanpelanggan->title }}</h2>
    <h6 class="mb-4 ms-3">{{ $laporanpelanggan->send_at }}</h6>
    <p class="mb-5" style="font-size: 16px;">{{ $laporanpelanggan->body }}</p>
@endsection