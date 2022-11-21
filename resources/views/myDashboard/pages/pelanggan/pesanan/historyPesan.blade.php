@extends('myDashboard.App')

@section('content')
    
<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
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
                        <th scope="col" class="text-center">Status</th>
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
                            @if ($p->status == '1')

                                <span class="badge bg-secondary fs-6">
                                    Belum dibaca
                                </span>

                            @else

                                @if ($p->status == '2')

                                    <span class="badge bg-info fs-6">
                                        Di Baca
                                    </span>     

                                @endif

                                @if ($p->status == '3')

                                    <span class="badge bg-success fs-6">
                                        Di Terima
                                    </span>                                        
                                    
                                @endif

                                @if ($p->status == '4')

                                    <span class="badge bg-warning fs-6">
                                        Pesanan Di Proses
                                    </span>                                        
                                    
                                @endif

                                @if ($p->status == '5')

                                    <span class="badge bg-warning fs-6">
                                        Dikirim Ke tempat Tujuan
                                    </span>                                        
                                    
                                @endif
                                
                                @if ($p->status == '6')

                                    <span class="badge bg-primary fs-6">
                                        Selesai
                                    </span>                                        
                                    
                                @endif

                                @if ($p->status == '0')

                                    <span class="badge bg-danger fs-6">
                                        Batal
                                    </span>                                        
                                    
                                @endif
                                
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/pesanan/{{ $p->kode }}" class="btn btn-primary my-1">
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

@endsection