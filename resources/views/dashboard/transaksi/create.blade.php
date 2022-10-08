@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/transaksis/" method="post">
        @csrf
        <div class="my-3 col-8">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tgl_transaksi">            
        </div>
        <div class="my-3 col-8">
            <label for="pelanggan" class="form-label">Nama Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan" class="form-select mt-2">
                @foreach ($pelanggans as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-3 col-8">
            <label for="TotalHarga" class="form-label">Total Harga</label>
            <input type="number" class="form-control" id="TotalHarga" name="total_harga">
            <div id="emailHelp" class="form-text">Harga</div>
        </div>
        <input type="submit" value="Tambah" class="btn btn-outline-primary mt-3">           
    </form>
@endsection