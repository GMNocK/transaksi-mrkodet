@extends('myDashboard.App')

@section('content')
    
        <div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header justify-content-between d-flex">
                    <div class="ms-2 col-md-4">

                        <a href="/pesanan/create" class="link-secondary d-flex align-items-center">
                            <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                            <h6 class="card-title mb-0 link-secondary">Pesan Barang</h6>
                        </a>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <h6 class="link-secondary card-title">
                            Daftar pesanan saya
                        </h6>
                    </div>
                </div>

                <div class="table-responsive col-12 mb-5">
                    <table class="table table-hover my-0">
                        <thead class="bg-secondary text-white shadow-sm">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" class="">Waktu Pesan</th>
                                <th scope="col" class="">Total Harga</th>
                                <th scope="col" class="text-center">Status Pesanan</th>
                                <th scope="col" class="text-center">Status Bayar</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesananSaya as $p)                            
                            <tr>
                                <td>{{ $p->pelanggan->nama }}</td>
                                <td class="">{{ $p->waktu_pesan }}</td>
                                <td class="">Rp.{{ $p->total_harga }}</td>
                                <td class="text-center">
                                    @if ($p->status == '3')

                                        <span class="badge bg-secondary">
                                            Belum dibaca
                                        </span>

                                    @else

                                        @if ($p->status == '4')

                                            <span class="badge bg-info">
                                                Di Baca
                                            </span>

                                        @endif

                                        @if ($p->status == '5')

                                            <span class="badge bg-success">
                                                Di Terima
                                            </span>
                                            
                                        @endif

                                        @if ($p->status == '6')

                                            <span class="badge bg-warning">
                                                Pesanan Di Proses
                                            </span>

                                        @endif
                                        @if ($p->status == '7')

                                            <span class="badge bg-success bg-opacity-75">
                                                Siap Di Ambil
                                            </span>

                                        @endif
                                        @if ($p->status == '8')

                                            <span class="badge bg-primary bg-opacity-75">
                                                Dikirim Ke tempat Tujuan
                                            </span>

                                        @endif

                                        @if ($p->status == '9')

                                            <span class="badge bg-primary bg-opacity-75">
                                                Sampai Di Tempat Tujuan
                                            </span>

                                        @endif

                                        @if ($p->status == '2')

                                            <span class="badge bg-primary">
                                                Selesai
                                            </span>

                                        @endif

                                        @if ($p->status == '1')

                                            <span class="badge bg-danger">
                                                Batal
                                            </span>

                                        @endif

                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($p->bukti == false || $p->bukti == 0)
                                        <span class="badge bg-danger">Belum Bayar</span>
                                    @else
                                        @if ($p->bukti == 3)
                                            <span class="badge bg-primary">Menunggu Verifikasi</span>
                                        @endif

                                        @if ($p->bukti == 2)                                            
                                            <span class="badge bg-warning">Menunggu Pembayaran</span>
                                        @endif
                                            
                                        @if ($p->bukti == 1)
                                            <span class="badge bg-success">Sudah Bayar</span>                                            
                                        @endif

                                        @if ($p->bukti == 4)
                                            <span class="badge bg-info">COD</span>                                                                                    
                                        @endif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="pesanan/{{ $p->kode }}" class="btn btn-primary my-1" data-toggle="tooltip" data-placement="top" title="Lihat">
                                        <i class="align-middle" data-feather="eye"></i>
                                    </a>

                                    @if ($p->status == '3' || $p->status == '4')
                                        @if ($p->bukti == false)
                                            <a class="my-1 btnBatal" data-id="{{ $p->kode }}" data-toggle="tooltip" data-placement="top" title="Batalkan Pesanan">
                                                <button class="btn btn-danger">
                                                    Batal
                                                    {{-- <i class="align-middle" data-feather="trash-2"></i>                                         --}}
                                                </button>
                                            </a>
                                        @endif
                                    @else
                                        @if ($p->status == '1')
                                        
                                            <a class="my-1 btnDelete" data-id="{{ $p->kode }}"data-toggle="tooltip" data-placement="top" title="Hapus">
                                                <button class="btn btn-danger">
                                                    <i class="align-middle" data-feather="trash-2"></i>                                        
                                                </button>
                                            </a>
                                            
                                        @endif
                                    @endif
                                    {{-- {{ $p->status == 'di baca' || $p->status == 'belum di baca' ? '<a href="pesanan/{{ $p->kode }}" class="btn btn-primary my-1"><i class="align-middle" data-feather="eye"></i></a>' : ''}} --}}
                                </td>
                            </tr>                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



{{-- Pembatalan Pesanan --}}
<script>
    const btnBatal = document.querySelectorAll('.btnBatal');

    btnBatal.forEach((item) => {
        const kode = item.getAttribute('data-id');
        
        item.addEventListener('click', () => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
                })
        
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Pesanan Akan Dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Batalkan!',
                    cancelButtonText: 'Tidak, Jangan DiBatalkan!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/pesanan/batal/"+kode+"";      
                        
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Batal Untuk Membatalkan Pesanan',
                        'Pesanan tetap bisa diproses',
                        'error'
                        )
                    }
                })
        });  
    });
</script>

{{-- Hapus Pesanan Yang sudah Dibatalkan --}}
<script>
    const btnDelete = document.querySelectorAll('.btnDelete');

    btnDelete.forEach((item) => {
        const kode = item.getAttribute('data-id');
        
        item.addEventListener('click', () => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
                })
        
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Pesanan Akan Hapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak, Batal!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/pesanan/delete/"+kode+"";      
                        
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                        'Pesanan tidak dihapus',
                        'Pesanan akan tetap dilist',
                        'error'
                        )
                    }
                })
        });
    });
</script>

@if (session('memesan'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session("memesan") }}',
            showConfirmButton: false,
            timer: 1600
        })
    </script>
@endif

@if (session('IsNull'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Pemesanan tidak bisa dilakukan',
            showConfirmButton: false,
            timer: 1400
        });

        setTimeout(() => {
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Silahkan isi identitas lengkap di profile',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location = '/profile';
            } else if (result.isDenied) {
                Swal.fire('Pemesanan Bisa dilakukan dengan identitas jelas')
            }
            });
        }, 2000);
    </script>
@endif

@if (session('batal'))

    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session("batal") }}',
            showConfirmButton: false,
            timer: 1700
        })
    </script>

@endif

@if (session('deleted'))

    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session("deleted") }}',
            showConfirmButton: false,
            timer: 1700
        })
    </script>

@endif

@if (session('message'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session("message") }}',
            showConfirmButton: false,
            timer: 1700
        })
    </script>
@endif

@endsection