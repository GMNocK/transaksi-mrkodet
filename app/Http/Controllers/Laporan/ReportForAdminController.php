<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\LaporanKaryawan;
use App\Models\LaporanPelanggan;
use Illuminate\Http\Request;

class ReportForAdminController extends Controller
{
    public function indexKaryawan()
    {
        return view('dashboard.admin.karyawan.adminKaryawan', [
            'laporankaryawans' => LaporanKaryawan::orderBy('send_at', 'desc')->with('karyawan')->get(),
        ]);
    }

    public function todayKaryawan()
    {
        return view('dashboard.admin.karyawan.adminKaryawan', [
            'laporankaryawans' => LaporanKaryawan::orderBy('send_at', 'desc')->whereDate('send_at', date('Y-m-d'))->with('karyawan')->get(),
        ]);
    }

    public function thisMonthKaryawan()
    {
        return view('dashboard.admin.karyawan.adminKaryawan', [
            'laporankaryawans' => LaporanKaryawan::orderBy('send_at', 'desc')->whereMonth('send_at', date('m'))->whereYear('send_at', date('Y'))->with('karyawan')->get(),
        ]);
    }

    public function thisYearKaryawan()
    {
        return view('dashboard.admin.karyawan.adminKaryawan', [
            'laporankaryawans' => LaporanKaryawan::orderBy('send_at', 'desc')->whereYear('send_at', date('Y'))->with('karyawan')->get(),
        ]);
    }


    // Pelanggan

    public function indexPelanggan()
    {
        return view('dashboard.admin.pelanggan.index', [
            'laporanpelanggans' => LaporanPelanggan::orderBy('send_at', 'desc')->with('karyawan')->get(),
        ]);
    }
    public function todayPelanggan()
    {
        return view('dashboard.admin.pelanggan.index', [
            'laporanpelanggans' => LaporanPelanggan::orderBy('send_at', 'desc')->whereDate('send_at', date('Y-m-d'))->with('karyawan')->get(),
        ]);
    }
    public function thisMonthPelanggan()
    {
        return view('dashboard.admin.pelanggan.index', [
            'laporanpelanggans' => LaporanPelanggan::orderBy('send_at', 'desc')->whereMonth('send_at', date('m'))->whereyear('send_at', date('Y'))->with('karyawan')->get(),
        ]);
    }
    public function thisYearPelanggan()
    {
        return view('dashboard.admin.pelanggan.index', [
            'laporanpelanggans' => LaporanPelanggan::orderBy('send_at', 'desc')->whereyear('send_at', date('Y'))->with('karyawan')->get(),
        ]);
    }
}