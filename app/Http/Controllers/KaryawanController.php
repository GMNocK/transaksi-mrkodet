<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeedbackKaryawan;
use App\Models\Karyawan;
use App\Models\LaporanPelanggan;
use App\Models\Notification;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
     public function pelangganReport()
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

         return view('myDashboard.pages.karyawan.LPelanggan.Lpelanggan', [
            'laporanpelanggans' => LaporanPelanggan::orderBy('send_at', 'desc')->with('pelanggan')->paginate(4),
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
         ]);
     }

     public function replyPelangganR(Request $request, LaporanPelanggan $laporanPelanggan)
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

         return view('myDashboard.pages.karyawan.LPelanggan.reply', [
            'laporanpelanggan' => $laporanPelanggan,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
         ]);
     }

     public function StoreReply(Request $request)
     {
        $validateData = $request->validate([
            'body' => 'required',
            'lp' => 'required'
        ]);

        $karyawan = Karyawan::where('user_id', auth()->user()->id)->get('id')[0];

        // $feedback = new FeedbackKaryawan([
        //     'body' => $validateData['body'],
        //     'karyawan_id' => $karyawan->id,
        //     'laporan_pelanggan_id' => $validateData['lp'],
        // ]);

        // $feedback->save();

        $message = new Notification([
            'title' => $validateData['body'],
            'detail' => $validateData['body'],
            'potongan' => $validateData['body'],
            'user_id' => $validateData['lp'],
        ]);

        $message->save();
        return redirect('/laporanPelanggan')->with('balasBerhasil', 'Berhasil memberi Balasan');
     }
}
