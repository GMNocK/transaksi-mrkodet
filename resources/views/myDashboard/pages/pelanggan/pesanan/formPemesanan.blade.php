@extends('myDashboard.App')

@section('content')

<div class="row justify-content-center">
    @foreach ($barangs as $b)        
        <div class="col-6 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/basrengpic.jpg') }}" alt="Unsplash">
                <div class="card-header">
                    <h5 class="card-title mb-0 fs-3 text-dark text-opacity-75">{{ $b->nama_barang }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $b->keterangan }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<br class="my-3">

<div class="card flex-fill mt-5">
    <div class="card-header">
        <div class="ms-2 col-md-4">
            <a href="/pelanggan/pesanan/create" class="link-secondary d-flex align-items-center">
                <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                <h6 class="card-title mb-0 link-secondary">Keranjang Barang</h6>
            </a>
        </div>
    </div>

    <div class="table-responsive col-12 mb-3">
        <table class="table table-hover my-0">
            <thead class="bg-secondary text-white shadow-sm">
                <tr>
                    <th scope="col">Barang</th>
                    <th scope="col" class="">Harga / Kg</th>
                    <th scope="col" class="">Ukuran</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col" class="">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Project Apollo</td>
                    <td class="">01/01/2021</td>
                    <td class="">31/06/2021</td>
                    <td><span class="badge bg-success">Done</span></td>
                    <td class="">Vanessa Tucker</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection