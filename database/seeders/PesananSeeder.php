<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PesananSeeder extends Seeder
{
    
    public function run()
    {
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'transfer',
            'status' => 2,
            'kode' => Str::random(10),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'transfer',
            'status' => 2,
            'kode' => Str::random(10),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'COD',
            'status' => 4,
            'kode' => Str::random(10),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'Ambil Di Toko',
            'tipePembayaran' => 'COD',
            'status' => 6,
            'kode' => Str::random(10),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'COD',
            'status' => 3,
            'kode' => Str::random(10),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'COD',
            'status' => 0,
            'kode' => Str::random(10),
        ]);
    }
}
