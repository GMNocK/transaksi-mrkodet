@extends('myDashboard.App')

@section('content')

<div class="col-3 mb-4">
    <a href="/pesananSaya" class="btn btn-primary fs-4 rounded-2">
        <i class="fa fa-sign-out me-1" aria-hidden="true"></i>
        Kembali
    </a>
</div>

<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
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
                        <th scope="col" class="">Pengiriman</th>
                        <th scope="col" class="">Pembayaran</th>
                        <th scope="col" class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pesanan->pelanggan->nama }}</td>
                        {{-- <td class="">{{ $waktuPesan[($loop->iteration - 1)]->waktu_pesan }}</td> --}}
                        <td class="">{{ $pesanan->waktu_pesan }}</td>
                        <td class="">Rp.{{ $pesanan->total_harga }}</td>
                        <td class="">{{ $pesanan->tipe_kirim }}</td>
                        <td class="">{{ $pesanan->tipePembayaran }}</td>
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
          <textarea readonly class="form-control" name="ketTam" id="KetTambah" rows="3" placeholder="Tidak Ada">{{ $pesanan->keterangan }}</textarea>
        </div>
        {{-- Upload Bukti --}}
        @if ($pesanan->tipePembayaran != 'COD' && ($pesanan->bukti == 2 || $pesanan->bukti == 3))
            <form action="/pesanan/bukti/upload/{{ $pesanan->kode }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="buktiBayar">Upload Bukti Pembayaran</label>
                    <img class="img-preview img-fluid">
                    <input type="file" class="form-control" name="buktiBayar" id="image" onchange="imgPreview()">
                </div>
                <button type="submit" class="btn btn-primary">Kirim Bukti Bayar</button>
            </form>
        @endif
    </div>
</div>

{{-- Sudah Sampai --}}
@if ($pesanan->status == 8)
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-header">
                <a href="#" id="btnTandaiSampai" data-kode="{{ $pesanan->kode }}" class="btn btn-primary btn-block">
                    Tandai Pesanan Sudah Sampai
                </a>
            </div>
        </div>
    </div>
@endif

{{-- Bukti --}}
@if ($pesanan->bukti != 0 && $pesanan->bukti != 4 && ($pesanan->tipePembayaran != 'COD'))
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5 mb-3 text-center">
            <p class="fs-2 text-dark fw-bold">Bukti Pembayaran</p>
            @if ($pesanan->bukti_bayar_pesanan == '[]')
                <h4>Tidak Ada Foto Pembayaran</h4>
            @endif
        </div>
        @foreach ($pesanan->bukti_bayar_pesanan as $b)
        <div class="col-md-10">
            <div class="card flex-fill">
                <img class="card-img-top" src="{{ asset('storage/' . $b->bukti_bayar) }}" alt="">
                <div class="card-body mt-3">
                    <h4 class="card-title text-dark">{{ $b->created_at }}</h4>
                    <p class="card-text">{{ $b->bukti_bayar }}</p>
                    @if ($pesanan->bukti == 3)
                        <a href="/pesanan/bukti/delete/{{ $pesanan->kode }}/?gambar={{ $b->bukti_bayar }}" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <button class="btn btn-danger">
                                <i class="fas fa-trash-alt me-1"></i>
                                Hapus Gambar
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

<script>
    function imgPreview() {
        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imagePreview.src = oFREvent.target.result;
            imagePreview.classList.add('mb-3');
        }
    }

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

@endsection