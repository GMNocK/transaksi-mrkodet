<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ReportingController extends Controller
{
    public function transaksi(Request $request)
    {
        $request->validate(['typeRekap' => 'required']);        

        $transaksi = Transaksi::orderByDesc('tgl_transaksi');

        if ($request->typeRekap == 'today') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'isi' => 'Sesuai Cetaknya Apa',
                'transaksi' => $transaksi->whereDate('tgl_transaksi', date('Y-m-d'))->get(),
            ]);
        }

        if ($request->typeRekap == 'tmonth') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'transaksi' => $transaksi->whereMonth('tgl_transaksi' , date('m'))->whereYear('tgl_transaksi', date('Y'))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'tyear') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'transaksi' => $transaksi->whereYear('tgl_transaksi', date('Y'))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'yester') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'transaksi' => $transaksi->WhereDate('tgl_transaksi', (date('Y-m-') . (date('d')-1)))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'all') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'transaksi' => $transaksi->get(),
                'filter' => $request->typeRekap,
            ]);
        }
    }

    public function pesanan(Request $request)
    {
        $request->validate(['typeRekap' => 'required']);        

        $pesanans = Pesanan::orderByDesc('waktu_pesan');

        if ($request->typeRekap == 'today') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'isi' => 'Sesuai Cetaknya Apa',
                'pesanan' => $pesanans->whereDate('waktu_pesan', date('Y-m-d'))->get(),
            ]);
        }

        if ($request->typeRekap == 'tmonth') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'pesanan' => $pesanans->whereMonth('waktu_pesan' , date('m'))->whereYear('waktu_pesan', date('Y'))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'tyear') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'pesanan' => $pesanans->whereYear('waktu_pesan', date('Y'))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'yester') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'pesanan' => $pesanans->WhereDate('waktu_pesan', (date('Y-m-') . (date('d')-1)))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'all') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'pesanan' => $pesanans->get(),
                'filter' => $request->typeRekap,
            ]);
        }
    }
    public function pelanggan(Request $request)
    {
        $request->validate(['typeRekap' => 'required']);        

        $pelanggans = Pelanggan::orderByDesc('created_at');

        if ($request->typeRekap == 'today') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'isi' => 'Sesuai Cetaknya Apa',
                'pelanggan' => $pelanggans->whereDate('created_at', date('Y-m-d'))->get(),
                'filter' =>  $request->typeRekap,
            ]);
        }

        if ($request->typeRekap == 'tmonth') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'pelanggan' => $pelanggans->whereMonth('created_at' , date('m'))->whereYear('created_at', date('Y'))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'tyear') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'pelanggan' => $pelanggans->whereYear('created_at', date('Y'))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'yester') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'pelanggan' => $pelanggans->WhereDate('created_at', (date('Y-m-') . (date('d')-1)))->get(),
                'filter' => $request->typeRekap,
            ]);
        }
        if ($request->typeRekap == 'all') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'pelanggan' => $pelanggans->get(),
                'filter' => $request->typeRekap,
            ]);
        }
    }
}
