<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'id';   
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function feedbackkaryawan()
    {
        return $this->belongsTo(feedbackkaryawan::class);
    }
}
