<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pelanggan_id' => mt_rand(2,4),
            'waktu_pesan' => $this->faker->dateTimeBetween('-2 month', '-3 week'),
            'total_harga' => 15000,
            'tipe_kirim' => 'kirim ke rumah',
            'tipePembayaran' => 'transfer',
            'status' => 1,
            'kode' => Str::random(10),
        ];
    }
}
