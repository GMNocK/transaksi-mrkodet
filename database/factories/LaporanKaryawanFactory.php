<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanKaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->paragraph(),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            // 'send_at' => $this->faker->dateTimeThisDecade(),
            'send_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'karyawan_id' => 1
        ];
    }
}
