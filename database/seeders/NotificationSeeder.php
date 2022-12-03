<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::create([
            'title' => 'Contoh Info',
            'detail' => 'Detail dari contoh info, didalamnya bisa ada info bahwa pesanan telah diterima, atau diproses',
            'potongan' => 'Detail dari contoh info, didalamnya',
            'user_id' => 3,
            'kategori_notif_id' => 1,
        ]);
        Notification::create([
            'title' => 'Contoh Promo',
            'detail' => 'Detail dari contoh promo, didalamnya bisa ada promo barang baru',
            'potongan' => 'Detail dari contoh promo, didalamnya ...',
            'kategori_notif_id' => 2,
        ]);
        Notification::create([
            'title' => 'Contoh Message',
            'detail' => 'Pesanan anda sedang dalam proses pembuatan, mohon tunggu informasi selanjutnya',
            'potongan' => 'Pesanan anda sedang dalam proses pembuatan ...',
            'user_id' => 3,
            'kategori_notif_id' => 3,
        ]);
        Notification::create([
            'title' => 'Pesanan Diterima, menunggu pembayaran',
            'detail' => 'Pesanan anda sudah diterima, mohon untuk membayar ke nomer rekening berikut 298309, mohon tunggu informasi lebih lanjut',
            'potongan' => 'Pesanan anda sudah diterima, mohon untuk ...',
            'user_id' => 3,
            'kategori_notif_id' => 1,
            'pesanan_id' => 5,
        ]);
    }
}
