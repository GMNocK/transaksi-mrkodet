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


<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="ms-2 col-md-4 justify-content-start d-flex">
                @can('karyawan')
                <h2>
                    <a href="transaksi/create" class="text-center btn btn-outline-secondary">
                        <i class="align-middle me-1 mb-1" data-feather="plus-circle"></i>
                        {{-- <i class="fa fa-plus-circle me-2" aria-hidden="true"></i> --}}
                        Buat Transaksi Baru
                    </a>
                </h2>
                @endcan
            </div>
            <div class="col-md-4 mt-1 d-flex justify-content-end align-items-center">

                @can('karyawan')
                    <a href="/Rekap/RTransaksi" class="text-center btn btn-outline-secondary">
                        {{-- <i class="align-middle me-1" data-feather="plus-circle"></i> --}}
                        <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                        Buat Rekap
                    </a>
                @endcan
            </div>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table table-hover table-striped my-0" id="tbl_transaksi">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col" style="min-width: 100px">Tanggal</th>
                        <th scope="col" style="min-width: 85px">Total Harga</th>
                        <th scope="col" style="min-width: 100px">Pencatat</th>
                        <th scope="col" class="text-center" style="min-width: 90px">Pesanan</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center" style="min-width:80px;"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($transaksis as $t)
                    <tr>
                        <td>{{ $t->tgl_transaksi }}</td>
                        <td>Rp.{{ $t->total_harga }}</td>
                        <td>{{ $t->pencatat }}</td>
                        <td class="text-center">
                            <span class="badge {{ $t->pesanan_id == '' ? 'bg-danger' : 'bg-success' }} p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                {{ $t->pesanan_id == '' ? 'Offline' : 'Online' }}
                            </span>
                        </td>
                        <td class="text-center">
                            @if ($t->status == false || $t->status == '')
                                <span class="badge bg-danger p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em;">
                                    Belum Bayar
                                </span>
                            @endif
                            @if ($t->status == true)
                                <span class="badge bg-success p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em;">
                                    Lunas
                                </span>
                            @endif
                        </td>
                        <td style="text-align: center">
            
                            <a href="transaksi/{{ $t->token }}" class="btn btn-primary my-1" data-toggle="tooltip" data-placement="top" title="Lihat">
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                            @if ($t->pesanan_id == '')                                
                                @can('karyawan')
                                    
                                    <a href="transaksi/{{ $t->token }}/edit" class="btn btn-success my-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="align-middle" data-feather="edit"></i>
                                    </a>
                                @endcan
                                    
                            @endif

                            @can('karyawan')
                                                        
                                <a class="my-1 btnDelete" data-id="{{ $t->token }}" data-toggle="tooltip" data-placement="top" title="Hapus">
                                    <button class="btn btn-danger">
                                        <i class="align-middle" data-feather="trash-2"></i>                                        
                                    </button>
                                </a>
                                
                            @endcan
                            
                            @cannot('karyawan')                      
                                {{-- <a href="{{ route('reports.create') }}"> --}}
                                <a onclick="DltConfirm();">
                                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Laporkan">
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
        
        {{-- <div class="d-flex justify-content-end col-12 mb-5">
            <span class="me-4">
                {{ $transaksis->links() }}            
            </span>
        </div> --}}

    </div>
</div>

{{-- <div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="ms-2 col-md-4">

                <a href="/pelanggan/pesanan/create" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">Pesan Barang</h6>
                </a>
            </div>
        </div>

        <div class="table-responsive col-lg-12">
            <table class="table table-striped table-sm table-hover">
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
        
    </div>
</div>

<div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm table-hover">
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
</div> --}}

<script src="{{ asset('js/CostumJs/deleteConfirm.js') }}"></script>


<script>
    $(document).ready( function () {
        $('#tbl_transaksi').DataTable();
    });
</script>

@if (session('successDelete'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session("successDelete") }}',
        showConfirmButton: false,
        timer: 1700
    })
</script>
@endif

@if (session('integrasi'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session("integrasi") }}',
        showConfirmButton: false,
        timer: 1700
    })
</script>
@endif

@endsection