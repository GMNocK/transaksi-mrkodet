<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pengguna()
    {
        return $this->belongsTo(pengguna::class);
    }

    public function detail_transaksi()
    {
        return $this->hasMany(detail_transaksi::class);
    }

    public function getRouteKeyName()
    {
        return 'id';   
    }
}
