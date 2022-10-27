<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laporanKaryawan()
    {
        return $this->hasMany(LaporanKaryawan::class);
    }

    public function feedbackkaryawan()
    {
        return $this->hasMany(FeedbackKaryawan::class);
    }
}
