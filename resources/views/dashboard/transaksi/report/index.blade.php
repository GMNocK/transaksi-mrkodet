@extends('dashboard.layouts.main')

@section('container')



<div class="table-responsive col-lg-11 mt-4">
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Excerpt</th>
            <th>Send At</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($LaporanPelanggans as $l)
            
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $l->title }}</td>
            <td>{{ $l->send_at }}</td>
            <td style="text-align: center">

                <a href="/transaksis/report/{{ $l->id }}" class="badge bg-primary"><span data-feather="eye"></span></a>                 
                  
                  <form action="/transaksis/report/{{ $l->id }}" method="post" class="d-inline" onclick="return confirm('Yakin Untuk Menghapus?');">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0">
                      <span data-feather="x-circle"></span>
                    </button>
                  </form>
                  
                  <a href="/transaksis/report/{{ $l->id }}/edit" class="badge bg-warning">
                    <span data-feather="edit"></span>
                  </a>                                                            
                  
              </td> 
        </tr>

        @endforeach
    </tbody>
</table>
</div>
    <a href="{{ route('dashboard') }}">
        <h1 class="btn btn-circle btn-success mt-5">Back</h1>
    </a>
    
@endsection