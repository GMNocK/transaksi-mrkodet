<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifRead extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function notification()
    {
        return $this->belongTo(Notification::class);
    }
}
