@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/transaksis/" method="post">
        @csrf
        <div class="my-3 col-8">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tgl_transaksi" value="{{ date('Y-m-d') }}">            
        </div>
        <div class="my-3 col-8">
            <label for="pelanggan" class="form-label">Nama Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan" class="form-select mt-2">
                @foreach ($pelanggans as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        
        {{-- INI BUAT PILIHAN BARANG YANG DIBELI --}}
        <div class="row">
            <div class="col-3 text-center">
                <label for="#" class="fs-5">Nama barang</label>
            </div>
            <div class="col-2 text-center">
                <label for="#" class="fs-5">Harga</label>
            </div>
            <div class="col-2 text-center">
                <label for="#" class="fs-5">Ukuran</label>
            </div>
            <div class="col-2 text-center">
                <label for="#" class="fs-5">Quantity</label>
            </div>
            <div class="col-2 text-center">
                <label for="#" class="fs-5">SubTotal</label>
            </div>
        </div>

        <div class="row g-3 align-items-center my-1">
            @foreach ($barangs as $b)
            <div class="col-3">
                <input type="text" id="3" class="form-control" name="barang{{ $loop->iteration }}" value="{{ $b->nama_barang }}">
            </div>

            <div class="col-2">
                <input type="text" class="form-control" name="harga{{ $loop->iteration }}" value="{{ $b->harga }}">
            </div>
            <div class="col-2">
                <input type="text" class="form-control" name="ukuran{{ $loop->iteration }}" value="{{ $b->ukuran }}">
            </div>
            <div class="col-2">
                <input type="number" id="qty" name="quantity{{ $loop->iteration }}" class="form-control" value="{{ $qty = old('quantity', 0) }}" onchange="load();">
            </div>

            <div class="col-2">
                <input type="number" name="subtotal{{ $loop->iteration }}" class="form-control" value="{{ $b->harga * $qty }}" readonly>
            </div>
            
            @endforeach
        </div>
        
        
  
        
        <div class="my-3 col-8">
            <label for="TotalHarga" class="form-label">Total Harga</label>
            <input type="number" class="form-control" id="TotalHarga" name="total_harga">
            <div id="emailHelp" class="form-text">Harga</div>
        </div>
        

        <input type="submit" value="Tambah" class="btn btn-outline-primary mt-3">           
    </form>
    

    {{-- <script>
        const a = document.querySelectorAll('.form-control');
        const b = document.querySelector('#tanggal');
        const c = document.querySelectorAll('#qty');
        const d = document.querySelector('.apa');

        console.log(b.value);
        function load() {

            apa();
        }
        function apa() {            
            c.forEach((item) => {
                item.classList
            });
        }
    </script> --}}
    <script src="{{ asset('js/createtrans.js') }}"></script>
@endsection