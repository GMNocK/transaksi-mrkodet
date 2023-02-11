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
                        <th scope="col" class="text-center">Status</th>
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
                        <td class="text-center">
                            @if ($pesanan->status == '3')
                                <span class="badge bg-secondary">
                                    Belum dibaca
                                </span>
                            @else
                                @if ($pesanan->status == '4')
                                    <span class="badge bg-info">
                                        Di Baca
                                    </span>
                                @endif
                                @if ($pesanan->status == '5')
                                    <span class="badge bg-success">
                                        Di Terima
                                    </span>
                                @endif
                                @if ($pesanan->status == '6')
                                    <span class="badge bg-warning">
                                        Pesanan Di Proses
                                    </span>
                                @endif
                                @if ($pesanan->status == '7')
                                    <span class="badge bg-warning">
                                        Siap Di Ambil
                                    </span>
                                @endif
                                @if ($pesanan->status == '8')
                                    <span class="badge bg-primary bg-opacity-75">
                                        Dikirim Ke tempat Tujuan
                                    </span>
                                @endif
                                @if ($pesanan->status == '9')
                                    <span class="badge bg-primary bg-opacity-75">
                                        Sampai Di Tempat Tujuan
                                    </span>
                                @endif
                                @if ($pesanan->status == '2')
                                    <span class="badge bg-primary">
                                        Selesai
                                    </span>
                                @endif
                                @if ($pesanan->status == '1')
                                    <span class="badge bg-danger">
                                        Batal
                                    </span>
                                @endif
                            @endif
                            @if ($pesanan->bukti == false || $pesanan->bukti == 0)
                                <span class="badge bg-danger">Belum Bayar</span>
                            @else
                                @if ($pesanan->bukti == 3)
                                    <span class="badge bg-primary">Menunggu Verifikasi</span>
                                @endif

                                @if ($pesanan->bukti == 2)
                                    <span class="badge bg-warning">Menunggu Pembayaran</span>
                                @endif

                                @if ($pesanan->bukti == 1)
                                    <span class="badge bg-success">Sudah Bayar</span>                                            
                                @endif

                                @if ($pesanan->bukti == 4)
                                    <span class="badge bg-info">COD</span>                                                                                    
                                @endif
                            @endif
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
                        Detail Pesanan
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
            <textarea class="form-control" name="ketTam" id="KetTambah" readonly rows="4" placeholder="Tidak Ada Request">{{ $pesanan->keterangan }}</textarea>
        </div>

    </div>
</div>

@can('karyawan')
    @if ($pesanan->status == '4' || $pesanan->status == '4' && (($pesanan->bukti == 1 && $pesanan->tipePembayaran == 'transfer') || $pesanan->tipePembayaran == 'COD'))
        
    {{-- <form action="/pesanan/accept/{{ $pesanan->kode }}" method="post">
    @csrf --}}
        <div class="col-md-6 d-flex">
            <div class="card flex-fill p-3">
                <div class="form-group mb-0">
                    <label for="Balasan">Berikan Balasan</label>
                    <textarea class="form-control" name="Reply" id="Balasan" rows="6" placeholder="Tambahkan Balasan Disini"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" id="Terima" data-kode="{{ $pesanan->kode }}" value="Terima Pesanan" class="btn btn-primary btn-lg my-3 w-100">
                    </div>
                </div>
            </div>
        </div>
    {{-- </form> --}}
    @endif

    {{-- Barang Di Proses  --}}
    @if ($pesanan->status == '5' && (($pesanan->tipePembayaran != 'COD' && $pesanan->bukti == 1) || $pesanan->tipePembayaran == 'COD'))    
        <div class="col-md-6 d-flex">
            <div class="card flex-fill p-3">
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" id="proses" data-kode="{{ $pesanan->kode }}" value="Proses Pesanan" class="btn btn-primary btn-lg my-3 w-100">
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Barang Di Kirim --}}
    @if ($pesanan->status == '6' || $pesanan->status == 7 || $pesanan->status == 9)
    <div class="row">
        <div class="d-flex">
            @if ($pesanan->status == '6' && ($pesanan->tipe_kirim == 'Kirim Ke Rumah' || $pesanan->tipe_kirim == 'kirim ke rumah'))
                {{-- <form action="/pesanan/dikirim/{{ $pesanan->kode }}" class="col-6" method="post">
                    @csrf --}}
                    <div class="col-md-12 d-flex">
                        <div class="card flex-fill p-3">
                            <div class="form-group mb-0">
                                <label for="">Tandai Barang Dalam Proses Pengiriman / Pemaketan</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" id="Kirim" data-kode="{{ $pesanan->kode }}" value="Tandai Sebagai Dikirim" class="btn btn-info my-3 w-100">           
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            @endif
            @if ($pesanan->status == 7 || ($pesanan->tipe_kirim == 'ambil di toko' || $pesanan->tipe_kirim == 'Ambil Di Toko') || $pesanan->status == 9)
                <form action="/pesanan/selesai/{{ $pesanan->kode }}" class="col-6" method="post">
                @csrf
                    <div class="col-md-12 d-flex">
                        <div class="card flex-fill p-3">
                            <div class="form-group mb-0">
                                <label for="">Tandai Pesanan Sudah Selesai</label>
                                <input type="hidden" name="finish" value="6">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" data-="{{ $pesanan->kode }}" value="Tandai Sebagai Selesai" class="btn btn-primary my-3 w-100">           
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
    @endif

    {{-- Migrasi Transaksi --}}
    @if ($pesanan->status == 2)
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
                                    <form action="/transaksi/{{ $transaksi->token }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $pesanan->id }}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            Lihat Transaksi
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
                {{-- <form action="/pesanan/{{ $pesanan->kode }}/transaksi" class="col-6" method="post">
                @csrf --}}
                    <div class="col-md-12 d-flex">
                        <div class="card flex-fill p-3">
                            <div class="form-group mb-0">
                                <label for="">Integrasi Ke transaksi</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" id="migrasi" data-="{{ $pesanan->kode }}" value="Integrasi Ke transaksi" class="btn btn-primary btn-lg my-3 w-100">           
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
        @endif
    @endif

    {{-- SAMPAI --}}
    @if ($pesanan->status == 8)
    <div class="row">
        <div class="d-flex">
            {{-- <form action="/pesanan/{{ $pesanan->kode }}/transaksi" class="col-6" method="post">
            @csrf --}}
                <div class="col-md-12 d-flex">
                    <div class="card flex-fill p-3">
                        <div class="form-group mb-0">
                            <label for="">Tandai Sudah Sampai Ditujuan</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" id="btnTandaiSampai" data-kode="{{ $pesanan->kode }}" value="Tandai Sudah Sampai Ditujuan" class="btn btn-primary btn-lg my-3 w-100">           
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>
    @endif

    @if (($pesanan->bukti == 1 || $pesanan->bukti == 3) && $pesanan->tipePembayaran != 'COD')
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5 mb-3 text-center">
                <p class="fs-2 text-dark fw-bold">Bukti Pembayaran</p>
            </div>
        </div>
        @foreach ($pesanan->bukti_bayar_pesanan as $b)
            <div class="row justify-content-center">
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
        @if ($pesanan->bukti == 3)
        <div class="row justify-content-center">
            <div class="col-10 p-0 mt-3">
                <div class="col-md-12">
                    <a href="#" id="verify-bukti" data-kode="{{ $pesanan->kode }}" class="btn btn-primary fs-4 fw-semibold btn-block">Verivikasi Pembayaran</a>
                </div>
            </div>
        </div>
        @endif
    @endif

    {{-- POP UP MENU --}}


    {{-- PROSES --}}
    @if ($pesanan->status == '5' && (($pesanan->tipePembayaran != 'COD' && $pesanan->bukti == 1) || $pesanan->tipePembayaran == 'COD'))
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
    @endif

    {{-- SAMPAI --}}
    @if ($pesanan->status == 8)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnTandaiSampai = document.querySelector('#btnTandaiSampai');

            const kode = btnTandaiSampai.getAttribute('data-kode');

            btnTandaiSampai.addEventListener('click', () => {
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Tandai Sampai?',
                text: 'Tandai Pesanan Sampai Di Tempat Tujuan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tandai!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/pesanan/sampai/"+kode+""
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Batal Di Tandai',
                        'Status akan sebagai dikirim',
                        'info'
                        )
                    }
                })
            });  
        });  
    </script>
    @endif

    {{-- DIKIRIM --}}
    @if ($pesanan->status == '6' && ($pesanan->tipe_kirim == 'Kirim Ke Rumah' || $pesanan->tipe_kirim == 'kirim ke rumah'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnkirim = document.querySelector('#Kirim');

            const kode = btnkirim.getAttribute('data-kode');

            btnkirim.addEventListener('click', () => {
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Tandai Sampai?',
                text: 'Tandai Pesanan Sampai Di Tempat Tujuan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tandai!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/pesanan/sampai/"+kode+""
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Batal Di Tandai',
                        'Status akan sebagai dikirim',
                        'info'
                        )
                    }
                })
            });  
        });  
    </script>
    @endif

    {{-- TERIMA --}}
    @if ($pesanan->status == '4' || $pesanan->status == '4' && (($pesanan->bukti == 1 && $pesanan->tipePembayaran == 'transfer') || $pesanan->tipePembayaran == 'COD'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnTerima = document.querySelector('#Terima');

            const kode = btnTerima.getAttribute('data-kode');

            btnTerima.addEventListener('click', () => {
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Terima Pesanan?',
                text: 'Pesanan Akan Diterima',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Terima!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        const balasan = document.querySelector('#Balasan').value;
                        if (balasan != '') {
                            window.location = "/pesanan/accept/"+kode+"/?reply="+balasan+""
                        } else {
                            window.location = "/pesanan/accept/"+kode+""
                        }
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Batal Di Terima',
                        'Status akan sebagai Diterima',
                        'info'
                        )
                    }
                })
            });  
        });
    </script>
    @endif

    {{-- Verify BUKTI --}}
    @if ($pesanan->bukti == 3 && $pesanan->tipePembayaran != 'COD')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnVerify = document.querySelector('#verify-bukti');

            const kode = btnVerify.getAttribute('data-kode');

            btnVerify.addEventListener('click', () => {
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Terima Pesanan?',
                text: 'Pesanan Akan Diterima',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Terima!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/pesanan/bukti/verify/"+kode+""
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Batal Di Terima',
                        'Status akan sebagai Diterima',
                        'info'
                        )
                    }
                })
            });  
        });
    </script>
    @endif

    {{-- MIGRASI TRANSAKSI --}}
    @if (($pesanan->bukti == 1 && $pesanan->tipePembayaran != 'COD') && $pesanan->status == 2)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnMigrasi = document.querySelector('#migrasi');

            const kode = btnMigrasi.getAttribute('data-kode');

            btnMigrasi.addEventListener('click', () => {
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success mx-2',
                        cancelButton: 'btn btn-danger mx-2'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Terima Pesanan?',
                text: 'Pesanan Akan Diterima',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Terima!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/pesanan/"+kode+"/transaksi"
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Batal Di Terima',
                        'Status akan sebagai Diterima',
                        'info'
                        )
                    }
                })
            });  
        });
    </script>
    @endif
@endcan

@endsection