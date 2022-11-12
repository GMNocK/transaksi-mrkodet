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

        <div class="table-responsive col-12 mb-3">
            <table class="table table-hover my-0 table-striped">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col" class="">Alamat</th>
                        <th scope="col" class="">No. Telepon</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="">Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $p)
                        <tr>
                            <td>{{ $p->nama }}</td>
                            <td class="">{{ $p->alamat }}</td>
                            <td class="">{{ $p->no_tlp }}</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="">{{ $p->pesanan == '[]' ? 'Tidak Pernah' : '$p->pesanan' }}</td>
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