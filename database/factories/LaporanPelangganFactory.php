<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanPelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'send_at' => $this->faker->dateTime(),
            'pelanggan_id' => mt_rand(1, 4)
        ];
    }
}
