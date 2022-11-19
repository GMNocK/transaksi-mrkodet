@extends('myDashboard.App')

@section('content')



<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-end d-flex">
            <div class="ms-2 col-md-4 justify-content-end d-flex">

                <a href="#" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-2 mb-1 link-secondary" data-feather="shopping-cart"></i>
                    <h6 class="card-title mb-0 link-secondary">Pesanan Anda</h6>
                </a>
            </div>
        </div>

        <div class="table-responsive col-12 mb-5">
            <table class="table table-hover my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col" class="">Waktu pesan</th>
                        <th scope="col" class="">Total Harga</th>
                        <th scope="col" class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pesanan->pelanggan->nama }}</td>
                        {{-- <td class="">{{ $waktuPesan[($loop->iteration - 1)]->waktu_pesan }}</td> --}}
                        <td class="">{{ $pesanan->waktu_pesan }}</td>
                        <td class="">Rp.{{ $pesanan->total_harga }}</td>
                        <td class="text-center">
                            <span class="badge {{ $pesanan->status == '123' ? 'bg-danger' : 'bg-success' }} ">
                                {{ $pesanan->status }}
                            </span>
                        </td>                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-start d-flex">
            <div class="ms-2 col-md-6 justify-content-start d-flex">
                <a href="#" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-2 mb-1 link-secondary" data-feather="shopping-cart"></i>
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
                        <th scope="col">Nama Barang</th>
                        <th scope="col" class="">Harga / Kg</th>
                        <th scope="col" class="text-center">Ukuran</th>
                        <th scope="col" class="text-center">Jumlah Pesan</th>
                        <th scope="col" class="text-center">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailPesanan as $i)
                        
                        <tr>
                            <td>{{ $i->barang->nama_barang }}</td>
                            {{-- <td class="">{{ $waktuPesan[($loop->iteration - 1)]->waktu_pesan }}</td> --}}
                            <td class="">Rp.{{ $i->hargaPerKg }}</td>
                            <td class="text-center">{{ $i->ukuran }}.Kg</td>
                            <td class="text-center">{{ $i->jumlahPesan }}</td>
                            <td class="text-center">
                                Rp.{{ $i->subtotal }}                                    
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
          <textarea readonly class="form-control" name="ketTam" id="KetTambah" rows="5" placeholder="Anda Dapat Melakukan Request tambahan Seperti Pedas Nya tambah atau asinnya kurangin">{{ $pesanan->keterangan }}</textarea>
        </div>

    </div>
</div>

@endsection