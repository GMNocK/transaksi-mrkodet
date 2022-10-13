<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function detail_transaksi()
    {
        return $this->hasMany(Detail_transaksi::class);
    }
}
