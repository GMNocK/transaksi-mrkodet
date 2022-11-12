@extends('myDashboard.App')

@section('content')

<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">

        <div class="table-responsive col-12 mt-4">        
            <table class="table table-striped table-hover table-sm">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col" style="min-width: 100px">Tanggal</th>
                        <th scope="col" style="min-width: 85px">Total Harga</th>
                        <th scope="col" style="min-width: 100px">Pencatat</th>
                        <th scope="col" class="text-center" style="min-width:80px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($LaporanPelanggans as $l)
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $l->excerpt }}</td>
                        <td>{{ $l->send_at }}</td>
                        <td style="text-align: center">
            
                            <a href="/transaksi/reports/{{ $l->id }}" class="badge bg-primary"><span data-feather="eye"></span></a>                 
                              
                              <form action="/transaksi/reports/{{ $l->id }}" method="post" class="d-inline" onclick="return confirm('Yakin Untuk Menghapus?');">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0">
                                  <span data-feather="x-circle"></span>
                                </button>
                              </form>
                              
                              <a href="/transaksi/reports/{{ $l->id }}/edit/" class="badge bg-warning">
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
    </div>
</div>
    
@endsection