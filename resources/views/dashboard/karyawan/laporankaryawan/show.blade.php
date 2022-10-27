@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="mt-4">
                    <a href="/laporankaryawans" class="btn btn-primary">
                        <span data-feather="eye" style="margin-bottom: 2px;"></span>
                        Kembali
                    </a>
                    
                    
                    <form action="/laporankaryawans/{{ $laporankaryawans->id }}" method="post" class="d-inline" onclick="return confirm('Yakin Untuk Menghapus?');">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger ">
                        <span data-feather="x-circle" style="margin-bottom: 2.5px;"></span>
                        Delete
                      </button>
                    </form>
                    
                    <a href="/laporankaryawans/{{ $laporankaryawans->id }}/edit" class="btn btn-warning">
                      <span data-feather="edit" style="margin-bottom: 2.5px;"></span>
                      Edit
                    </a>     
                </div>
                <div class="header mt-4">
                    <div class="img">
                        <img src="" alt="Ini...">
                    </div>
                    <div class="nama">
                        <h2>{{ $laporankaryawans->karyawan->nama }}</h2>
                    </div>
                </div>
                <div class="isi mt-5">
                    <h5>{{ $laporankaryawans->title }}</h5> 
                    <div class="body mt-4">
                        {{ $laporankaryawans->body }}
                    </div>
                </div>
                <div class="footer">
                    <h6>
                        {{ $laporankaryawans->send_at }}
                    </h6>
                </div>
                
            </div>
        </div>
    </div>
@endsection