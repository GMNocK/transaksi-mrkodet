@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Your Transaksi</h1>
</div>

<h2>Section title</h2>
      <div class="table-responsive col-lg-11">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
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
                <td>{{ $t->oleh }}</td>
                <td style="text-align: center">
                    <a href="/dashboard/transaksis/{{ $t->id }}"><span data-feather="eye" class="align-text-bottom" style="margin-right: 4px" ></span></a>
                    <a href="#"><span data-feather="x-circle" class="align-text-bottom text-danger" style="margin-right: 4px" ></span></a>
                    <a href="#"><span data-feather="edit" class="align-text-bottom text-danger" ></span></a>
                </td>
            </tr>    
            @endforeach
            
          </tbody>
        </table>
      </div>
@endsection