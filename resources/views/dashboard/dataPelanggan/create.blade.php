@extends('dashboard.layouts.main')

@section('container')
    <div class="container" style="height: 94vh">
        <div class="row bg-dark h-50">
            <div class="col-12 bg-warning d-flex justify-content-center align-items-center">
                <div class="col-10 bg-light d-flex justify-content-center">
                    <div class="col-10">
                        <form action="/dashboard/dataPelanggan/" method="post">
                            @csrf
                            <label for="" class="form-label fs-5 mb-0 mt-3">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama">
                            
                            <label for="" class="form-label fs-5 mb-0 mt-3">Alamat</label>
                            <input type="text" class="form-control" name="alamat">

                            <label for="" class="form-label fs-5 mb-0 mt-3">No Telepon</label>
                            <input type="text" class="form-control mb-5" name="no_tlp">

                            <button class="col-12 btn btn-outline-primary btn-block mb-4">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection