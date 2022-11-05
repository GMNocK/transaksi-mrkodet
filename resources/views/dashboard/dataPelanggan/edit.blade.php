@extends('dashboard.layouts.main')

@section('container')
<form action="/dashboard/dataPelanggan/{{ $pelanggan->id }}" method="POST">
    @method('put')
    @csrf
    <div class="form-outline col-10 my-4">
        <label class="form-label" for="form4Example1">Nama Pelanggan</label>
        <input type="text" id="title" class="form-control" name="nama" value="{{ old('nama', $pelanggan->nama) }}" />
    </div>
    
    <div class="col-10 my-4">
        <label for="">Alamat</label>
        <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $pelanggan->alamat) }}">
    </div>
    <div class="col-10 my-4">
        <label for="txtarea">keterangan</label>
        <input type="text" placeholder="Keterangan Tambahan" id="txtarea" class="form-control" style="" name="ket" value="{{ old('ket') }}">
    </div>
    <button type="submit" class="mt-4 col-10 btn btn-block btn-outline-warning">UBAH</button>
</form>
@endsection