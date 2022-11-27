@extends('myDashboard.App')

@section('content')

<div class="col-3 mb-4">
    <a href="/pesananPelanggan" class="btn btn-primary fs-4 rounded-2">
        <i class="fa fa-sign-out me-1" aria-hidden="true"></i>
        Kembali
    </a>
</div>

<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-end d-flex">
            <div class="ms-2 col-md-4 justify-content-end d-flex">
                <a href="#" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-2 link-secondary" data-feather="shopping-bag"></i>
                    <h6 class="card-title mb-0 link-secondary">Data Pesanan</h6>
                </a>
            </div>
        </div>

        <div class="table-responsive col-12 mb-5">
            <table class="table table-hover my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Waktu pesan</th>
                        <th scope="col" class="text-center">Total Harga</th>
                        <th scope="col" class="text-center">Pembayaran</th>
                        <th scope="col" class="text-center">Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pesanan->pelanggan->nama }}</td>
                        {{-- <td class="">{{ $waktuPesan[($loop->iteration - 1)]->waktu_pesan }}</td> --}}
                        <td>{{ $pesanan->waktu_pesan }}</td>
                        <td class="text-center">{{ $pesanan->total_harga }}</td>
                        <td class="text-center">
                            {{ $pesanan->tipePembayaran }}
                        </td>
                        <td class="text-center">
                            {{ $pesanan->tipe_kirim }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-start d-flex">
            <div class="ms-2 col-md-4 justify-content-start d-flex">

                <a href="#" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="shopping-bag"></i>
                    <h6 class="card-title mb-0 link-secondary">
                        Detail Pesanan milik 
                        <span class="link-dark">
                            {{ $pesanan->pelanggan->nama }}
                        </span>
                    </h6>
                </a>
            </div>
        </div>

        <div class="table-responsive col-12 mb-5">
            <table class="table table-hover my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Nama barang</th>
                        <th scope="col" class="text-center">Harga / Kg</th>
                        <th scope="col" class="text-center">Ukuran</th>
                        <th scope="col" class="text-center">Jumlah Beli</th>
                        <th scope="col" class="text-center">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $i)
                        
                    <tr>
                        <td>{{ $detail[($loop->iteration - 1)]->barang->nama_barang }}</td>
                        {{-- <td class="">{{ $waktuPesan[($loop->iteration - 1)]->waktu_pesan }}</td> --}}
                        <td class="text-center">{{ $detail[($loop->iteration - 1)]->hargaPerKg }}</td>
                        <td class="text-center">{{ $detail[($loop->iteration - 1)]->ukuran }}</td>
                        <td class="text-center">
                            {{ $detail[($loop->iteration - 1)]->jumlahPesan }}
                        </td>
                        <td style="text-align: center">
                            Rp.{{ $detail[($loop->iteration - 1)]->subtotal }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-6 d-flex">
    <div class="card flex-fill p-3">
        
        <div class="form-group">
          <label for="KetTambah">Keterangan Tambahan</label>
          <textarea class="form-control" name="ketTam" id="KetTambah" rows="5" placeholder="Tidak Ada Request">{{ $pesanan->keterangan }}</textarea>
        </div>

    </div>
</div>

@if ($pesanan->status == '1' || $pesanan->status == '2' || $pesanan->status == '3')
    
    @if ($pesanan->status == '3')
        <form action="/pesanan/progress/{{ $pesanan->kode }}" method="post">
    @else
        <form action="/pesanan/accept/{{ $pesanan->kode }}" method="post">
    @endif
        @csrf
        <div class="col-md-6 d-flex">
            <div class="card flex-fill p-3">
                <div class="form-group mb-0">
                    @if ($pesanan->status != '3')                        
                        <label for="Balasan">Berikan Balasan</label>
                        <textarea class="form-control" name="Reply" id="Balasan" rows="6" placeholder="Tambahkan Balasan Disini"></textarea>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if ($pesanan->status == '3')                            
                            <input type="submit" id="Proses" data-="{{ $pesanan->kode }}" value="Proses Pesanan" class="btn btn-primary btn-lg my-3 w-100">           
                        @else                            
                            <input type="submit" id="Terima" data-="{{ $pesanan->kode }}" value="Terima Pesanan" class="btn btn-primary btn-lg my-3 w-100">           
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>

@endif

@if ($pesanan->status == '4' || $pesanan->status == '5')
<div class="row">
    <div class="d-flex">
        @if ($pesanan->status == '4')
            
        <form action="/pesanan/dikirim/{{ $pesanan->kode }}" class="col-6" method="post">
            @csrf
            <div class="col-md-12 d-flex">
                <div class="card flex-fill p-3">
                    <div class="form-group mb-0">
                        <label for="">Tandai Jika Barang Dalam Proses Pengiriman</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" id="Kirim" data-="{{ $pesanan->kode }}" value="Tandai Sebagai Dikirim" class="btn btn-info btn-lg my-3 w-100">           
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
        <form action="/pesanan/selesai/{{ $pesanan->kode }}" class="col-6" method="post">
        @csrf
            <div class="col-md-12 d-flex">
                <div class="card flex-fill p-3">
                    <div class="form-group mb-0">
                        <label for="">Tandai Jika Pesanan Sudah Selesai</label>
                        <input type="hidden" name="finish" value="6">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" data-="{{ $pesanan->kode }}" value="Tandai Sebagai Selesai" class="btn btn-primary btn-lg my-3 w-100">           
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endif

@endsection