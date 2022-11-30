@extends('myDashboard.App')

@section('content')

<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">

        <div class="card-header">
            @can('karyawan')
            
                <a href="/laporankaryawans/create">
                    <button class="btn btn-primary my-4">Buat Laporan</button>
                </a>

            @endcan
        </div>
        
            <div class="table-responsive col-lg-12 mb-4">
                <table class="table table-hover table-striped my-0">
                  <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col" style="min-width: 90px">Excerpt</th>
                      <th scope="col" style="min-width: 80px">Send At</th>
                      <th scope="col" style="text-align: center; min-width:120px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($laporankaryawans as $l)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $l->excerpt }}</td>                
                        <td>{{ $l->send_at }}</td>
                        <td style="text-align: center">
        
                            <a href="/laporankaryawans/{{ $l->id }}" class="btn btn-primary my-1">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            
                            
                            <form action="/laporankaryawans/{{ $l->id }}" method="post" class="d-inline" onclick="return confirm('Yakin Untuk Menghapus?');">
                              @method('delete')
                              @csrf
                              <button class="btn btn-danger my-1">
                                <i class="fas fa-trash-alt"></i>
                              </button>
                            </form>
                            
                            <a href="/laporankaryawans/{{ $l->id }}/edit" class="btn btn-warning my-1">
                              <i class="fas fa-edit"></i>
                            </a>                    
                            
                            {{-- <a href="/laporankaryawans/">
                              <button class="badge bg-danger border-0">
                                <span data-feather="alert-circle"></span>
                              </button>
                            </a> --}}
                            
                            
                        </td>
                    </tr>    
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
        
            <div class="d-flex justify-content-end col-11">
            {{ $laporankaryawans->links() }}
            </div>
    </div>
</div>

@endsection