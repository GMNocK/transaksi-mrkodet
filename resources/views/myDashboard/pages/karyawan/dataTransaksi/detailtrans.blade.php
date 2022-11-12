@extends('myDashboard.App')

@section('content')

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
                    <form action="/transaksi/" method="POST">
                        @method('delete')
                        @csrf

                        <a href="transaksi/create" class="text-center btn btn-outline-secondary">
                            <i class="align-middle me-1 mb-1" data-feather="plus-circle"></i>
                            {{-- <i class="fa fa-plus-circle me-2" aria-hidden="true"></i> --}}
                            Buat Transaksi Baru
                        </a>
                    </form>
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

                    <tr>
                        <td>{{ $transaksi->tgl_transaksi }}</td>
                        <td>{{ $hargaTotal }}</td>
                        <td>{{ $transaksi->pencatat }}</td>
                        <td class="text-center">
                            <span class="badge {{ $transaksi->pesanan == '0' ? 'bg-danger' : 'bg-success' }} p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                {{ $transaksi->pesanan == '0' ? 'Offline' : 'Online' }}
                            </span>
                        </td>
                        <td style="text-align: center">
            
                            <a href="transaksi/{{ $transaksi->token }}" class="btn btn-primary my-1">
                            {{-- <a href="#" class="btn btn-primary my-1" onclick="DltConfirm();"> --}}
                                {{-- <i class="fa-solid fa-eye"></i> --}}
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                            @can('karyawan')
                                
                                <a href="transaksi/{{ $transaksi->token }}/edit" class="btn btn-success my-1">
                                    <i class="align-middle" data-feather="edit"></i>
                                    {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
                                </a>
                
                                <form action="transaksi/{{ $transaksi->token }}" method="post" class="d-inline" onclick="return confirm('Yakin');">
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
                </tbody>
            </table>
        </div>

    </div>
</div>
    
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
                    <form action="/transaksi/" method="POST">
                        @method('delete')
                        @csrf

                        <a href="transaksi/create" class="text-center btn btn-outline-secondary">
                            <i class="align-middle me-1 mb-1" data-feather="plus-circle"></i>
                            {{-- <i class="fa fa-plus-circle me-2" aria-hidden="true"></i> --}}
                            Buat Transaksi Baru
                        </a>
                    </form>
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
                    @foreach ($detail as $d)                        
                        <tr>
                            <td>{{ $d->barang->nama_barang }}</td>
                            <td>Rp.{{ $d->subtotal }}</td>
                            <td>{{ $transaksi->pencatat }}</td>
                            <td class="text-center">
                                <span class="badge {{ $transaksi->pesanan == '0' ? 'bg-danger' : 'bg-success' }} p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                    {{ $transaksi->pesanan == '0' ? 'Offline' : 'Online' }}
                                </span>
                            </td>
                            <td style="text-align: center">
                
                                <a href="transaksi/{{ $transaksi->token }}" class="btn btn-primary my-1">
                                {{-- <a href="#" class="btn btn-primary my-1" onclick="DltConfirm();"> --}}
                                    {{-- <i class="fa-solid fa-eye"></i> --}}
                                    <i class="align-middle" data-feather="eye"></i>
                                </a>
                                @can('karyawan')
                                    
                                    <a href="transaksi/{{ $transaksi->token }}/edit" class="btn btn-success my-1">
                                        <i class="align-middle" data-feather="edit"></i>
                                        {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
                                    </a>
                    
                                    <form action="transaksi/{{ $transaksi->token }}" method="post" class="d-inline" onclick="return confirm('Yakin');">
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

    </div>
</div>

@endsection