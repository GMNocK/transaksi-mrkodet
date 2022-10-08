@extends('dashboard.layouts.main')

@section('container')
    <form action="/dashboard/transaksis/" method="post">
        @csrf
        <table class="mt-5">
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tgl_transaksi" placeholder="Tanggal" value="{{ old('tgl_trans') }}" class="form-control w-100 mt-2"></td>
            </tr>
            <tr>
                <td>Pengguna</td>
                <td>
                    <select name="pengguna_id" class="form-select mt-2">
                    @foreach ($pelanggans as $p )
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><input type="number" name="total_harga" placeholder="Total Harga" value="{{ old('total') }}" class="form-control w-100 mt-2"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah" class="btn btn-outline-primary mt-3"></td>
            </tr>
        </table>
    </form>
@endsection