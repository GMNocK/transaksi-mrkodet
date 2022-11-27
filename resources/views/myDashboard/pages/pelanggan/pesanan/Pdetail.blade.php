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
                            @if ($pesanan->status == '1')

                                <span class="badge bg-secondary fs-6">
                                    Belum dibaca
                                </span>

                            @else

                                @if ($pesanan->status == '2')

                                    <span class="badge bg-info fs-6">
                                        Di Baca
                                    </span>     

                                @endif

                                @if ($pesanan->status == '3')

                                    <span class="badge bg-success fs-6">
                                        Di Terima
                                    </span>                                        
                                    
                                @endif

                                @if ($pesanan->status == '4')

                                    <span class="badge bg-warning fs-6">
                                        Pesanan Di Proses
                                    </span>                                        
                                    
                                @endif

                                @if ($pesanan->status == '5')

                                    <span class="badge bg-warning fs-6">
                                        Dikirim Ke tempat Tujuan
                                    </span>                                        
                                    
                                @endif
                                
                                @if ($pesanan->status == '6')

                                    <span class="badge bg-primary fs-6">
                                        Selesai
                                    </span>                                        
                                    
                                @endif

                                @if ($pesanan->status == '0')

                                    <span class="badge bg-danger fs-6">
                                        Batal
                                    </span>                                        
                                    
                                @endif
                                
                            @endif
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
                            <td class="text-center">{{ $i->ukuran }} {{ $i->ukuran == '3000' ? 'Rupiah' : '.Kg' }}</td>
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

<div class="col-md-12 d-flex">
    <div class="card flex-fill p-3">
        
        <div class="form-group">
          <label for="KetTambah">Keterangan Tambahan</label>
          <textarea readonly class="form-control" name="ketTam" id="KetTambah" rows="5" placeholder="Tidak Ada">{{ $pesanan->keterangan }}</textarea>
        </div>

        @if ($pesanan->status != 0)
        <form action="/pesanan/bukti/upload/{{ $pesanan->kode }}" method="post" enctype="multipart/form-data">
            @csrf
            .<div class="form-group">
                <label for="buktiBayar">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" name="buktiBayar" id="">
            </div>
            <button type="submit" class="btn btn-primary">Kirim Bukti Bayar</button>
        </form>
        @endif
    </div>
</div>

@if ($pesanan->bukti == true)
    @foreach ($pesanan->bukti_bayar_pesanan as $b)
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5 mb-3 text-center">
                <p class="fs-2 text-dark fw-bold">Bukti Pembayaran</p>
            </div>
        
            <div class="col-md-10">
                <div class="card flex-fill">
                    <img class="card-img-top" src="{{ asset('storage/' . $b->bukti_bayar) }}" alt="">
                    <div class="card-body mt-3">
                        <h4 class="card-title text-dark">{{ $b->created_at }}</h4>
                        <p class="card-text">{{ $b->bukti_bayar }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection