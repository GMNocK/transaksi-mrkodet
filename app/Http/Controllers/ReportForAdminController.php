<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LaporanKaryawan;
use Illuminate\Http\Request;

class ReportForAdminController extends Controller
{
    public function todayKaryawan()
    {
        return view('login', [
            'laporankaryawans' => LaporanKaryawan::orderBy('send_at', 'desc')->whereDate('send_at', date('Y-m-d'))->get(),
        ]);
    }
}
