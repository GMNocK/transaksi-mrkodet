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
                                <th scope="col" class="">End Date</th>
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
                                    <span class="badge bg-success" style="font-size: 14px">{{ $p->status }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="pesanan/{{ $p->kode }}" class="btn btn-primary my-1">
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

@endsection