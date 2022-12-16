@extends('myDashboard.App')

@section('content')

    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card flex-fill">
                <div class="card-body">
                    <form action="/Laporan/{{ $LaporanPelanggan->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group my-4">
                            <label>Judul Laporan /Keluhan</label>
                            <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $LaporanPelanggan->title) }}" />
                        </div>
                        <div class="form-group">
                            <label for="">Isi Laporan / Keluhan</label>
                            <textarea class="form-control" name="body" id="" rows="3">{{ old('body', $LaporanPelanggan->body) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            UBAH
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection