@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Transaksi</h1>
</div>

<h2><a href="/dashboard/transaksis/create" class="text-decoration-none text-center">Tambah Data</a></h2>
      <div class="table-responsive col-lg-11">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Transaksi</th>
              <th scope="col">Dicatat Oleh</th>
              <th scope="col" style="text-align: center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transaksis as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->pengguna->nama }}</td>
                <td>{{ $t->tgl_transaksi }}</td>
                <td>{{ $t->total_harga }}</td>
                <td>{{ $t->oleh }}</td>
                <td style="text-align: center">
                    <a href="/dashboard/transaksis/{{ $t->id }}"><span data-feather="eye" class="align-text-bottom" style="margin-right: 4px" ></span></a>
                    <a href="#"><span data-feather="alert-circle" class="align-text-bottom text-danger" style="margin-right: 4px" ></span></a>
                    
                </td>
            </tr>    
            @endforeach
            
          </tbody>
        </table>
      </div>
@endsection