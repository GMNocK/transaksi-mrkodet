@extends('dashboard.layouts.main')

@section('container')
    <div class="container" style="height: 94vh">
        
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">My Transaksi</h1>
          </div>
          
          <h2 class="my-4">
            <a href="/dashboard/dataPelanggan/create" class="text-decoration-none text-center btn btn-primary">
              <span data-feather="user-plus" style="margin-bottom: 4px"></span> 
              Tambah Data
            </a>
          </h2>
          <div class="table-responsive col-lg-12">
              <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col" style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggans as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->alamat }}</td>
                                <td>{{ $s->no_tlp }}</td>
                                <td style="text-align: center">
                                    <a href="/dashboard/dataPelanggan/{{ $s->id }}" class="badge bg-primary btn-success border-0">
                                        <span data-feather="eye"></span>
                                    </a>
                                    <form action="/dashboard/dataPelanggan/{{ $s->id }}" method="POST" class="d-inline" onclick="return alert('Yakin Untuk Menghapus?');">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0">
                                            <span data-feather="x-circle"></span>
                                        </button>
                                    </form>
                                    <a class="badge bg-warning my-sm-1" href="/dashboard/dataPelanggan/{{ $s->id }}/edit">
                                        <span data-feather="edit" class="text-danger"></span>
                                    </a>                    
                                </td>
                            </tr>    
                        @endforeach
                    </tbody>
              </table>
          </div>
          
          <div class="d-flex justify-content-end col-11">
              {{ $pelanggans->links() }}
          </div>
    </div>
@endsection