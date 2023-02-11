@extends('myDashboard.App')

@section('content')

<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="ms-2 col-md-4 justify-content-start d-flex">

                <a href="/Laporan/create" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-2 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">Buat Laporan</h6>
                </a>
            </div>
        </div>

        <div class="table-responsive col-12 mt-1">
            <table class="table table-striped table-hover">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" style="min-width: 85px">Judul</th>
                        <th scope="col" style="min-width: 100px">Tanggal</th>
                        <th scope="col" class="text-center" style="min-width: 180px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($LaporanPelanggans as $l)

                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $l->title }}</td>
                        <td>{{ $l->send_at }}</td>
                        <td class="text-center">
                            @can('pelanggan')
                                
                            <a href="/Laporan/{{ $l->id }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Data">
                                <span data-feather="eye"></span>
                            </a>
                            
                            
                            <a href="/Laporan/{{ $l->id }}/edit/" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                <span data-feather="edit"></span>
                            </a>

                            <form action="/Laporan/{{ $l->id }}" method="post" class="d-inline" onclick="return confirm('Yakin Untuk Menghapus?');" data-toggle="tooltip" data-placement="top" title="Hapus">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                            
                            @endcan
                        </td> 
                    </tr>
            
                    @endforeach
                </tbody>
            </table>
            {{-- <a href="{{ route('dashboard') }}">
                <h1 class="btn btn-circle btn-success my-2">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Back
                </h1>
            </a> --}}
        </div>
    </div>
</div>
    
@endsection