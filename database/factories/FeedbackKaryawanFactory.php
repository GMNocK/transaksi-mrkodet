<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackKaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraph(1),
            'laporan_pelanggan_id' => mt_rand(1,10),
            'karyawan_id' => 1,
        ];
    }
}
