@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/transaksis/{{ $transaksis->token }}" method="post">
        @method('put')
        @csrf
        
        <div class="row my-5">
            <div class="col-11 d-flex justify-content-between">
                
                <div class="col-6">
                    <span class="fs-5  d-flex align-items-center fw-semibold ms-3">
                        <i class="fa fa-user-circle link-dark fs-3 me-2" aria-hidden="true"></i>
                        {{ $transaksis->pelanggan->nama }}
                    </span>
                </div>
                <div class="col-6 text-end">
                    <span class="fs-5 fw-semibold me-2">
                        {{ $transaksis->tgl_transaksi }}
                        <i class="fas fa-calendar-alt ms-2"></i>
                    </span>                    
                </div>
                    
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4">
                <span class="btn btn-outline-secondary fw-semibold">
                    <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                    Tambah Barang
                </span>
            </div>
        </div>
        <div class="table-responsive col-lg-11 mb-5">
            <table class="table table-striped table-sm" id="Keranjang">
                <thead class="bg-secondary text-light px-3">
                    <tr>
                        <th scope="col" class="text-center p-2 ps-3">No</th>
                        <th scope="col" class="text-center p-2">Nama Barang</th>
                        <th scope="col" class="text-center p-2">Harga Satuan</th>
                        <th scope="col" class="text-center p-2" style="min-width: 30px">Ukuran</th>
                        <th scope="col" class="text-center p-2">Quantity</th>
                        <th scope="col" class="text-center p-2">SubTotal</th>
                        <th scope="col" class="text-center p-2 pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailtransaksis as $det)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">
                                <input type="text" value="{{ $det->barang->nama_barang }}" readonly class="text-dark text-center border-0 bg-transparent" name="barang{{ $loop->iteration }}">
                            </td>
                            <td class="text-center">
                                <input type="text" value="{{ $det->harga_satuan }}" readonly class=" disabled text-dark text-center border-0 bg-transparent" name="hargaSatuan{{ $loop->iteration }}">
                            </td>
                            <td class="text-center">
                                <input type="text" value="{{ $det->ukuran }}" readonly class="text-dark text-center border-0 bg-transparent" name="ukuran{{ $loop->iteration }}">
                            </td>
                            <td class="text-center">
                                <input type="text" value="{{ $det->jumlah }}" readonly class="text-dark text-center border-0 bg-transparent" name="jml{{ $loop->iteration }}">
                            </td>
                            <td class="text-center">
                                <input type="text" value="Rp. {{ $det->subtotal }}" readonly class="text-dark text-center border-0 bg-transparent" name="subtotal{{ $loop->iteration }}">
                            </td>
                            <td class="text-center">
                                <a href="" class="link-dark">
                                    <i class="fas fa-edit link"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="row">
            <div class="col-11 d-flex justify-content-start">
                <div class="col-6">
                    <div class="row mt-4">
                        <div class="col-12 d-flex align-items-center justify-content-center ">
                            <label for="" class="fs-6 col-5 ">Total Harga</label>
                            <input type="text" readonly name="totalHarga" class="form-control " value="{{ $transaksis->total_harga }}">
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

    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'info',
            title: 'Please Read The Docs!',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endsection