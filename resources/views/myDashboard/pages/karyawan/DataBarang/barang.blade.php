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
                    <a href="produk/create" class="text-center btn btn-outline-secondary">
                        <i class="align-middle me-1 mb-1" data-feather="plus-circle"></i>
                        {{-- <i class="fa fa-plus-circle me-2" aria-hidden="true"></i> --}}
                        Tambah Barang
                    </a>
                </h2>
                @endcan
            </div>
            <div class="col-md-4 mt-1 d-flex justify-content-end align-items-center">

                @can('karyawan')
                    <a href="/Rekap/RProduk" class="text-center btn btn-outline-secondary">
                        <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>
                        Buat Rekap
                    </a>
                @endcan
            </div>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table table-hover table-striped my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr class="">
                        <th scope="col" style="min-width: 100px">Nama Barang</th>
                        <th scope="col" style="min-width: 85px">Harga / Kg</th>
                        {{-- <th scope="col" style="min-width: 100px">Keterangan</th> --}}
                        <th scope="col" class="text-center" style="min-width: 90px">gambar</th>
                        <th scope="col" class="text-center" style="min-width:80px;"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($barang as $t)
                    <tr>
                        <td>{{ $t->nama_barang }}</td>
                        <td>Rp.{{ $t->harga }}</td>
                        {{-- <td>{{ $t->keterangan }}</td> --}}
                        <td class="text-center">
                            <img src="{{ $t->foto }}" alt="" width="90px">
                        </td>
                        <td style="text-align: center">
            
                            <a href="/produk/{{ $t->id }}" class="btn btn-primary my-1" data-toggle="tooltip" data-placement="top" title="Lihat">
                            {{-- <a href="#" class="btn btn-primary my-1" onclick="DltConfirm();"> --}}
                                {{-- <i class="fa-solid fa-eye"></i> --}}
                                <i class="align-middle" data-feather="eye"></i>
                            </a>
                            @can('mustBeAdmin')
                                
                                <a href="produk/{{ $t->id }}/edit" class="btn btn-success my-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="align-middle" data-feather="edit"></i>
                                    {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
                                </a>                
                                <a class="my-1 btnDelete" data-id="{{ $t->id }}" data-toggle="tooltip" data-placement="top" title="Hapus">
                                    <button class="btn btn-danger">
                                        <i class="align-middle" data-feather="trash-2"></i>                                        
                                    </button>
                                </a>
                                
                            @endcan
                            
                            @can('karyawan')                      
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Laporkan">                                
                                    <button class="btn btn-danger">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                    </button>
                                </a>
                            @endcan
                            
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end col-12 mb-5">
            <span class="me-4">
                {{-- {{ $transaksis->links() }}             --}}
            </span>
        </div>

    </div>
</div>



<script>
    const btnDelete = document.querySelectorAll('.btnDelete');

btnDelete.forEach((item) => {
    const id = item.getAttribute('data-id');
    
    item.addEventListener('click', () => {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-2',
                cancelButton: 'btn btn-danger mx-2'
            },
            buttonsStyling: false
            })
    
            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete/produk/"+id+""            
                    
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
                }
            })
    });  
});
</script>

@if (session('added'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session("added") }}',
        showConfirmButton: false,
        timer: 1800
    })
</script>
@endif

@if (session('edited'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session("edited") }}',
        showConfirmButton: false,
        timer: 1800
    })
</script>
@endif

@if (session('Deleted'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session("Deleted") }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@endsection