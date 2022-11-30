@extends('myDashboard.App')

@section('content')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-between d-flex">
            <div class="ms-2 col-md-4">

                <a href="/Rekap/RPelanggan" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">Buat Rekap</h6>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-end">
                <h5 class="link-secondary card-title">
                    <i class="fa fa-book me-2" aria-hidden="true"></i>
                    Data Pelanggan 
                </h5>
            </div>
        </div>

        <div class="table-responsive col-12 mb-3">
            <table class="table table-hover my-0 table-striped">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col" class="">Alamat</th>
                        <th scope="col" class="">No. Telepon</th>
                        <th scope="col" class="">Pesanan</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $p)
                        <tr>
                            <td>{{ $p->nama }}</td>
                            <td class="">
                                @if ($p->alamat == '')
                                <span class="text-danger fw-bold fs-5">
                                    Belum Terisi
                                </span>
                                @else
                                    {{ $p->alamat }}
                                @endif
                            </td>
                            <td class="">
                                @if ($p->no_tlp == '')
                                <span class="text-danger fw-bold fs-5">
                                    Belum Terisi
                                </span>
                                @else
                                    {{ $p->no_tlp }}
                                @endif
                            </td>
                            <td class="">
                                @if ($p->pesanan == '[]')
                                    Tidak Pernah
                                @else
                                    {{-- {{ $p->pesanan->count() }} --}}
                                    Pernah
                                @endif
                            </td>
                            <td>
                                <a href="/dataPelanggan/{{ $p->id }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end col-12 my-2">
            <span class="pe-3">
                {{ $pelanggans->links() }}
            </span>
        </div>
    </div>
</div>

@endsection