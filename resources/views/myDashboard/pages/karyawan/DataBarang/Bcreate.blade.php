@extends('myDashboard.App')

@section('content')
    
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-10">
                    <form action="/produk" method="post">
                        @csrf                    
                        <p class="fs-3 text-center fw-bold">Tambah Barang</p>
                        <div class="form-group">
                          <label for="namBar">Nama Barang</label>
                          <input type="text"
                            class="form-control" name="namBar" id="namBar" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                          <label for="harBar">Harga Barang</label>
                          <input type="number"
                            class="form-control" name="harBar" id="harBar" placeholder="Harga Barang" required>
                        </div>
                        <div class="form-group">
                          <label for="ket">Keterangan Tambahan</label>
                          <textarea class="form-control" name="keterangan" id="ket" rows="5" required></textarea>
                        </div>
                        {{-- <p class="fs-4 fw-bold text-center">Pilih Salah Satu</p> --}}
                        <div class="form-group">
                          {{-- <label for="foto">Pilih Gambar / upload</label>
                          <input type="file" class="form-control" name="foto" id="foto" placeholder=""> --}}
                          <label for="foto">Url Gambar</label>
                          <input type="text"
                            class="form-control" name="foto" id="foto" placeholder="Masukkan url atau link  gambar disini" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection