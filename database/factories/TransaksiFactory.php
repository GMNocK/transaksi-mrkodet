<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tgl_transaksi' => $this->faker->date(),
            'pelanggan_id' => 1,
            'total_harga' => 1000,
            'oleh' => $this->faker->name(),
            'token' =>  Str::random(10) // $this->faker->unique()->bothify('??#?##?#?') // panjang lebih dari 8
        ];
    }
}
