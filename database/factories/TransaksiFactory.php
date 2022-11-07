<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory 
{
    public function definition()
    {
        return [
            'tgl_transaksi' => $this->faker->date(),
            'pelanggan_id' => mt_rand(1,5),
            'total_harga' => 15000,
            'status' => $this->faker->name(),
            'tipe_bayar' => $this->faker->name(),
            'pencatat' => $this->faker->name(),
            'token' =>  Str::random(10) // $this->faker->unique()->bothify('??#?##?#?') // panjang lebih dari 8
        ];
    }
}
