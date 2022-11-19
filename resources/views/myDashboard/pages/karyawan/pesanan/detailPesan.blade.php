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

@if ($pesanan->status == '1' || $pesanan->status == '2')
    
    <form action="/pesanan/accept/{{ $pesanan->kode }}" method="post">
        @csrf
        <div class="col-md-6 d-flex">
            <div class="card flex-fill p-3">
                <div class="form-group mb-0">
                    <label for="Balasan">Berikan Balasan</label>
                    <textarea class="form-control" name="Reply" id="Balasan" rows="6" placeholder="Tambahkan Balasan Disini"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" id="Terima" data-="{{ $pesanan->kode }}" value="Terima Pesanan" class="btn btn-outline-primary my-3 w-100">           
                    </div>
                </div>
            </div>
        </div>
    </form>

@endif

{{-- <script>
    const btnTerima = document.querySelector('#Terima');
    // const ajax = new XMLHttpRequest()
    

    btnTerima.addEventListener('click', () => {
        const kode = btnTerima.getAttribute('data-');

        // ajax.open('GET', '/pesananPelanggan', true)
        // ajax.onreadystatechange = function() {
        //     if (this.readyState ===  4 && this.status === 200) {
        //         let data = JSON.parse(ajax.responseText)
        //     }
        // }
        // ajax.send()
    });
</script> --}}

@endsection