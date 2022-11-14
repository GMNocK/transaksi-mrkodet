@extends('myDashboard.App')

@section('content')
    
<form action="/transaksi/" method="post">
    @csrf
    <div class="breadcrumb mb-4 col-md-12 justify-content-between">
        <div>        
            <a class="breadcrumb-item" href="/myDashboard">myDashboard</a>
            <a class="breadcrumb-item" href="/transaksi">Transaksi</a>
            <a class="breadcrumb-item active" aria-current="page">Create</a>
        </div>
        <div class="text-end breadcrumb-item">
            <span class="fs-6 fw-semibold me-2">
                <i class="align-middle me-1" data-feather="calendar"></i>
                {{ date('Y-m-d') }}
            </span>                    
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-4">
            <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}" hidden>
            <label for="NamaPelanggan" class="ms-1 mb-1">Nama Pelanggan</label>
            <select class="form-control" name="pelanggan_id" id="NamaPelanggan">
                @foreach ($pelanggans as $p)                        
                <option value="{{ $p->id }}" class="{{ $p->nama }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 col-sm-4 d-flex align-items-end">
            <a  class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Data Pelanggan
            </a>
        </div>
    </div> --}}
    
    <div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="ms-2 col-md-4">
    
                    @can('karyawan')
                        
                    {{-- <a href="/transaksi/create" class="link-secondary d-flex align-items-center">
                        <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                        <h6 class="card-title mb-0 link-secondary">Tambah Transaksi</h6>
                    </a> --}}
                    <h2>
                        <span class="btn btn-outline-secondary fw-semibold" data-bs-toggle="modal" data-bs-target="#addBarangModal" id="btnAddBarangToKeranjangModal">
                            <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                            Tambah Barang
                        </span>
                    </h2>
                    @endcan
                </div>
            </div>

            <div class="table-responsive col-lg-12 mb-5">
                <table class="table table-striped table-sm table-hover" id="Keranjang">
                    <thead class="bg-secondary text-light px-3">
                        <tr>
                            <th scope="col" class="text-center p-2 ps-3 border-0">No</th>
                            <th scope="col" class="text-center p-2 border-0">Nama Barang</th>
                            <th scope="col" class="text-center p-2 border-0">Harga Per Kg</th>
                            <th scope="col" class="text-center p-2 border-0">Ukuran</th>
                            <th scope="col" class="text-center p-2 border-0">Quantity</th>
                            <th scope="col" class="text-center p-2 border-0">SubTotal</th>
                            <th scope="col" class="text-center p-2 pe-3 border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- INI ISI TABEL KERANJANG --}}
                        {{-- <tr>
                            <td class="text-center">
                                1
                            </td>
                            <td class="text-center">
                                <input type="text" value="Basreng Pedas" readonly 
                                    class="text-dark text-center border-0 bg-transparent"
                                >
                            </td>
                            <td class="text-center">
                                <input type="text" value="Rp.60.000" readonly class="text-dark text-center border-0 bg-transparent">
                            </td>
                            <td class="text-center">
                                <input type="text" value="1 Kg." readonly 
                                    class="text-dark text-center border-0 bg-transparent w-100"
                                >
                            </td>
                            <td class="text-center">
                                <input type="text" value="10" readonly class="text-dark text-center border-0 bg-transparent">
                            </td>
                            <td class="text-center">
                                <input type="text" value="Rp.600.000" readonly class="text-dark text-center border-0 bg-transparent">
                            </td>
                            <td class="text-center">
                                <i class="fas fa-trash-alt"></i>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
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
</form>   

{{-- <div class="modal fade" id="exampleModal" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="/added/DataPelanggan">
    @csrf
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pelanggan Baru</h1>
                <button type="button" class="btn-close btn-close-white" aria-label="Close" data-bs-dismiss="modal"></button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama Pelanggan :</label>
                        <input type="text" class="form-control" name="namaPelanggan" id="pelangganNama">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Keterangan :</label>
                        <textarea class="form-control" name="Ket" id="keteranganText"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
                </div>
            </div>
        </div>
    </form>
</div> --}}

<div class="modal fade" id="addBarangModal" data-bs-backdrop="static" aria-labelledby="addBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark bg-opacity-75 bg-gradient">
            <h1 class="modal-title fs-4 fw-semibold text-white" id="addBarangModalLabel">Tambah Barang</h1>
            <button type="button" class="btn-close btn-close-white" aria-label="Close" data-bs-dismiss="modal"></button>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
            <form>
                @csrf
                <div class="mb-3">
                    <select class="form-control" id="NamBarList" onchange="GetSubTotal();">
                        @foreach ($barangs as $b)                        
                        <option value="{{ $b->nama_barang }}" class="{{ $b->harga }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
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

<script src="{{ asset('js/createtrans.js') }}"></script>

@endsection