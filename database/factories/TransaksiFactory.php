<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    public function definition()
    {
        return [
            'tgl_transaksi' => $this->faker->dateTimeBetween('-2 years', '-1 week'),
            'total_harga' => 15000,
            'status' => $this->faker->name(),
            'tipe_bayar' => 'Ambil Di Toko',
            'pencatat' => $this->faker->name(),
            'token' =>  Str::random(10) // $this->faker->unique()->bothify('??#?##?#?') // panjang lebih dari 8
        ];
    }
}
