<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_tlp' => $this->faker->phoneNumber(),
            'user_id' =>  $this->faker->unique()->numberBetween(4, 20), //mt_rand(3,20),
        ];
    }
}
