@extends('myDashboard.App')

@section('content')

<div class="row justify-content-center">
    <div class="col-8">

        <div class="row">
        
            <div class="col-xxl-12">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between px-5">
                        <div class="d">
                            Hai, {{ auth()->user()->username }}
                        </div>
                        <div class="b">
                            Profile
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <form action="/Profile/update/{{ $data[0]->id }}" method="post">
            @csrf
            
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="p-3 fs-3 fw-semibold">
                                <img src="{{ asset('img/avatars/index.png') }}" alt="" class="rounded-5 me-2 ms-2" width="65px">
                                <span class="namaTampil">
                                    {{ old('nama', auth()->user()->username) }}
                                </span>
                                <a class="link-primary fs-6 ms-2" data-bs-toggle="modal" data-bs-target="#editNama">
                                    Ubah
                                </a>
                            </div>
                            <div class="my-4"></div>
                            <div class="col-12">
                                <input type="hidden" name="nama" id="namaPelanggan" value="{{ $data[0]->nama }}">
                                <div class="form-group">
                                    <label for="NoTelpon" class="fs-4">No. Telepon</label>
                                    <input type="text" name="no_tlp" id="NoTelpon" class="form-control" value="{{ old('no_tlp', $data[0]->no_tlp) }}" aria-describedby="helpId">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="Alamat" class="fs-4">Alamat Lengkap</label>
                                    <textarea class="form-control" name="alamat" id="Alamat" rows="3">{{ old('alamat', $data[0]->alamat) }}</textarea>
                                    <p class="form-text text-muted fs-6">
                                        Alamat diatas digunakan untuk pengiriman barang dan lainnya, diharapkan untuk mengisi alamat lengkap sesuai yang tertera di tempat tinggal Anda
                                    </p>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <select class="custom-select" name="provinsi">
                                                <option selected>-- Pilih Provinsi --</option>
                                                <option value="">Jawa Barat</option>
                                                <option value="">Jawa Tengah</option>
                                                <option value="">Jawa Timur</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <select class="custom-select" name="kota">
                                                <option selected>-- Pilih Kota --</option>
                                                <option value="">Cimahi</option>
                                                <option value="">Bandung</option>
                                                <option value="">Malang</option>
                                                <option value="">Surabaya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <span class="link-primary" style="cursor: pointer">
                                            Tekan Untuk Memilih Lainnya
                                        </span>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="form-group">
                                      <label for=""></label>
                                      <textarea class="form-control" name="" id="" rows="3"></textarea>
                                    </div>
                                </div> --}}
                                <div class="d-flex justify-content-end my-3">
                                    <button id="btnSave" class="btn btn-primary my-2 text-white" role="button">Save</button>
                                    <a href="/resetPassword" class="btn btn-success mx-2 my-2 text-white">Reset Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>


<div class="modal fade" id="editNama" aria-labelledby="editNamaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h1 class="modal-title fs-5" id="editNamaLabel">Pelanggan Baru</h1>
                <button type="button" class="btn-close btn-close-white" aria-label="Close" data-bs-dismiss="modal"></button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama lama :</label>
                        <input type="text" class="form-control" value="{{ $data[0]->nama }}" name="namaPelanggan" id="pelangganNama">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama baru :</label>
                        <input type="text" id="namaBaru" class="form-control" placeholder="Nama Baru" name="namaPelanggan" id="pelangganNama">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="message-text" class="col-form-label">Keterangan :</label>
                        <textarea class="form-control" name="Ket" id="keteranganText"></textarea>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> --}}
                    <button type="submit" id="btnUbahNama" class="btn btn-primary" data-bs-dismiss="modal">Ubah</button>
                </div>
            </div>
        </div>
</div>

<script>
    const btnUbahNama = document.querySelector('#btnUbahNama');
    btnUbahNama.addEventListener('click', function () {
        const namaPelangganInput = document.querySelector('#namaPelanggan');
        const NamaBaru = document.querySelector('#namaBaru');
        const namaTampil = document.querySelector('.namaTampil');

        if (NamaBaru.value == '') {
            Swal.fire('Nama Kosong');
        } else {
            namaTampil.innerHTML = NamaBaru.value;
            namaPelangganInput.value = "{{ old("+NamaBaru+", $data[0]->nama) }}";
        }
    });
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 1600
        })
    </script>
@endif


@endsection