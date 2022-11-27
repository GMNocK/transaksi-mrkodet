@extends('myDashboard.App')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-7 p-0">
            <img class="card-img-top" src="/{{ $barang->foto }}" alt="" height="10px">
            <div class="card-body">
                <h4 class="card-title text-dark fs-4">{{ $barang->nama_barang }}</h4>
                <p class="card-text">{{ $barang->keterangan }}</p>
                <p>Harga / Kg : Rp.{{ $barang->harga }}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-7 p-0">
            <a href="/produk" class="btn btn-primary">
                <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
                Kembali
            </a>
        </div>
    </div>

@endsection