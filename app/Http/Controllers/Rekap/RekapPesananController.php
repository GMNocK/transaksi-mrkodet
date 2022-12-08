<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class RekapPesananController extends Controller
{
    
    public function index()
    {
        $pesanans = Pesanan::orderByDesc('waktu_pesan');

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

        if (request('filterTgl')) {
            if (request('filterTgl') == 'today') {
                return redirect('/Rekap/RPesanan');
            }
    
            if (request('filterTgl') == 'tmonth') {
                return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
                    'pesanan' => $pesanans->whereMonth('waktu_pesan' , date('m'))->whereYear('waktu_pesan', date('Y'))->paginate(15),
                    'filter' => request('filterTgl'),
                    'Notif' => $notif, 
                    'baNotif' => $notifUnRead,
                    'message' => $message,
                    'baMessage' => $messageUnRead,
                ]);
            }
            if (request('filterTgl') == 'tyear') {
                return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
                    'pesanan' => $pesanans->whereYear('waktu_pesan', date('Y'))->paginate(15),
                    'filter' => request('filterTgl'),
                    'Notif' => $notif, 
                    'baNotif' => $notifUnRead,
                    'message' => $message,
                    'baMessage' => $messageUnRead,
                ]);
            }
            if (request('filterTgl') == 'yester') {
                return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
                    'pesanan' => $pesanans->WhereDate('waktu_pesan', (date('Y-m-') . (date('d')-1)))->paginate(15),
                    'filter' => request('filterTgl'),
                    'Notif' => $notif, 
                    'baNotif' => $notifUnRead,
                    'message' => $message,
                    'baMessage' => $messageUnRead,
                ]);
            }
            if (request('filterTgl') == 'all') {
                return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
                    'pesanan' => $pesanans->paginate(15),
                    'filter' => request('filterTgl'),
                    'Notif' => $notif, 
                    'baNotif' => $notifUnRead,
                    'message' => $message,
                    'baMessage' => $messageUnRead,
                ]);
            }
        }

        return view('myDashboard.pages.karyawan.Rekap.RPesanan',[
            'pesanan' => Pesanan::whereDate('waktu_pesan', date('Y-m-d'))->orderByDesc('waktu_pesan')->paginate(5),
            'filter' => 'today',
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Pesanan $pesanan)
    {
        //
    }

    
    public function edit(Pesanan $pesanan)
    {
        //
    }

    
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
