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

<div class="col-md-12 d-flex">
    <div class="card flex-fill p-3">
        
        <div class="form-group">
            <label for="KetTambah">Keterangan Tambahan</label>
            <textarea class="form-control" name="ketTam" id="KetTambah" readonly rows="5" placeholder="Tidak Ada Request">{{ $pesanan->keterangan }}</textarea>
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
                            @if ($pesanan->bukti == false)                            
                                {{-- <input type="button" id="proses" data-kode="{{ $pesanan->kode }}" value="Proses Pesanan" class="btn btn-danger btn-lg my-3 w-100"> --}}
                            @else
                                <input type="submit" id="proses" data-kode="{{ $pesanan->kode }}" value="Proses Pesanan" class="btn btn-primary btn-lg my-3 w-100">
                            @endif
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
            @if ($pesanan->bukti == true)
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
            @else
                
            @endif
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

@if ($pesanan->status == 6)
    @if ($trans_cek != 0)
        <div class="row justify-content-center mt-4">
            <div class="col-10">
                <div class="card shadow-lg">
                    <div class="card-body p-2">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <h4 class="m-1 card-title text-center text-dark fs-3">Pesanan Selesai</h4>
                            </div>
                            <div class="col-3">
                                <form action="/pesananPelanggan/{{ $pesanan->kode }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $pesanan->id }}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        Lihat
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else        
    <div class="row">
        <div class="d-flex">
            <form action="/pesanan/{{ $pesanan->kode }}/transaksi" class="col-6" method="post">
            @csrf
                <div class="col-md-12 d-flex">
                    <div class="card flex-fill p-3">
                        <div class="form-group mb-0">
                            <label for="">Integrasi Ke transaksi</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" data-="{{ $pesanan->kode }}" value="Integrasi Ke transaksi" class="btn btn-primary btn-lg my-3 w-100">           
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
@endif

@if ($pesanan->bukti == true || $trans_cek == 1)
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

{{-- POP UP MENU --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnProses = document.querySelector('#proses');

        const kode = btnProses.getAttribute('data-kode');

        btnProses.addEventListener('click', () => {
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            })
    
            swalWithBootstrapButtons.fire({
            title: 'Proses Pesanan?',
            text: "Pesanan Akan Di Proses!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Proses!',
            cancelButtonText: 'Tidak, Batalkan!',
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/pesanan/progress/"+kode+""
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Batal Di Proses',
                    'Status akan tetap Diterima',
                    'info'
                    )
                }
            })
        });  
    });
</script>

@endsection