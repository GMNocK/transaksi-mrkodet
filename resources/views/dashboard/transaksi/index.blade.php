@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Transaksi Mister Kodet</h1>
</div>

@can('karyawan')
<h2>
  <a href="/dashboard/transaksis/create" class="text-center btn btn-primary btn-sm">
    <span data-feather="plus-circle" class="align-text-bottom text-center" style="margin-bottom: 1px"></span> 
    Create New Transaksi
  </a>
</h2>
@endcan

      <div class="table-responsive col-lg-11">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col" style="min-width: 90px">Nama</th>
              <th scope="col" style="min-width: 100px">Tanggal</th>
              <th scope="col" style="min-width: 85px">Transaksi</th>
              <th scope="col" style="min-width: 100px">Dicatat Oleh</th>
              <th scope="col" style="text-align: center; min-width:80px;">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transaksis as $t)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $t->pelanggan->user->username }}</td>                
                <td>{{ $t->tgl_transaksi }}</td>
                <td>Rp.{{ $t->total_harga }}</td>
                <td>{{ $t->oleh }}</td>
                <td style="text-align: center">

                  <a href="/dashboard/transaksis/{{ $t->token }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                    @can('karyawan')
                    
                    <form action="/dashboard/transaksis/{{ $t->token }}" method="post" class="d-inline" onclick="return confirm('Yakin Untuk Menghapus?');">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0">
                        <span data-feather="x-circle"></span>
                      </button>
                    </form>
                    
                    <a href="/dashboard/transaksis/{{ $t->token }}/edit" class="badge bg-warning">
                      <span data-feather="edit"></span>
                    </a>
                    @endcan
                    
                    @cannot('karyawan')                      
                    <a href="{{ route('reports.create') }}">
                      <button class="badge bg-danger border-0">
                        <span data-feather="alert-circle"></span>
                      </button>
                    </a>
                    @endcannot
                    
                </td>
            </tr>    
            @endforeach
            
          </tbody>
        </table>
      </div>
@endsection