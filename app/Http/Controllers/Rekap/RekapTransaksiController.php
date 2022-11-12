<?php

namespace App\Http\Controllers\Rekap;

use App\Models\LaporanKaryawan;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class RekapTransaksiController extends Controller
{
    
    public function index()
    {
        return view('myDashboard.pages.karyawan.Rekap.RTransaksi',[
            'transaksi' => Transaksi::paginate(3),
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

    
    public function show(Laporankaryawan $laporankaryawan)
    {
        //
    }

    
    public function edit(Laporankaryawan $laporankaryawan)
    {
        //
    }

    
    public function update(Request $request, Laporankaryawan $laporankaryawan)
    {
        //
    }


    public function destroy(Laporankaryawan $laporankaryawan)
    {
        //
    }
}
