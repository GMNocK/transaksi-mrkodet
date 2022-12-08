<?php

namespace Database\Seeders;

use App\Models\pengirim;
use Illuminate\Database\Seeder;

class PengirimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengirim::create([
            'notification_id' => 1,
            'user_id' => 2,
        ]);
        Pengirim::create([
            'notification_id' => 2,
            'user_id' => 2,
        ]);
        Pengirim::create([
            'notification_id' => 3,
            'user_id' => 2,
        ]);
        Pengirim::create([
            'notification_id' => 4,
            'user_id' => 2,
        ]);
    }
}
