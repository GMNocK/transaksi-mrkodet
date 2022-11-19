<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeedbackKaryawan;
use App\Models\Karyawan;
use App\Models\LaporanPelanggan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
     public function pelangganReport()
     {
         return view('myDashboard.pages.karyawan.LPelanggan.Lpelanggan', [
            'laporanpelanggans' => LaporanPelanggan::orderBy('send_at', 'desc')->with('pelanggan')->paginate(4),
         ]);
     }

     public function replyPelangganR(Request $request, LaporanPelanggan $laporanPelanggan)
     {
         return view('myDashboard.pages.karyawan.LPelanggan.reply', [
            'laporanpelanggan' => $laporanPelanggan
         ]);
     }

     public function StoreReply(Request $request)
     {
        $validateData = $request->validate([
            'body' => 'required',
            'lp' => 'required'
        ]);

        $karyawan = Karyawan::where('user_id', auth()->user()->id)->get('id')[0];

        $feedback = new FeedbackKaryawan([
            'body' => $validateData['body'],
            'karyawan_id' => $karyawan->id,
            'laporan_pelanggan_id' => $validateData['lp'],
        ]);

        $feedback->save();

        return redirect('/laporanPelanggan')->with('balasBerhasil', 'Berhasil memberi Balasan');
     }
}
