<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail_transaksi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
