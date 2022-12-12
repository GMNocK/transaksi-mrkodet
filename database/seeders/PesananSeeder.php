<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PesananSeeder extends Seeder
{
    
    public function run()
    {
        // STATUS PESANAN [==] 1 = belum dibaca, 2 = dibaca, 3 = diterima, 4 = diproses, 5 = dikirim, 6 = selesai
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'transfer',
            'status' => 3,
            'kode' => Str::random(12),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'transfer',
            'status' => 3,
            'kode' => Str::random(12),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'COD',
            'status' => 3,
            'kode' => Str::random(12),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'Ambil Di Toko',
            'tipePembayaran' => 'COD',
            'status' => 3,
            'kode' => Str::random(12),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'COD',
            'status' => 3,
            'kode' => Str::random(12),
        ]);
        Pesanan::create([
            'pelanggan_id' => 1,
            'waktu_pesan' => now(),
            'total_harga' => 30000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'COD',
            'status' => 3,
            'kode' => Str::random(12),
        ]);
    }
}
