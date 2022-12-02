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
        if (auth()->user()->level == 'pelanggan') {            
            $pelanggan_id = Pelanggan::where('user_id', auth()->user()->id)->get('id')[0]->id;
            $pesananTerakhir = Pesanan::orderByDesc('waktu_pesan')->where('pelanggan_id', $pelanggan_id)->limit(6)->get();
        } else {
            $pelanggan_id = 0;
            $pesananTerakhir = Pesanan::orderByDesc('waktu_pesan')->limit(6)->get();
        }



        $month = date('m') - 1;
        return view('myDashboard.pages.dashboard', [
            'barang' => Barang::all()->count(),
            'karyawan' => Karyawan::all()->count(),
            'transaksi' => Transaksi::all()->count(),
            'pelanggan' => Pelanggan::all()->count(),
            'pesanan' => Pesanan::all(),
            'pesananSaya' => Pesanan::where('pelanggan_id', $pelanggan_id)->count(),
            'pesananCOD' => Pesanan::where('tipePembayaran', 'COD')->count(),
            'pesananTransfer' => Pesanan::where('tipePembayaran', 'transfer')->count(),
            'laporanSaya' => LaporanPelanggan::where('pelanggan_id', $pelanggan_id)->count(),
            'pesananTerakhir' => $pesananTerakhir,
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
            'pesan1' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-1'))->count(),
            'pesan2' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-2'))->count(),
            'pesan3' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-3'))->count(),
            'pesan4' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-4'))->count(),
            'pesan5' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-5'))->count(),
            'pesan6' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-6'))->count(),
            'pesan7' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-7'))->count(),
            'pesan8' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-8'))->count(),
            'pesan9' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-9'))->count(),
            'pesan10' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-10'))->count(),
            'pesan11' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-11'))->count(),
            'pesan12' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-12'))->count(),
            'pesan13' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-13'))->count(),
            'pesan14' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-14'))->count(),
            'pesan15' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-15'))->count(),
            'pesan16' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-16'))->count(),
            'pesan17' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-17'))->count(),
            'pesan18' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-18'))->count(),
            'pesan19' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-19'))->count(),
            'pesan20' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-20'))->count(),
            'pesan21' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-21'))->count(),
            'pesan22' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-22'))->count(),
            'pesan23' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-23'))->count(),
            'pesan24' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-24'))->count(),
            'pesan25' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-25'))->count(),
            'pesan26' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-26'))->count(),
            'pesan27' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-27'))->count(),
            'pesan28' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-28'))->count(),
            'pesan29' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-29'))->count(),
            'pesan30' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-30'))->count(),
            'pesan31' => Pesanan::whereDate('waktu_pesan', date('Y-' .$month . '-31'))->count(),
            'Notif' => Pesanan::orderByDesc('waktu_pesan')->limit(4)->get(),
            'message' => LaporanPelanggan::orderByDesc('send_at')->limit(4)->get(),
        ]);
    }
}
