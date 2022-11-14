<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekapPesananController extends Controller
{
    
    public function index()
    {
        // return Pesanan::whereDate('waktu_pesan', date('Y-m-d'))->get();
        return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
            'pesanan' => Pesanan::whereDate('waktu_pesan', date('Y-m-d'))->paginate(5),
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