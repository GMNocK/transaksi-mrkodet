<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackAdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->sentence(12),
            'laporan_karyawan_id' => mt_rand(1,10),
            'admin_id' => 1,
        ];
    }
}
