<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukti_bayar_pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['pesanan_id', 'bukti_bayar'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id');
    }
}
