<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori_notif()
    {
        return $this->belongsTo(kategori_notif::class);
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function pengirim()
    {
        return $this->hasMany(Pengirim::class);
    }
    
    public function notifRead()
    {
        return $this->hasMany(NotifRead::class);
    }
}
