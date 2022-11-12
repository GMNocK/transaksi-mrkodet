@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Transaksi Mister Kodet</h1>
</div>

@can('karyawan')
<h2>
  <a href="/dashboard/transaksis/create" class="text-center btn btn-primary btn-sm">
    <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
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
                <td>{{ $t->pesanan }}</td>
                <td>{{ $t->tgl_transaksi }}</td>
                <td>Rp.{{ $t->total_harga }}</td>
                <td>{{ $t->pencatat }}</td>
                <td style="text-align: center">

                  <a href="/dashboard/transaksis/{{ $t->token }}" class="badge bg-primary h-100">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                    @can('karyawan')
                    
                    <a href="/dashboard/transaksis/{{ $t->token }}/edit" class="badge bg-success">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>

                    <form action="/dashboard/transaksis/{{ $t->token }}" method="post" class="d-inline" onclick="return confirm('Yakin Untuk Menghapus?');">
                      @method('delete')
                      @csrf
                      <button class="badge h-100 bg-danger border-0">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                    
                    @endcan
                    
                    @cannot('karyawan')                      
                    <a href="{{ route('reports.create') }}">
                      <button class="badge bg-danger border-0">
                        <i class="fa fa-file" aria-hidden="true"></i>
                      </button>
                    </a>
                    @endcannot
                    
                </td>
            </tr>    
            @endforeach
            
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-end col-11 mt-2">
        {{ $transaksis->links() }}
      </div>
@endsection