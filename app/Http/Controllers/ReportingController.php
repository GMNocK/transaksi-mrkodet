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

        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        $notifUnRead = 0;
        for ($i=0; $i < $banyakNotif->count(); $i++) {
            if ($banyakNotif[$i]->notifRead == '[]') {
                $notifUnRead += 1;
            }
        }
        $messageUnRead = 0;
        for ($i=0; $i < $banyakMessage->count(); $i++) { 
            if ($banyakMessage[$i]->notifRead == '[]') {
                $messageUnRead += 1;
            }
        }

        $transaksi = Transaksi::orderByDesc('tgl_transaksi');

        if ($request->typeRekap == 'today') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'isi' => 'Sesuai Cetaknya Apa',
                'transaksi' => $transaksi->whereDate('tgl_transaksi', date('Y-m-d'))->paginate(15),
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }

        if ($request->typeRekap == 'tmonth') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'transaksi' => $transaksi->whereMonth('tgl_transaksi' , date('m'))->whereYear('tgl_transaksi', date('Y'))->paginate(15),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'tyear') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'transaksi' => $transaksi->whereYear('tgl_transaksi', date('Y'))->paginate(15),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'yester') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'transaksi' => $transaksi->WhereDate('tgl_transaksi', (date('Y-m-') . (date('d')-1)))->paginate(15),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'all') {
            return view('myDashboard.pages.Reporting.pages.LTrans', [
                'transaksi' => $transaksi->get(),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
    }

    public function pesanan(Request $request)
    {
        $request->validate(['typeRekap' => 'required']);

        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        $notifUnRead = 0;
        for ($i=0; $i < $banyakNotif->count(); $i++) {
            if ($banyakNotif[$i]->notifRead == '[]') {
                $notifUnRead += 1;
            }
        }
        $messageUnRead = 0;
        for ($i=0; $i < $banyakMessage->count(); $i++) { 
            if ($banyakMessage[$i]->notifRead == '[]') {
                $messageUnRead += 1;
            }
        }

        $pesanans = Pesanan::orderByDesc('waktu_pesan');

        if ($request->typeRekap == 'today') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'isi' => 'Sesuai Cetaknya Apa',
                'pesanan' => $pesanans->whereDate('waktu_pesan', date('Y-m-d'))->paginate(8),
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }

        if ($request->typeRekap == 'tmonth') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'pesanan' => $pesanans->whereMonth('waktu_pesan' , date('m'))->whereYear('waktu_pesan', date('Y'))->paginate(8),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'tyear') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'pesanan' => $pesanans->whereYear('waktu_pesan', date('Y'))->paginate(8),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'yester') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'pesanan' => $pesanans->WhereDate('waktu_pesan', (date('Y-m-') . (date('d')-1)))->paginate(8),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'all') {
            return view('myDashboard.pages.Reporting.pages.LPesanan', [
                'pesanan' => $pesanans->paginate(8),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
    }
    public function pelanggan(Request $request)
    {
        $request->validate(['typeRekap' => 'required']);

        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        $notifUnRead = 0;
        for ($i=0; $i < $banyakNotif->count(); $i++) {
            if ($banyakNotif[$i]->notifRead == '[]') {
                $notifUnRead += 1;
            }
        }
        $messageUnRead = 0;
        for ($i=0; $i < $banyakMessage->count(); $i++) { 
            if ($banyakMessage[$i]->notifRead == '[]') {
                $messageUnRead += 1;
            }
        }

        $pelanggans = Pelanggan::orderByDesc('created_at');

        if ($request->typeRekap == 'today') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'isi' => 'Sesuai Cetaknya Apa',
                'pelanggan' => $pelanggans->whereDate('created_at', date('Y-m-d'))->paginate(8),
                'filter' =>  $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }

        if ($request->typeRekap == 'tmonth') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'pelanggan' => $pelanggans->whereMonth('created_at' , date('m'))->whereYear('created_at', date('Y'))->paginate(8),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'tyear') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'pelanggan' => $pelanggans->whereYear('created_at', date('Y'))->paginate(8),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'yester') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'pelanggan' => $pelanggans->WhereDate('created_at', (date('Y-m-') . (date('d')-1)))->paginate(8),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        if ($request->typeRekap == 'all') {
            return view('myDashboard.pages.Reporting.pages.LDataPelanggan', [
                'pelanggan' => $pelanggans->paginate(8),
                'filter' => $request->typeRekap,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
    }
}
