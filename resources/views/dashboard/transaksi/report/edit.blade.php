@extends('dashboard.layouts.main')

@section('container')
    
<form action="/transaksi/reports/{{ $LaporanPelanggan->id }}" method="POST">
    @method('put')
    @csrf
    <div class="form-outline col-10 my-4">
        <label class="form-label" for="form4Example1">Title \ Judul</label>
        <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $LaporanPelanggan->title) }}" />
    </div>
    
    <div class="col-10 my-4">
        <label for="txtarea"></label>
        <input type="text" id="txtarea" class="form-control" style="" name="body" value="{{ old('body', $LaporanPelanggan->body) }}">
    </div>
    <button type="submit">UBAH</button>
</form>
@endsection