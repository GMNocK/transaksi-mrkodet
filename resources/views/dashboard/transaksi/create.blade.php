@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/transaksis/" method="post">
        @csrf
        <div class="col-12 my-4 d-flex justify-content-between align-items-center mb-5">
            <div class="linked">
                <a class="fs-3 {{ Request::is('dashboard*') ? 'disabled link-dark text-decoration-none' : '' }}" style="font-weight: 400">{{ Request::is('dashboard*') ? 'Dashboard / ' : '' }}</a>
                <a class="fs-3 {{ Request::is('dashboard/transaksis*') ? 'disabled link-dark text-decoration-none' : '' }}" style="font-weight: 400">{{ Request::is('dashboard/transaksis*') ? 'Transaksi / ' : 'as' }}</a>
                <a href="" class="fs-3 " style="font-weight: 400">{{ Request::is('dashboard/transaksis/create') ? 'Create' : '' }}</a>
            </div>
            <div class="apa d-flex justify-content-center">
                <div class="tgl fs-5" style="font-weight: 500">
                    {{ date('Y-m-d') }}
                </div>
                <div class="icon mx-3">
                    <span data-feather="calendar" class="w-100 h-100"></span>
                </div>
            </div>
        </div>  

        <div class="col-12 mb-5">
            <div class="search col-6">
                <div class="form-group">
                  <label for="">This Is label</label>
                  <select class="form-control" name="" id="">
                    @foreach ($barangs as $b)                        
                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                        <option value="{{ $b->harga }}" hidden>{{ $b->harga }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        {{-- <div class="my-3 col-8">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input typ  e="date" class="form-control" id="tanggal" name="tgl_transaksi" value="{{ date('Y-m-d') }}">            
        </div>
        <div class="my-3 col-8">
            <label for="pelanggan" class="form-label">Nama Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan" class="form-select mt-2">
                @foreach ($pelanggans as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <input type="text" id="apaa" name="apa"> --}}
        

        @foreach ($barangs as $b)
            <div class="row selectrow g-3 align-items-center my-1">
                <div class="col-3">
                    <input type="text" id="3" class="form-control barang" name="barang{{ $loop->iteration }}" value="{{ $b->nama_barang }}">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control hargaBarang" name="harga{{ $loop->iteration }}" value="{{ $b->harga }}">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control ukuranBarang" name="ukuran{{ $loop->iteration }}" value="{{ $b->ukuran }}">
                </div>

                <div class="col-2">
                    <input type="number" name="quantity{{ $loop->iteration }}" class="form-control qty" value="{{ $qty = old('quantity', 0) }}">
                </div>

                <div class="col-3">
                    <input type="number" name="subtotal{{ $loop->iteration }}" class="form-control subtotal" value="{{ $b->harga * $qty }}" readonly>
                </div>
                
            </div>
        @endforeach
        
        
        
        

        <input type="submit" value="Tambah" class="btn btn-outline-primary mt-3">           
    </form>
    
    <script src="{{ asset('js/createtrans.js') }}"></script>
@endsection