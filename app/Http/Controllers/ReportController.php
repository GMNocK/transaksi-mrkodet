<?php

namespace App\Http\Controllers;

use App\Models\LaporanPelanggan;
use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    
    public function index()
    {
        $ul = User::where('id', auth()->user()->id)->get();
        $user = $ul->find('id', auth()->user()->id);

        $string =  Pelanggan::where('user_id', $user)->get();

        $pelangganLogin = $string->find('user_id', $user);

        $ret = LaporanPelanggan::where('pelanggan_id', $pelangganLogin)->get();

        return view('dashboard.transaksi.report.index', [
            'LaporanPelanggans' => $ret, //LaporanPelanggan::where('pelanggan_id', auth()->user())->get(),
        ]);
    }

    
    public function create()
    {
        $usid = User::where('id', auth()->user()->id)->get();
        $useride = $usid->find('id', auth()->user()->id);

        $pelid = Pelanggan::where('user_id', $useride)->get();

        return $pelangganId = $pelid->find('user_id', $useride);
        return LaporanPelanggan::where('pelanggan_id', auth()->user()->id);

        return view('dashboard.transaksi.report.create', [
            'pelanggans' => LaporanPelanggan::where('pelanggan_id', auth()->user()->id),
        ]);
    }

    
    public function store(Request $request)
    {
        return $request;
        return $request['hidden'];
    }

    
    public function show(LaporanPelanggan $laporanPelanggan)
    {
        return "Hai Saya Yukie";
    }


    public function edit(LaporanPelanggan $laporanPelanggan)
    {
        //
    }

    
    public function update(Request $request, LaporanPelanggan $laporanPelanggan)
    {
        //
    }


    public function destroy(LaporanPelanggan $laporanPelanggan)
    {
        return $laporanPelanggan->id;
        // LaporanPelanggan::destroy($laporanPelanggan->id);
    }
}
