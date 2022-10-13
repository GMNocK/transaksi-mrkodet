<?php

namespace App\Http\Controllers;

use App\Models\LaporanPelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function index()
    {
        return view('dashboard.transaksi.report.index');
    }

    
    public function create()
    {
        return view('dashboard.transaksi.report.create');
    }

    
    public function store(Request $request)
    {
        return $request['hidden'];
    }

    
    public function show(LaporanPelanggan $laporanPelanggan)
    {
        //
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
        //
    }
}
