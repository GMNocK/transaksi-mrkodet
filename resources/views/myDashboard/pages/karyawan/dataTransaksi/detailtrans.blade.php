@extends('myDashboard.App')

@section('content')

<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="col-md-4 mt-1">

                @can('karyawan')
                    <a href="" class="text-center link-secondary fs-4">
                        <i class="fas fa-id-card-alt me-1"></i>
                        Transaksi
                    </a>
                @endcan
            </div>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table table-hover table-striped my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col" style="min-width: 85px">Total Harga</th>
                        <th scope="col">Pencatat</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center" style="min-width: 90px">Pesanan</th>
                        <th scope="col">Pembayaran</th>
                        @if ($transaksi->pesanan_id != '')                            
                        <th scope="col" class="text-center"></th>
                        @endif
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
                            <span class="badge {{ $transaksi->status == 'lunas' ? 'bg-success' : 'bg-danger' }} p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                {{ $transaksi->status == 'lunas' ? 'Lunas' : 'Belum Lunas'}}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $transaksi->pesanan_id == '' ? 'bg-danger' : 'bg-success' }} p-2 align-items-center" style="font-size: 13px; letter-spacing: .03em">
                                {{ $transaksi->pesanan_id == '' ? 'Offline' : 'Online' }}
                            </span>
                        </td>
                        <td>{{ $transaksi->tipe_bayar }}</td>
                        @if ($transaksi->pesanan_id != '')
                        <td class="text-center">
                            <a href="/pesananPelanggan/{{ $pesanan[0]->kode }}">
                                <span class="btn btn-primary align-items-center">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                            </a>
                        </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex mt-4">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="col-md-4 mt-1">

                @can('karyawan')
                    <a href="#" class="text-center link-secondary fs-4">
                        <i class="fas fa-id-card-alt me-1"></i>
                        Detail Transaksi
                    </a>
                @endcan
            </div>
        </div>

        <div class="table-responsive col-12 mb-4">
            <table class="table table-hover table-striped my-0">
                <thead class="bg-secondary text-white shadow-sm">
                    <tr>
                        <th scope="col" style="min-width: 100px">Nama barang</th>
                        <th scope="col" style="min-width: 85px">Harga / Kg</th>
                        <th scope="col" class="text-center">Ukuran</th>
                        <th scope="col" class="text-center" style="min-width: 90px">Jumlah Beli</th>
                        <th scope="col" class="text-center" style="min-width:80px;">SubTotal</th>
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
                            <td>Rp.{{ $d->harga_satuan }}</td>
                            <td class="text-center">{{ $d->ukuran }}.Kg</td>
                            <td class="text-center">
                                {{ $d->jumlah }}
                            </td>
                            <td style="text-align: center">
                                Rp.{{ $d->subtotal }}                              
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection