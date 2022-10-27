<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackKaryawan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function laporanpelanggan()
    {
        return $this->belongsTo(LaporanPelanggan::class);
    }
}
