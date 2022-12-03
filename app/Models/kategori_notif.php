<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_notif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
