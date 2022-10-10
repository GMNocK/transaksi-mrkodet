<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function detail_transaksi()
    {
        return $this->hasMany(Detail_transaksi::class);
    }

    public function getRouteKeyName()
    {
        return 'token';   
    }
}
