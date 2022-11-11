@extends('dashboard.layouts.main')

@section('container')

<div class="row my-5">
  <div class="col-11 d-flex justify-content-between">
      
      <div class="col-6">
          <span class="fs-5  d-flex align-items-center fw-semibold ms-3">
              <i class="fa fa-user-circle link-dark fs-3 me-2" aria-hidden="true"></i>
              {{ $transaksi->pelanggan->nama }}
          </span>
      </div>
      <div class="col-6 text-end">
          <span class="fs-5 fw-semibold me-2">
              {{ $transaksi->tgl_transaksi }}
              <i class="fas fa-calendar-alt ms-2"></i>
          </span>                    
      </div>
          
  </div>
</div>

<br class="my-4">

<div class="table-responsive col-lg-11 mb-5">
  <table class="table table-striped table-sm" id="Keranjang">
      <thead class="bg-secondary text-light px-3">
          <tr>
              <th scope="col" class="text-center p-2 ps-3">No</th>
              <th scope="col" class="text-center p-2">Nama Barang</th>
              <th scope="col" class="text-center p-2">Harga Satuan</th>
              <th scope="col" class="text-center p-2" style="min-width: 30px">Ukuran</th>
              <th scope="col" class="text-center p-2">Quantity</th>
              <th scope="col" class="text-center p-2">SubTotal</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($detailTrans as $det)
              <tr>
                  <td class="text-center">
                      {{ $loop->iteration }}
                  </td>
                  <td class="text-center">
                      <input type="text" value="{{ $det->barang->nama_barang }}" readonly class="text-dark text-center border-0 bg-transparent nama-barang" name="barang{{ $loop->iteration }}">
                  </td>
                  <td class="text-center">
                      <input type="text" value="{{ $det->harga_satuan }}" readonly class="text-dark text-center border-0 bg-transparent harga-barang" name="hargaSatuan{{ $loop->iteration }}">
                  </td>
                  <td class="text-center">
                      <input type="text" value="{{ $det->ukuran }}" readonly class="text-dark text-center border-0 bg-transparent ukuran-barang" name="ukuran{{ $loop->iteration }}">
                  </td>
                  <td class="text-center">
                      <input type="text" value="{{ $det->jumlah }}" readonly class="text-dark text-center border-0 bg-transparent jumlah-beli" name="jml{{ $loop->iteration }}">
                  </td>
                  <td class="text-center">
                      <input type="text" value="Rp.{{ $det->subtotal }}" readonly class="text-dark text-center border-0 bg-transparent sub-total" name="subtotal{{ $loop->iteration }}">
                  </td>
              </tr>
              @endforeach
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-end">
                  Total Harga :
                </td>
                <td class="text-center">
                   Rp.{{ $transaksi->total_harga }}
                </td>
              </tr>
      </tbody>
  </table>
</div>

<div class="row">
  <div class="col-6">
    <span class="fs-5">
      Status Pembayaran : {{ $transaksi->status }}
    </span>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <span class="fs-5">
      Jenis Pembayaran : {{ $transaksi->tipe_bayar }}
    </span>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <span class="fs-5">
      Nama Kasir : {{ $transaksi->pencatat }}
    </span>
  </div>
</div>
        
      
@endsection