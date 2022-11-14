@extends('myDashboard.App')

@section('content')
    



<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-start d-flex">
            <div class="ms-2 col-md-4 justify-content-start d-flex">

                <a href="#" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">
                        Detail Pesanan milik 
                        <span class="link-dark">
                            {{ $pesanan->pelanggan[0]->nama }}
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
                        <th scope="col" class=""></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailPesanan as $i)
                        
                        <tr>
                            <td>{{ $i->barang->nama_barang }}</td>
                            {{-- <td class="">{{ $waktuPesan[($loop->iteration - 1)]->waktu_pesan }}</td> --}}
                            <td class="">{{ $i->hargaPerKg }}</td>
                            <td class="text-center">{{ $i->ukuran }}.Kg</td>
                            <td class="text-center">{{ $i->jumlahPesan }}</td>
                            <td class="text-center">
                                {{ $i->subtotal }}                                    
                            </td>
                            <td style="text-align: center">
                                <a href="pesananPelanggan/{{ $pesanan->kode }}" class="btn btn-primary my-1">
                                    {{-- <a href="#" class="btn btn-primary my-1" onclick="DltConfirm();"> --}}
                                    {{-- <i class="fa-solid fa-eye"></i> --}}
                                    <i class="align-middle" data-feather="eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-end d-flex">
            <div class="ms-2 col-md-4 justify-content-end d-flex">

                <a href="#" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">Pesan Barang</h6>
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
                        <th scope="col">Status</th>
                        <th scope="col" class=""></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pesanan->pelanggan[0]->nama }}</td>
                        {{-- <td class="">{{ $waktuPesan[($loop->iteration - 1)]->waktu_pesan }}</td> --}}
                        <td class="">{{ $pesanan->waktu_pesan }}</td>
                        <td class="">Rp.{{ $pesanan->total_harga }}</td>
                        <td><span class="badge {{ $pesanan->status == '123' ? 'bg-danger' : 'bg-success' }} ">{{ $pesanan->status }}</span></td>
                        <td style="text-align: center">
                            <a href="pesananPelanggan/{{ $pesanan->kode }}" class="btn btn-primary my-1">
                            {{-- <a href="#" class="btn btn-primary my-1" onclick="DltConfirm();"> --}}
                                {{-- <i class="fa-solid fa-eye"></i> --}}
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection