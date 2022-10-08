<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'pelanggan_id');
    }

    public function laporanPelanggan()
    {
        return $this->hasMany(laporanPelanggan::class);
    }
}
