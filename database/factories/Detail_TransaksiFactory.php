<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Detail_TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barang_id' => mt_rand(1,4),
            'transaksi_id' => mt_rand(1,10),
            'harga_satuan' => 150000,
            'jumlah' => mt_rand(1,4),
            'subtotal' => 150000 * mt_rand(1,4),
        ];
    }
}
