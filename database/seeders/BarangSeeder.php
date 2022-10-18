<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        Barang::create([
            'nama_barang' => 'Basreng Pedas',
            'Harga' => 60000
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Balado',
            'Harga' => 60000
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Asin',
            'Harga' => 60000
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Extra Pedas',
            'Harga' => 60000
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Sistik',
            'Harga' => 64000
        ]);
    }
}
