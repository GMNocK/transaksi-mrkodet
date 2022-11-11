<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }

    public function detail_pesanan()
    {
        return $this->hasMany(Detail_Pesanan::class);
    }
}
