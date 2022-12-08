<?php

namespace App\Http\Controllers\Rekap;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class RDatPelangganController extends Controller
{
    public function index()
    {
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

        $pelanggans = Pelanggan::orderByDesc('nama')->orderByDesc('created_at');

        if (request('filterTgl')) {
            if (request('filterTgl') == 'today') {
                return redirect('/Rekap/RPelanggan');
            }
    
            if (request('filterTgl') == 'tmonth') {
                return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan', [
                    'pelanggan' => $pelanggans->whereMonth('created_at' , date('m'))->whereYear('created_at', date('Y'))->paginate(15),
                    'filter' => request('filterTgl'),
                    'Notif' => $notif,   
                    'baNotif' => $notifUnRead,
                    'message' => $message,
                    'baMessage' => $messageUnRead,
                ]);
            }
            if (request('filterTgl') == 'tyear') {
                return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan', [
                    'pelanggan' => $pelanggans->whereYear('created_at', date('Y'))->paginate(15),
                    'filter' => request('filterTgl'),
                    'Notif' => $notif,   
                    'baNotif' => $notifUnRead,
                    'message' => $message,
                    'baMessage' => $messageUnRead,
                ]);
            }
            if (request('filterTgl') == 'yester') {
                return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan', [
                    'pelanggan' => $pelanggans->WhereDate('created_at', (date('Y-m-') . (date('d')-1)))->paginate(15),
                    'filter' => request('filterTgl'),
                    'Notif' => $notif,   
                    'baNotif' => $notifUnRead,
                    'message' => $message,
                    'baMessage' => $messageUnRead,
                ]);
            }
            if (request('filterTgl') == 'all') {
                return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan', [
                    'pelanggan' => $pelanggans->paginate(15),
                    'filter' => request('filterTgl'),
                    'Notif' => $notif,   
                    'baNotif' => $notifUnRead,
                    'message' => $message,
                    'baMessage' => $messageUnRead,
                ]);
            }
        }

        return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan',[
            'pelanggan' => $pelanggans->whereDate('created_at', date('Y-m-d'))->paginate(15),
            'filter' => 'today',
            'Notif' => $notif,   
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }
}
