<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // 1 Kilo
        Barang::create([
            'nama_barang' => 'Basreng Pedas',
            'harga' => 60000,
            'ukuran' => '1 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Balado',
            'harga' => 60000,
            'ukuran' => '1 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Asin',
            'harga' => 60000,
            'ukuran' => '1 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Extra Pedas',
            'harga' => 60000,
            'ukuran' => '1 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Sistik',
            'harga' => 64000,
            'ukuran' => '1 KG'
        ]);

        // Setengah Kilo

        Barang::create([
            'nama_barang' => 'Basreng Pedas',
            'harga' => 30000,
            'ukuran' => '1/2 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Balado',
            'harga' => 30000,
            'ukuran' => '1/2 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Asin',
            'harga' => 30000,
            'ukuran' => '1/2 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Extra Pedas',
            'harga' => 30000,
            'ukuran' => '1/2 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Sistik',
            'harga' => 32000,
            'ukuran' => '1/2 KG'
        ]);

        // Seperempat KILO

        Barang::create([
            'nama_barang' => 'Basreng Pedas',
            'harga' => 15000,
            'ukuran' => '1/4 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Balado',
            'harga' => 15000,
            'ukuran' => '1/4 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Asin',
            'harga' => 15000,
            'ukuran' => '1/4 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Extra Pedas',
            'harga' => 15000,
            'ukuran' => '1/4 KG'
        ]);
        Barang::create([
            'nama_barang' => 'Sistik',
            'harga' => 16000,
            'ukuran' => '1/4 KG'
        ]);

        //  UKURAN KECIL

        Barang::create([
            'nama_barang' => 'Basreng Pedas',
            'harga' => 3000,
            'ukuran' => '45 gram'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Balado',
            'harga' => 3000,
            'ukuran' => '45 gram'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Asin',
            'harga' => 3000,
            'ukuran' => '45 gram'
        ]);
        Barang::create([
            'nama_barang' => 'Basreng Extra Pedas',
            'harga' => 3000,
            'ukuran' => '45 gram'
        ]);

        Barang::create([
            'nama_barang' => 'Sistik',
            'harga' => 3000,
            'ukuran' => '45 gram'
        ]);
    }
}