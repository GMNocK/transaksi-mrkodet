<?php

namespace App\Http\Controllers\Laporan;

use App\Models\LaporanPelanggan;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReportController extends Controller
{
    
    public function index()
    {
        // NOTIFIKASI
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


        $pelanggan =  Pelanggan::where('user_id', auth()->user()->id)->get()[0];
        $pelangganData = LaporanPelanggan::orderByDesc('send_at')->where('pelanggan_id', $pelanggan->id)->get();

        return view('myDashboard.pages.pelanggan.laporan.Lsaya', [
            'LaporanPelanggans' => $pelangganData,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function create()
    {
        // NOTIFIKASI
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

        return view('myDashboard.pages.pelanggan.laporan.LCreate', [
            'pelanggans' => Pelanggan::orderByDesc('nama')->where('user_id', auth()->user()->id)->get()  ,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'pelanggan_id' => 'required',
        ]);
        $validateData['excerpt'] = Str::limit($validateData['body'], 15, '...');

        $date = Carbon::now()->toDateTimeString();        
        $validateData['send_at'] = $date;  

        LaporanPelanggan::create($validateData);

        // return $date = Carbon::now()->toDateTimeString();
        
        return redirect('/LaporanSaya');
    }

    
    public function show(LaporanPelanggan $Laporan)
    {
        // NOTIFIKASI
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


        return view('myDashboard.pages.Diskusi.Lshow',[
            'laporanPelanggan' => $Laporan,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }


    public function edit(LaporanPelanggan $Laporan)
    {
        // NOTIFIKASI
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


        return view('dashboard.transaksi.report.edit', [
            'LaporanPelanggan' => $Laporan,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function update(Request $request, LaporanPelanggan $Laporan)
    {
        $validateData = $request->validate([
            'title' => 'required|min:10',
            'body' => 'required'
        ]);
        LaporanPelanggan::where('id', $Laporan->id)->update($validateData);


        return redirect('/Laporan');   
    }


    public function destroy(LaporanPelanggan $Laporan)
    {
        // return $Laporan;
        LaporanPelanggan::destroy($Laporan->id);

        return redirect('/LaporanSaya');
    }

    public function createReport(Transaksi $transaksi)
    {
        return $transaksi;
    }

    public function history(LaporanPelanggan $Laporan)
    {
        return view('myDashboard.pages.pelanggan.laporan.History', [
            'laporan' => LaporanPelanggan::whereDate('send_at', date('Y-m-d'))->get(),
        ]);
    }
}
