@extends('dashboard.layouts.main')

@section('container')

    <form action="/dashboard/transaksis/" method="post">
        @csrf
        <div class="col-12 my-4 d-flex justify-content-between align-items-center mb-5">
            <div class="linked">
                <a class="fs-3 {{ Request::is('dashboard*') ? 'disabled link-dark text-decoration-none' : '' }}" style="font-weight: 400">{{ Request::is('dashboard*') ? 'Dashboard / ' : '' }}</a>
                <a class="fs-3 {{ Request::is('dashboard/transaksis*') ? 'disabled link-dark text-decoration-none' : '' }}" style="font-weight: 400">{{ Request::is('dashboard/transaksis*') ? 'Transaksi / ' : 'as' }}</a>
                <a href="" class="fs-3 " style="font-weight: 400">{{ Request::is('dashboard/transaksis/create') ? 'Create' : '' }}</a>
            </div>
            <div class="apa d-flex justify-content-center">
                <div class="tgl fs-5" style="font-weight: 500">
                    {{ date('Y-m-d') }}
                </div>
                <div class="icon mx-3">
                    <span data-feather="calendar" class="w-100 h-100"></span>
                </div>
            </div>
        </div>  

        <div class="row">
            <div class="col-4 mb-3">
                <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}" hidden>
                <label for="NamaPelanggan">Nama Pelanggan</label>
                <select class="form-control" name="pelanggan_id" id="NamaPelanggan">
                    @foreach ($pelanggans as $p)                        
                    <option value="{{ $p->id }}" class="{{ $p->nama }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4 mb-3">

                <label for="">Add Item</label>
                <select class="form-control" id="BarangSelect">
                    @foreach ($barangs as $b)                        
                    <option value="{{ $b->nama_barang }}" class="{{ $b->harga }}">{{ $b->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3 mb-4">
            <myButton id="btn" class="btn btn-outline-success">Tekan</myButton>
        </div>

        <div class="row mb-4" id="FormAddQty">
            <div class="col-3">
                <input type="text" class="form-control" value="Ini Form Test" onchange="">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="Ini Form Test">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="Ini Form Test">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" value="Ini Form Test">
            </div>
        </div>
        
        <div class="col-12">
            <MyButton class="btn btn-outline-success mb-5" id="AdToKeranjang">Tambah keranjang</MyButton>
        </div>

        <br class="mb-4">

        <div class="table-responsive col-lg-11">
            <table class="table table-striped table-sm" id="Keranjang">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama Barang</th>
                        <th scope="col" class="text-center">Harga Satuan</th>
                        <th scope="col" class="text-center" style="max-width: 30px">Ukuran</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">SubTotal</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- INI ISI TABEL KERANJANG --}}
                    {{-- <tr>
                        <td class="text-center bg-danger">1</td>
                        <td class="text-center">
                            <input type="text" value="Basreng Pedas" disabled class="text-dark text-center border-0 bg-transparent">
                        </td>
                        <td class="text-center">
                            <input type="text" value="Rp.60.000" disabled class=" disabled text-dark text-center border-0 bg-transparent">
                        </td>
                        <td class="text-center bg-warning">
                            <input type="text" value="1 Kg." disabled class="text-dark text-center border-0 bg-transparent">
                        </td>
                        <td class="text-center">
                            <input type="text" value="10" disabled class="text-dark text-center border-0 bg-transparent">
                        </td>
                        <td class="text-center">
                            <input type="text" value="Rp.600.000" disabled class="text-dark text-center border-0 bg-transparent">
                        </td>
                        <td class="text-center">
                            <img src="{{ asset('img/trash-2.svg') }}">
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>

         <div class="row mt-4">
            <div class="col-6 d-flex align-items-center justify-content-center ">
                <label for="" class="fs-6 col-5 ">Total Bayar</label>
                <input type="text" readonly name="TotalBayar" class="form-control " value="0">
            </div>
         </div>
         <div class="row my-2">
            <div class="col-6 d-flex align-items-center justify-content-center ">
                <label for="" class="fs-6 col-5 ">Status Transaksi</label>
                {{-- <input type="text" name="" class="form-control " value="0"> --}}
                <select name="status" id="status" class="form-control">
                    <option value="lunas">Lunas</option>
                    <option value="cashbond">Cashbond</option>
                </select>
            </div>
         </div>
         <div class="row my-2">
            <div class="col-6 d-flex align-items-center justify-content-center ">
                <label for="" class="fs-6 col-5 ">Tipe Pembayaran</label>
                <select name="tipe_bayar" id="tipe_bayar" class="form-control">
                    <option value="ditempat">Ditempat</option>
                    <option value="transfer">Transfer</option>
                    <option value="">Tidak Diketahui</option>
                </select>
            </div>
         </div>
        
         <div class="row">
            <div class="col-6">
                <input type="submit" value="Tambah" class="btn btn-outline-primary my-3 w-100">           
            </div>
         </div>
    </form>   
    
    <script src="{{ asset('js/createtrans.js') }}"></script>
@endsection