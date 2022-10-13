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
        
        <div class="row g-3 align-items-center mt-4">
            <div class="col-auto">
                <select name="" id="">
                    <option value="{{  }}">{{  }}</option>
                </select>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                Must be 8-20 characters long.
                </span>
            </div>
        </div>
        
        <input type="submit" value="Tambah" class="btn btn-outline-primary mt-3">           
    </form>
@endsection