<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LaporanPelanggan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
     public function pelangganReport()
     {
         return view('dashboard.karyawan.laporanpelanggan.index', [
            'laporanpelanggans' => LaporanPelanggan::orderBy('send_at', 'desc')->with('pelanggan')->paginate(3),
         ]);
     }

     public function replyPelangganR(Request $request, LaporanPelanggan $laporanPelanggan)
     {
         // return $laporanPelanggan;
         return view('dashboard.karyawan.laporanpelanggan.reply', [
            'laporanpelanggan' => $laporanPelanggan
         ]);
     }
}
