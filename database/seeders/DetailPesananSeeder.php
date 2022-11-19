<?php

namespace Database\Seeders;

use App\Models\Detail_Pesanan;
use Illuminate\Database\Seeder;



class DetailPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail_Pesanan::create([
            'pesanan_id' => 1,
            'barang_id' => 1,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '1',
            'subtotal' => '15000',
        ]);
        Detail_Pesanan::create([
            'pesanan_id' => 1,
            'barang_id' => 2,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '1',
            'subtotal' => '15000',
        ]);

        Detail_Pesanan::create([
            'pesanan_id' => 2,
            'barang_id' => 1,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '2',
            'subtotal' => '30000',
        ]);

        Detail_Pesanan::create([
            'pesanan_id' => 3,
            'barang_id' => 3,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '2',
            'subtotal' => '30000',
        ]);

        Detail_Pesanan::create([
            'pesanan_id' => 4,
            'barang_id' => 2,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '2',
            'subtotal' => '30000',
        ]);

        Detail_Pesanan::create([
            'pesanan_id' => 5,
            'barang_id' => 3,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '1',
            'subtotal' => '15000',
        ]);
        Detail_Pesanan::create([
            'pesanan_id' => 5,
            'barang_id' => 2,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '1',
            'subtotal' => '15000',
        ]);
        
        Detail_Pesanan::create([
            'pesanan_id' => 6,
            'barang_id' => 3,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '1',
            'subtotal' => '15000',
        ]);
        Detail_Pesanan::create([
            'pesanan_id' => 6,
            'barang_id' => 2,
            'hargaPerKg' => 60000,
            'ukuran' => '1/4',
            'jumlahPesan' => '1',
            'subtotal' => '15000',
        ]);
    }
}
