@extends('myDashboard.App')

@section('content')
    
<div class="col-md-12 col-lg-12 col-xxl-8 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-end d-flex">
            <div class="ms-2 col-md-4 justify-content-end d-flex">

                <a href="#" class="link-secondary d-flex align-items-center">
                    <i class="align-middle me-1 link-secondary" data-feather="plus-circle"></i>
                    <h6 class="card-title mb-0 link-secondary">Pesan Barang</h6>
                </a>
            </div>
        </div>

        <div class="table-responsive col-12 mb-5">
            <table class="table table-hover my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col" class="">Tanggal Pesan</th>
                        <th scope="col" class="">Jam Pesan</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="">Assignee</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $i)
                        <tr>
                            <td>{{ $i->pelanggan[0]->nama }}</td>
                            <td class="">{{ $i->waktu_pesan }}</td>
                            <td class="">{{ $i->waktu_pesan }}</td>
                            <td><span class="badge {{ $i->status == '123' ? 'bg-danger' : 'bg-success' }} ">{{ $i->status }}</span></td>
                            <td class="">Vanessa Tucker</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection