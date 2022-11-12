<?php

namespace App\Http\Controllers\Data;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Barang;

class PesananController extends Controller
{
    
    public function index()
    {
        if (auth()->user()->level == 'karyawan') {
            return view('myDashboard.pages.karyawan.pesanan.daftarPesanan', [
                'pesanan' => Pesanan::all(),
            ]);
        }
        return view('myDashboard.pages.pelanggan.pesanan.pesan', [
            'pesananSaya' => Pesanan::where('pelanggan_id', auth()->user()->id),
        ]);
    }

    
    public function create()
    {
        return view('myDashboard.pages.pelanggan.pesanan.formPemesanan', [
            'barangs' => Barang::paginate(4),
        ]);
    }

    
    public function store(StorePesananRequest $request)
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

    
    public function update(UpdatePesananRequest $request, Pesanan $pesanan)
    {
        //
    }

    
    public function destroy(Pesanan $pesanan)
    {
        //
    }

    public function history()
    {
        return view('myDashboard.pages.pelanggan.pesanan.historyPesan');
    }
}
