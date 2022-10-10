@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Detail Transaksi</h1>
</div>

<h2 class="mb-5" hidden>Transaksi tanggal {{ $transaksi->tgl_transaksi }}</h2>
      
        <h4 class="mb-4">Nama : {{ $transaksi->pelanggan->nama }}</h4>
        <h3></h3>
        <table style="margin-left: 40px; font-size: 18px">
          <tr class="bg-primary text-center">
            <th style="width: 10em" class="p-3">Barang</th>
            <th style="width: 10em" class="p-3">Harga satuan</th>
            <th style="width: 6em" class="p-3">Jumlah</th>
            <th style="width: 10em" class="p-3">Total</th>
          </tr>
          @foreach ($transaksi->detail_transaksi as $i)                    
          <tr class="bg-light">
            <td class="p-3">{{ $i->nama_barang }}</td>
            <td class="p-3 text-center">{{ $i->harga }}</td>
            <td class="p-3 text-center">{{ $i->jumlah }}</td>
            <td class="p-3 text-center">{{ $i->harga * $i->jumlah }}</td>
          </tr>
          @endforeach
          <tr>
            <td></td>
            <td></td>
            <td style="font-size: 18px" class="text-center"><p><b>Total harga : </b></p></td>
            <td><p class="text-center">{{ $transaksi->total_harga }}</p></td>
          </tr>
          </table>

          <a href="/dashboard/transaksis" class="btn btn-primary mx-5 ">Kembali</a>
          <br><br><br>

        
      
@endsection