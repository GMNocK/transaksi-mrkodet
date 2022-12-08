<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengirim extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}