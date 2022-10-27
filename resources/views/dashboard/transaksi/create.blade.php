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
        
        {{-- INI BUAT PILIHAN BARANG YANG DIBELI --}}
        
        <div class="row g-3 align-items-center mt-4">
            <div class="col-auto">
                <select name="barang" id="barang-select" class="form-select">
                    @foreach ($barangs as $b)
                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                    @endforeach
                </select>
            </div> {{--
            <div class="col-auto">
                <select name="harga" id="harga" class="form-select">
                    @foreach ($barangs as $b)                        
                    <option value="{{ $b->harga }}">Rp. {{ $b->harga }}</option>
                    @endforeach                              
                </select>
            </div>
            <div class="col-auto">
            </div>
            <div class="col-auto">
                <select name="ukuran" id="ukuran" class="form-select" onchange="load();">
                   <option value="A">1 Kg</option>         
                   <option value="B">1/2 Kg</option>         
                   <option value="C">1/4 Kg</option>         
                </select>
            </div>
        </div> --}}

        
        <div class="grid text-center">
            <div class="g-col-4">
                <input type="number" name="ini">
            </div>
            <div class="g-col-4">
                <input type="text" name="jumlah">
            </div>
        </div>
  
        
        <div class="my-3 col-8">
            <label for="TotalHarga" class="form-label">Total Harga</label>
            <input type="number" class="form-control" id="TotalHarga" name="total_harga">
            <div id="emailHelp" class="form-text">Harga</div>
        </div>
        

        <input type="submit" value="Tambah" class="btn btn-outline-primary mt-3">           
    </form>
    

    <script>
         function ini() {
            const a = document.Q
         }
    </script>
@endsection