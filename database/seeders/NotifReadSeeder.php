<?php

namespace Database\Seeders;

use App\Models\notifRead;
use Illuminate\Database\Seeder;

class NotifReadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotifRead::create([
            'isRead' => 'true',
            'notification_id' => 1,
            'user_id' => 3,
        ]);
        NotifRead::create([
            'isRead' => 'true',
            'notification_id' => 4,
            'user_id' => 3,
        ]);
    }
}
