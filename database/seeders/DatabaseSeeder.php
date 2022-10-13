<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\Barang;
use App\Models\detail_transaksi;
use App\Models\karyawan;
use App\Models\laporanKaryawan;
use App\Models\laporanPelanggan;
use App\Models\laporanPengguna;
use App\Models\pelanggan;
use App\Models\pengguna;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'DeadMan',
            'email' => 'yukie@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'level' => 'Admin',
        ]);
        User::create([
            'username' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'remember_token' => Str::random(10),
            'level' => 'karyawan',
        ]);

        $this->call([
            BarangSeeder::class
        ]);

        User::factory(5)->create();
        admin::factory(3)->create();
        karyawan::factory(3)->create();
        pelanggan::factory(5)->create();
        // Barang::factory(5)->create();
        transaksi::factory(5)->create();
        detail_transaksi::factory(5)->create();
        laporanPelanggan::factory(3)->create();
        laporanKaryawan::factory(2)->create();
    }
}
