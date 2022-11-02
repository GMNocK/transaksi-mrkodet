<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Karyawan;
use App\Models\LaporanKaryawan;
use App\Models\LaporanPelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return $lsaya->whereMonth('send_at', date('m'))->whereYear('send_at', date('Y'))->get();
        if (auth()->user()->level == 'karyawan') {            
            $kar = Karyawan::where('user_id', auth()->user()->id)->get();
            $ini = $kar[0]->id;
            $lsaya = LaporanKaryawan::where('karyawan_id', $ini )->whereMonth('send_at', date('m'))->whereYear('send_at', date('Y'))->get();
            return view('dashboard.index', [
                'transaksi' => Transaksi::all()->count(),
                'customer' => Pelanggan::all()->count(),
                'lp' => LaporanPelanggan::all()->count(),
                'admin' => Admin::all()->count(),
                'karyawan' => Karyawan::all()->count(),
                'ls' => $lsaya->count(),
            ]);
        }
        if (auth()->user()->level == 'Admin') {
            return view('dashboard.index', [
                'transaksi' => Transaksi::all()->count(),
                'customer' => Pelanggan::all()->count(),
                'lp' => LaporanPelanggan::all()->count(),
                'admin' => Admin::all()->count(),
                'karyawan' => Karyawan::all()->count(),
                'lk' => LaporanKaryawan::all()->count(),
            ]);
        }
        if (auth()->user()->level == 'costumer') {
            return view('dashboard.index', [
                'transaksi' => Transaksi::all()->count(),
                'customer' => Pelanggan::all()->count(),
                'admin' => Admin::all()->count(),
                'karyawan' => Karyawan::all()->count(),
            ]);
        }
    }
}
