@extends('myDashboard.App')

@section('content')

<div class="row justify-content-center" id="barang">
    @foreach ($barangs as $b)
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <img class="card-img-top fotoProduk" src="{{ asset($b->foto) }}" alt="Unsplash">
                <div class="card-header">
                    <h5 class="card-title mb-0 fs-3 text-dark text-opacity-75">{{ $b->nama_barang }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $b->keterangan }}</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addBarangModal" class="btn btn-primary btnAddToKeranjang d-flex align-items-center justify-content-center">
                        <i class="fas fa-shopping-bag me-2 fs-4"></i>
                        Tambah Ke Keranjang
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-end col-11 mt-2">
        {{ $barangs->links() }}
    </div>
</div>

<br class="my-1">

<form action="/pesanan" method="post">
@csrf
    <div class="card flex-fill mt-4 p-1">
        <div class="card-header">
            <div class="ms-2 col-md-4">
                <a href="#topContent" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">Barang Barang</h6>
                </a>
            </div>
        </div>

        <div class="table-responsive col-12 mb-3">
            <table class="table table-hover my-0 table-borderless table-striped" id="Keranjang">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col" class="text-center" style="width: 180px">Barang</th>
                        <th scope="col" class="text-center">Harga / Kg</th>
                        <th scope="col" class="text-center">Ukuran</th>
                        <th scope="col" class="text-center">Jumlah</th>
                        <th scope="col" class="text-center">Sub Total</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>Project Apollo</td>
                        <td class="">01/01/2021</td>
                        <td class="">31/06/2021</td>
                        <td><span class="badge bg-success">Done</span></td>
                        <td class="">Vanessa Tucker</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>

    <div class="row" id="infoOngkir">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Pengiriman kerumah!</strong> Anda Akan Dikenakan Tarif Ongkir Sebanyak Rp.3,000
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 d-flex">
            <div class="card flex-fill p-2">
                <div class="row mt-4">
                    <div class="col-md-12 d-flex align-items-center justify-content-center ">
                        <label for="" class="fs-6 col-5 ">Total Bayar</label>
                        <input type="text" readonly name="TotalBayar" class="form-control" id="TotalBayar" value="Rp.0">
                    </div>
                </div>
                
                <div class="row my-2">
                    <div class="col-md-12 d-flex align-items-center justify-content-center ">
                        <label for="" class="fs-6 col-5 ">Pengambilan Barang</label>
                        <select name="tipePengiriman" id="pengiriman" class="form-control">
                            <option value="Kirim Ke Rumah">Kirim ke Rumah</option>
                            @if ($alamat == 1)                                
                            <option value="Ambil Di Toko">Ambil Di Toko</option>
                            @endif
                        </select>
                    </div>
                </div>
                
                <div class="row my-2">
                    <div class="col-md-12 d-flex align-items-center justify-content-center ">
                        <label for="" class="fs-6 col-5 ">Tipe Pembayaran</label>
                        <select name="tipe_bayar" id="tipe_bayar" class="form-control">
                            <option value="Transfer">Transfer</option>
                            @if ($alamat == 1)                                
                            <option value="COD">COD / Bayar Ditempat</option>
                            @endif
                        </select>
                    </div>
                </div>
                
                <input type="hidden" name="PanjangtblKeranjang" id="banyakBarang">
                
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Tambah" class="btn btn-outline-primary my-3 w-100">           
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 d-flex">
            <div class="card flex-fill p-3">
                
                <div class="form-group">
                  <label for="KetTambah">Keterangan Tambahan</label>
                  <textarea class="form-control" name="ketTam" id="KetTambah" rows="5" placeholder="Anda Dapat Melakukan Request tambahan Seperti Pedas Nya tambah atau asinnya kurangin"></textarea>
                </div>

            </div>
        </div>

    </div>
</form>


<div class="modal fade" id="addBarangModal" aria-labelledby="addBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog col-md-5 col-lg-6 col-10 modal-dialog-centered">
        <div class="modal-content rounded-3 rounded-bottom">
            <div class="modal-header bg-dark bg-opacity-75 rounded-2 rounded-bottom">
                <h1 class="modal-title fs-4 fw-semibold text-white" id="addBarangModalLabel">Tambah Barang</h1>
                <button type="button" class="btn-close btn-close-white" aria-label="Close" data-bs-dismiss="modal"></button>
                {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
            <form>
                @csrf
                <div class="mb-3">
                    <label for="NamBarModal" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="NamBarModal" readonly>                
                </div>
                <div class="mb-3">
                    <label for="NamBarModal" class="form-label">Ukuran Barang</label>
                    <select class="form-control" id="pilihanUkuran" onchange="GetSubTotal();">
                        <option value="1" class="">1 Kg</option>
                        <option value="1/2" class="">1/2 Kg</option>
                        <option value="1/4" class="">1/4 Kg</option>
                        <option value="3000" class="">Ukuran 3000</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="NamBarModal" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" id="iniQty" value="1">
                </div>         
                <div class="mb-3">
                    <label for="NamBarModal" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" id="subTotal" value="60000">
                </div>         
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="AdToKeranjang" data-bs-dismiss="modal">Tambah Ke Keranjang</button>
        </div>
      </div>
    </div>
</div>


@can('pelanggan')
    <script src="{{ asset('js/formPelangganPesan.js') }}"></script>
@endcan

@if (session('IsNull'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Pemesanan tidak bisa dilakukan',
            showConfirmButton: false,
            timer: 1400
        });

        setTimeout(() => {
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Silahkan isi identitas lengkap di profile',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location = '/profile';
            } else if (result.isDenied) {
                Swal.fire('Pemesanan Bisa dilakukan dengan identitas jelas')
            }
            });
        }, 2000);
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            position: 'top',
            icon: 'error',
            title: 'keranjang Kosong',
            showConfirmButton: false,
            timer: 1400
        });
    </script>
@endif

@if ($alamat == 1)
    <script src="{{ asset('js/CostumJs/ongkirCek/pesanOngkir.js') }}"></script>
@endif

@if ($alamat != 1)
    <script>
        const infoOngkir = document.querySelector('#infoOngkir');
        let isiAlert = infoOngkir;
    </script>
@endif

@endsection