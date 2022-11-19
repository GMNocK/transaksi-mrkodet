@extends('myDashboard.App')

@section('content')

<nav class="breadcrumb mb-4 col-md-12 justify-content-between">
    <div>
        <a class="breadcrumb-item" href="#">myDashBoard</a>
        <a class="breadcrumb-item" href="#">Transaksi</a>
        <span class="breadcrumb-item active">Detail</span>
    </div>

    <div class="d-flex align-items-center breadcrumb-item active me-2">
        <i class="align-middle me-1" data-feather="calendar"></i>
        <span>{{ date('Y-m-d') }}</span>
    </div>
</nav>

@if ($transaksis->pesanan_id != '')
    
<nav class="breadcrumb mb-4 col-md-12 justify-content-between">
    <span class="fs-5  d-flex align-items-center fw-semibold ms-3">
        <i class="fa fa-user-circle link-dark fs-3 me-2" aria-hidden="true"></i>
        {{ $transaksis->pesanan->id }}
    </span>
    
    <div class="d-flex align-items-center breadcrumb-item active me-2">
        <i class="align-middle me-1" data-feather="calendar"></i>
        <span>{{ $transaksis->tgl_transaksi }}</span>
    </div>
</nav>
@endif

<form action="/transaksi/{{ $transaksis->token }}" method="post">
    @method('put')
    @csrf
    
    <div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
        <div class="card flex-fill px-2">
            <div class="card-header">
                <div class="col-4">
                    <span class="btn btn-outline-secondary fw-semibold" data-bs-toggle="modal" data-bs-target="#addBarangModal" >
                        <i class="fa fa-plus-circle me-3" aria-hidden="true"></i>
                        Tambah Barang
                    </span>
                </div>
            </div>

            <div class="table-responsive col-lg-12 mb-5">
                <table class="table table-striped table-sm" id="Keranjang">
                    <thead class="bg-secondary text-light px-1">
                        <tr>
                            <th scope="col" class="text-center p-2 ps-3">No</th>
                            <th scope="col" class="text-center p-2">Nama Barang</th>
                            <th scope="col" class="text-center p-2">Harga Satuan</th>
                            <th scope="col" class="text-center p-2">Ukuran</th>
                            <th scope="col" class="text-center p-2">Quantity</th>
                            <th scope="col" class="text-center p-2">SubTotal</th>
                            <th scope="col" class="text-center p-2 pe-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailtransaksis as $det)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <input type="text" value="{{ $det->barang->nama_barang }}" readonly 
                                            class="text-dark text-center border-0 bg-transparent nama-barang"  
                                            name="barang{{ $loop->iteration }}"
                                        >
                                </td>
                                <td class="text-center">
                                    <input type="text" value="Rp.{{ $det->harga_satuan }}" readonly 
                                            class="text-dark text-center border-0 bg-transparent harga-barang" 
                                            name="hargaSatuan{{ $loop->iteration }}"
                                            style="width: 160px"
                                        >
                                </td>
                                <td class="text-center">
                                    <input type="text" value="{{ $det->ukuran }}" readonly 
                                            class="text-dark text-center border-0 bg-transparent ukuran-barang" 
                                            name="ukuran{{ $loop->iteration }}"
                                            style="width: 100px"
                                        >
                                </td>
                                <td class="text-center">
                                    <input type="text" value="{{ $det->jumlah }}" readonly class="text-dark text-center border-0 bg-transparent jumlah-beli" name="jml{{ $loop->iteration }}">
                                </td>
                                <td class="text-center">
                                    <input type="text" value="Rp.{{ $det->subtotal }}" readonly class="text-dark text-center border-0 bg-transparent sub-total" name="subtotal{{ $loop->iteration }}">
                                </td>
                                <td class="text-center">
                                    <i class="fas fa-edit link d-inline"></i>
                                    <i class="fas fa-trash-alt link d-inline"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-11 d-flex justify-content-start">
            <div class="col-6">
                <div class="row mt-4">
                    <div class="col-12 d-flex align-items-center justify-content-center ">
                        <label for="" class="fs-6 col-5">Total Harga</label>
                        <input type="text" readonly name="totalHarga" class="form-control" id="totalHarga" value="{{ $transaksis->total_harga }}">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-12 d-flex align-items-center justify-content-center ">
                        <label for="" class="fs-6 col-5 ">Status Transaksi</label>
                        <select name="status" id="status" class="form-control">
                            <option value="lunas">Lunas</option>
                            <option value="cashbond">Cashbond</option>
                        </select>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-12 d-flex align-items-center justify-content-center ">
                        <label for="" class="fs-6 col-5 ">Tipe Pembayaran</label>
                        <select name="tipe_bayar" id="tipe_bayar" class="form-control">
                            <option value="ditempat">Ditempat</option>
                            <option value="transfer">Transfer</option>
                            <option value="null">Tidak Diketahui</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Ubah" class="btn btn-outline-primary my-3 w-100">           
                    </div>
                </div> 
            </div>
        </div>
    </div>       
</form>

<!-- Modal Add Barang Ke keranjang-->
<div class="modal fade" id="addBarangModal" tabindex="-1" aria-labelledby="addBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark bg-opacity-75 bg-gradient">
                <h1 class="modal-title fs-5 text-light" id="addBarangModalLabel">Modal title</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="NamBarModal" class="form-label mb-1 text-secondary">Nama Barang</label>
                    <select class="form-control text-secondary" id="NamBarModal" onchange="GetSubTotal();">
                        @foreach ($barangs as $b)                        
                        <option value="{{ $b->nama_barang }}" class="{{ $b->harga }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pilihanUkuran" class="form-label mb-1 text-secondary">Ukuran Barang</label>
                    <select class="form-control text-secondary" id="pilihanUkuran" onchange="GetSubTotal();">
                        <option value="1" class="">1 Kg</option>
                        <option value="1/2" class="">1/2 Kg</option>
                        <option value="1/4" class="">1/4 Kg</option>
                        <option value="3000" class="">Ukuran 3000</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="iniQty" class="form-label mb-1 text-secondary">Jumlah Barang</label>                           
                    <input type="number" class="form-control text-secondary" id="iniQty" value="1" onchange="GetSubTotal();">
                </div>         
                <div class="mb-3">
                    <label for="subTotal" class="form-label mb-1 text-secondary">Harga Total</label>
                    <input type="text" class="form-control text-secondary" id="subTotal" readonly  value="Rp.60000">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="btnAddToKeranjang" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div> 
        </div>
    </div>
</div>

{{-- Modal Edit Barang yang Di keranjang --}}
<div class="modal fade" id="editBarangDariKeranjang" tabindex="-1" aria-labelledby="addBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addBarangModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#">
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
                        <input type="number" class="form-control" id="iniQty" value="1" onchange="GetSubTotal();">
                    </div>         
                    <div class="mb-3">
                        <input type="text" class="form-control" id="subTotal" readonly value="60000">
                    </div>         
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<script src="{{ asset('js/editTrans.js') }}"></script>
@endsection