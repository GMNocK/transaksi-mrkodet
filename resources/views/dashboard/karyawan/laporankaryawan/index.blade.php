@extends('dashboard.layouts.main')

@section('container')

@can('karyawan')
    
<a href="/laporankaryawans/create">
  <button class="btn btn-primary my-4">Buat Laporan</button>
</a>
@endcan

    <div class="table-responsive col-lg-11">
        <table class="table table-striped table-sm">
          <thead>
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

                    <a href="/laporankaryawans/{{ $l->id }}" class="badge bg-primary">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    
                    
                    <form action="/laporankaryawans/{{ $l->id }}" method="post" class="d-inline" onclick="return confirm('Yakin Untuk Menghapus?');">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0">
                        <i class="fas fa-trash-alt    "></i>
                      </button>
                    </form>
                    
                    <a href="/laporankaryawans/{{ $l->id }}/edit" class="badge bg-warning">
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

@endsection