<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\Barang;
use App\Models\detail_transaksi;
use App\Models\FeedbackAdmin;
use App\Models\FeedbackKaryawan;
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
            'password' => bcrypt('1234'),
            'remember_token' => 123,
            'level' => 'Admin',
        ]);
        User::create([
            'username' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'remember_token' => 123,
            'level' => 'karyawan',
        ]);
        User::create([
            'username' => 'costumer',
            'email' => 'pengguna@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'remember_token' => Str::random(10),
            'level' => 'pelanggan',
        ]);
        pelanggan::create([
            'nama' => 'Pelanggan',
            'alamat' => 'Jawa Barat',
            'no_tlp' => '+62800 0000 1000',
            'user_id' => '3',
        ]);

        $this->call([
            BarangSeeder::class,
        ]);

        User::factory(20)->create();
        admin::factory(1)->create();
        karyawan::factory(1)->create();
        pelanggan::factory(16)->create();
        transaksi::factory(25)->create();
        detail_transaksi::factory(50)->create();
        laporanPelanggan::factory(50)->create();
        laporanKaryawan::factory(45)->create();

        FeedbackAdmin::factory(10)->create();
        FeedbackKaryawan::factory(10)->create();
    }
}
