<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LaporanKaryawan;
use Illuminate\Http\Request;

class ReportForAdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.adminKaryawanAll', [
            'laporankaryawans' => LaporanKaryawan::orderBy('send_at', 'desc')->with('karyawan')->get(),
        ]);
    }

    public function todayKaryawan()
    {
        return view('dashboard.admin.adminKaryawanToday', [
            'laporankaryawans' => LaporanKaryawan::orderBy('send_at', 'desc')->whereDate('send_at', date('Y-m-d'))->get(),
        ]);
    }
}