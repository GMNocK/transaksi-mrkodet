@extends('dashboard.layouts.main')

@section('container')
    
<div class="table-responsive col-lg-11 mb-5">
    <table class="table table-striped table-sm" id="Keranjang">
        <thead class="bg-secondary text-light px-3">
            <tr>
                <th scope="col" class="text-center p-2 ps-3">No</th>
                <th scope="col" class="text-center p-2">Nama Barang</th>
                <th scope="col" class="text-center p-2">Harga Satuan</th>
                <th scope="col" class="text-center p-2" style="min-width: 30px">Ukuran</th>
                <th scope="col" class="text-center p-2">Quantity</th>
                <th scope="col" class="text-center p-2">SubTotal</th>
                <th scope="col" class="text-center p-2 pe-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="text-center">
                        1
                    </td>
                    <td class="text-center">
                        <input type="text" value="Readonly" readonly class="text-dark text-center border-0 bg-transparent nama-barang" name="barang">
                    </td>
                    <td class="text-center">
                        <input type="text" value="Readonly" readonly class="text-dark text-center border-0 bg-transparent harga-barang" name="hargaSatuan">
                    </td>
                    <td class="text-center">
                        <input type="text" value="Readonly" readonly class="text-dark text-center border-0 bg-transparent ukuran-barang" name="ukuran">
                    </td>
                    <td class="text-center">
                        <input type="text" value="Readonly" readonly class="text-dark text-center border-0 bg-transparent jumlah-beli" name="jml">
                    </td>
                    <td class="text-center">
                        <input type="text" value="Readonly" readonly class="text-dark text-center border-0 bg-transparent sub-total" name="subtotal">
                    </td>
                    <td class="text-center">
                        <i class="fas fa-edit link"></i>
                    </td>
                </tr>
        </tbody>
    </table>
</div>

@endsection