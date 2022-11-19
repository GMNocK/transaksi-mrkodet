@extends('myDashboard.App')

@section('content')
    
<div class="row">

    <div class="col-xxl-8">
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
{{-- <form action="/auth/Profile/update/{{ $data[0]->id }}" method="post"> --}}
@csrf


    <div class="col-8">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="p-3 fs-4 fw-semibold">
                    <img src="{{ asset('img/avatars/index.png') }}" alt="" class="rounded-5 me-3" width="35px">
                    <span class="namaTampil">
                       {{ $pelanggan->nama }}
                    </span>
                </div>
            </div>
            <div class="my-4"></div>
            <div class="col-12">
                <div class="form-group">
                    <label for="NoTelpon" class="fs-4">No. Telepon</label>
                    {{-- <input type="text" name="no_tlp" id="NoTelpon" class="form-control" value="{{ old('no_tlp', $data[0]->no_tlp) }}" aria-describedby="helpId"> --}}
                </div>
                <div class="form-group mb-2">
                    <label for="Alamat" class="fs-4">Alamat</label>
                    {{-- <textarea class="form-control" name="alamat" id="Alamat" rows="3">{{ old('alamat', $data[0]->alamat) }}</textarea> --}}
                </div>
                <div class="d-flex justify-content-end my-3">
                      
                </div>
            </div>
        </div>  
    </div>
</form>

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
                        {{-- <input type="text" class="form-control" value="{{ $data[0]->nama }}" name="namaPelanggan" id="pelangganNama"> --}}
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
@endsection