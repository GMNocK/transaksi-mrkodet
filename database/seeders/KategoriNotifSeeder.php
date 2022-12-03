<?php

namespace Database\Seeders;

use App\Models\kategori_notif;
use Illuminate\Database\Seeder;

class KategoriNotifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori_notif::create([
            'kode' => 'INFO',
            'nama' => 'Info'
        ]);
        kategori_notif::create([
            'kode' => 'PROMO',
            'nama' => 'Promo'
        ]);
        kategori_notif::create([
            'kode' => 'MESSAGE',
            'nama' => 'Message'
        ]);
    }
}
