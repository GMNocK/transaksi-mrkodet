@extends('myDashboard.App')

@section('content')

<div class="row justify-content-center" id="barang">
    @foreach ($barangs as $b)
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <img class="card-img-top fotoProduk" src="{{ asset($b->foto) }}" alt="Unsplash">
                <div class="card-header">
                    <h5 class="card-title mb-0 fs-3 text-dark text-opacity-75">{{ $b->nama_barang }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $b->keterangan }}</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addBarangModal" class="btn btn-primary btnAddToKeranjang d-flex align-items-center justify-content-center">
                        <i class="fas fa-shopping-bag me-2 fs-4"></i>
                        Tambah Ke Keranjang
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-end col-11 mt-2">
        {{ $barangs->links() }}
    </div>
</div>

<br class="my-1">

<div class="card flex-fill mt-4 p-1">
    <div class="card-header">
        <div class="ms-2 col-md-4">
            <a href="#topContent" class="link-secondary d-flex align-items-center">
                <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                <h6 class="card-title mb-0 link-secondary">Barang Barang</h6>
            </a>
        </div>
    </div>

    <div class="table-responsive col-12 mb-3">
        <table class="table table-hover my-0" id="Keranjang">
            <thead class="bg-secondary text-white shadow-sm">
                <tr>
                    <th scope="col">Barang</th>
                    <th scope="col" class="">Harga / Kg</th>
                    <th scope="col" class="text-center">Ukuran</th>
                    <th scope="col" class="text-center">Jumlah</th>
                    <th scope="col" class="">Sub Total</th>
                    <th scope="col" class="">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td>Project Apollo</td>
                    <td class="">01/01/2021</td>
                    <td class="">31/06/2021</td>
                    <td><span class="badge bg-success">Done</span></td>
                    <td class="">Vanessa Tucker</td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-6 d-flex">
    <div class="card flex-fill p-2">
        <div class="row mt-4">
            <div class="col-md-12 d-flex align-items-center justify-content-center ">
                <label for="" class="fs-6 col-5 ">Total Bayar</label>
                <input type="text" readonly name="TotalBayar" class="form-control " value="0">
            </div>
        </div>
    
        <div class="row my-2">
            <div class="col-md-12 d-flex align-items-center justify-content-center ">
                <label for="" class="fs-6 col-5 ">Status Transaksi</label>
                {{-- <input type="text" name="" class="form-control " value="0"> --}}
                <select name="status" id="status" class="form-control">
                    <option value="lunas">Lunas</option>
                    <option value="cashbond">Cashbond</option>
                </select>
            </div>
        </div>
    
        <div class="row my-2">
            <div class="col-md-12 d-flex align-items-center justify-content-center ">
                <label for="" class="fs-6 col-5 ">Tipe Pembayaran</label>
                <select name="tipe_bayar" id="tipe_bayar" class="form-control">
                    <option value="cod">COD / Bayar Ditempat</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>
        </div>
    
        <input type="hidden" name="PanjangtblKeranjang" id="banyakBarang">
    
        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Tambah" class="btn btn-outline-primary my-3 w-100">           
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addBarangModal" aria-labelledby="addBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog col-md-5 col-lg-6 col-10 modal-dialog-centered bg-danger">
      <div class="modal-content rounded-3 rounded-bottom">
        <div class="modal-header bg-dark bg-opacity-75 rounded-2 rounded-bottom">
            <h1 class="modal-title fs-4 fw-semibold text-white" id="addBarangModalLabel">Tambah Barang</h1>
            <button type="button" class="btn-close btn-close-white" aria-label="Close" data-bs-dismiss="modal"></button>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
            <form>
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="NamBarModal" readonly>                
                </div>
                <div class="mb-3">
                    <select class="form-control" id="pilihanUkuran" onchange="GetSubTotal();">
                        <option value="1" class="">1 Kg</option>
                        <option value="1/2" class="">1/2 Kg</option>
                        <option value="1/4" class="">1/4 Kg</option>
                        <option value="3000" class="">Ukuran 3000</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="iniQty" value="1">
                </div>         
                <div class="mb-3">
                    <input type="text" class="form-control" id="subTotal" value="60000">
                </div>         
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="AdToKeranjang" data-bs-dismiss="modal">Tambah Ke Keranjang</button>
        </div>
      </div>
    </div>
</div>


@can('pelanggan')
    <script src="{{ asset('js/formPelangganPesan.js') }}"></script>
@endcan


@endsection