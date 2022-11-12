@extends('myDashboard.App')

@section('content')
    
<nav class="breadcrumb mb-4 col-md-12 justify-content-between">
    <div>
        <a class="breadcrumb-item" href="#">myDashBoard</a>
        <span class="breadcrumb-item active">Transaksi</span>
    </div>

    <div class="d-flex align-items-center breadcrumb-item active me-2">
        <i class="align-middle me-1" data-feather="calendar"></i>
        <span>{{ date('Y-m-d') }}</span>
    </div>
</nav>


<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="col-md-4 mt-1">

                @can('karyawan')
                    
                {{-- <a href="/transaksi/create" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">Tambah Transaksi</h6>
                </a> --}}
                <h2>
                    <a href="transaksi/create" class="text-center btn btn-outline-secondary">
                        <i class="align-middle me-1 mb-1" data-feather="plus-circle"></i>
                        {{-- <i class="fa fa-plus-circle me-2" aria-hidden="true"></i> --}}
                        Buat Transaksi Baru
                    </a>
                </h2>
                @endcan
            </div>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table table-hover table-striped my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col" style="min-width: 100px">Tanggal</th>
                        <th scope="col" style="min-width: 85px">Total Harga</th>
                        <th scope="col" style="min-width: 100px">Pencatat</th>
                        <th scope="col" class="text-center" style="min-width: 90px">Pesanan</th>
                        <th scope="col" class="text-center" style="min-width:80px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>Project Apollo</td>
                        <td class="">01/01/2021</td>
                        <td>
                            <span class="badge bg-success">Done</span>
                        </td>
                        <td class="">Vanessa Tucker</td>
                        <td class="text-center">
                            <a href="/transaksi/create" class="btn btn-primary my-1">
                                <i class="align-middle" data-feather="eye"></i>
                            </a>

                            <a href="/transaksi/create" class="btn btn-primary">
                                <i class="align-middle" data-feather="eye"></i>
                            </a>

                            <a href="/transaksi/create" class="btn btn-primary my-1">
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                        </td>
                    </tr> --}}

                    @foreach ($lpelanggan as $t)
                    <tr>
                        <td>{{ $t->pelanggan->nama }}</td>
                        <td>Rp.{{ $t->total_harga }}</td>
                        <td>{{ $t->pencatat }}</td>
                        <td class="text-center">
                            <span class="badge {{ $t->pesanan == '0' ? 'bg-danger' : 'bg-success' }} p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                {{ $t->pesanan == '0' ? 'Offline' : 'Online' }}
                            </span>
                        </td>
                        <td style="text-align: center">
            
                            <a href="transaksi/{{ $t->token }}" class="btn btn-primary my-1">
                            {{-- <a href="#" class="btn btn-primary my-1" onclick="DltConfirm();"> --}}
                                {{-- <i class="fa-solid fa-eye"></i> --}}
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                            @can('karyawan')
                                
                                <a href="transaksi/{{ $t->token }}/edit" class="btn btn-success my-1">
                                    <i class="align-middle" data-feather="edit"></i>
                                    {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
                                </a>
                
                                <form action="transaksi/{{ $t->token }}" method="post" class="d-inline" onclick="return confirm('Yakin');">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger my-1">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                        {{-- <i class="fa-solid fa-trash"></i> --}}
                                    </button>
                                </form>
                                
                            @endcan
                            
                            @cannot('karyawan')                      
                                {{-- <a href="{{ route('reports.create') }}"> --}}
                                <a href="#" onclick="DltConfirm();">
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
        <div class="d-flex justify-content-end col-12 mb-5">
            <span class="me-4">
                {{ $lpelanggan->links() }}            
            </span>
        </div>

    </div>
</div>

@endsection