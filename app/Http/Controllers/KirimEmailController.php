<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{
    public function EmailVerify()
    {
        Mail::to('yukiembillal01@gmail.com')->send(new EmailVerify());
    }
}
