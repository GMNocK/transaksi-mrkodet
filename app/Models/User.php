<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->hasMany(Pelanggan::class, 'user_id');
    
    }
    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function fromMessage()
    {
        return $this->hasMany(Notification::class, 'pengirim');
    }
    public function pengirim()
    {
        return $this->hasMany(Pengirim::class);
    }
}
