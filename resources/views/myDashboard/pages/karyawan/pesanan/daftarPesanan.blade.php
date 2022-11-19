@extends('myDashboard.App')

@section('content')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-end d-flex">
            <div class="ms-2 col-md-4 justify-content-end d-flex">

                <a href="#" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="book"></i>
                    <h6 class="card-title mb-0 link-secondary">Data Pesanan</h6>
                </a>
            </div>
        </div>

        <div class="table-responsive col-12 mb-5">
            <table class="table table-hover my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col" class="">Waktu pesan</th>
                        <th scope="col" class="">Total Harga</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class=""></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $i)
                        <tr>
                            <td>{{ $i->pelanggan->nama }}</td>
                            {{-- <td class="">{{ $waktuPesan[($loop->iteration - 1)]->waktu_pesan }}</td> --}}
                            <td class="">{{ $i->waktu_pesan }}</td>
                            <td class="">Rp.{{ $i->total_harga }}</td>
                            <td class="text-center">
                                @if ($i->status == '1')

                                    <span class="badge bg-secondary fs-6">
                                        Belum dibaca
                                    </span>

                                @else

                                    @if ($i->status == '2')

                                        <span class="badge bg-info fs-6">
                                            Di Baca
                                        </span>     

                                    @endif

                                    @if ($i->status == '3')

                                        <span class="badge bg-success fs-6">
                                            Di Terima
                                        </span>                                        
                                        
                                    @endif

                                    @if ($i->status == '4')

                                        <span class="badge bg-warning fs-6">
                                            Pesanan Di Proses
                                        </span>                                        
                                        
                                    @endif

                                    @if ($i->status == '5')

                                        <span class="badge bg-warning fs-6">
                                            Dikirim Ke tempat Tujuan
                                        </span>                                        
                                        
                                    @endif
                                    
                                    @if ($i->status == '6')

                                        <span class="badge bg-primary fs-6">
                                            Selesai
                                        </span>                                        
                                        
                                    @endif

                                    @if ($i->status == '0')

                                        <span class="badge bg-danger fs-6">
                                            Batal
                                        </span>                                        
                                        
                                    @endif
                                    
                                @endif
                            </td>
                            <td style="text-align: center">
                                <a href="pesananPelanggan/{{ $i->kode }}" class="btn btn-primary my-1">
                                {{-- <a href="#" class="btn btn-primary my-1" onclick="DltConfirm();"> --}}
                                    {{-- <i class="fa-solid fa-eye"></i> --}}
                                    <i class="align-middle" data-feather="eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if (session('berhasil'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session("berhasil") }}',
            showConfirmButton: false,
            timer: 1700
        })
    </script>
@endif

@endsection