<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Karyawan;
use App\Models\LaporanKaryawan;
use App\Models\LaporanPelanggan;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\User;
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
                'transJan' => Transaksi::whereDate('send_at', date('Y-m'))->get()
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
        if (auth()->user()->level == 'pelanggan') {
            return view('dashboard.index', [
                'transaksi' => Transaksi::all()->count(),
                'customer' => Pelanggan::all()->count(),
                'admin' => Admin::all()->count(),
                'karyawan' => Karyawan::all()->count(),
            ]);
        }
    }

    public function myDashboard()
    {
        // return ;        
        return view('myDashboard.pages.dashboard', [
            'barang' => Barang::all()->count(),
            'transaksi' => Transaksi::all()->count(),
            'pelanggan' => Pelanggan::all()->count(),
            'pesanan' => Pesanan::latest()->limit(6)->get(),
            'transJan' => Transaksi::whereMonth('tgl_transaksi', 1)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transFeb' => Transaksi::whereMonth('tgl_transaksi', 2)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transApr' => Transaksi::whereMonth('tgl_transaksi', 3)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transMar' => Transaksi::whereMonth('tgl_transaksi', 4)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transMei' => Transaksi::whereMonth('tgl_transaksi', 5)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transJun' => Transaksi::whereMonth('tgl_transaksi', 6)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transJul' => Transaksi::whereMonth('tgl_transaksi', 7)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transAug' => Transaksi::whereMonth('tgl_transaksi', 8)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transSep' => Transaksi::whereMonth('tgl_transaksi', 9)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transOct' => Transaksi::whereMonth('tgl_transaksi', 10)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transNov' => Transaksi::whereMonth('tgl_transaksi', 11)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'transDes' => Transaksi::whereMonth('tgl_transaksi', 12)->whereYear('tgl_transaksi', (date('Y') - 1))->count(),
            'pesananCOD' => Pesanan::where('tipePembayaran', 'COD')->count(),
            'pesananTransfer' => Pesanan::where('tipePembayaran', 'transfer')->count(),
        ]);
    }
}
