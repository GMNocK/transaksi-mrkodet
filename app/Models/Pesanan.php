<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pesanan()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function detail_pesanan()
    {
        return $this->hasMany(Detail_Pesanan::class);
    }

    public function getRouteKeyName()
    {
        return 'kode';
    }
}
