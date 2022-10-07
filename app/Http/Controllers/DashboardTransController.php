<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Controllers\Controller;
use App\Models\pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransController extends Controller
{
    
    public function index()
    {
        
        return view('dashboard.transaksi.index', [
            'transaksis' => transaksi::where('pengguna_id', auth()->user()->id)->get()
        ]);
    }

    
    public function create()
    {
        return view('dashboard.transaksi.create', [
            'penggunas' => pengguna::all()
        ]);
    }

    
    public function store(Request $request)
    {
        $tabel = transaksi::all();

        $validateData = $request->validate([
            'tgl_transaksi' => 'required',
            'pengguna_id' => 'required',
            'total_harga' => 'required'
        ]);
        $validateData['oleh'] = auth()->user()->username; // isi dengan nama dari tabel pelanggan

        transaksi::create($validateData);

        return redirect('/dashboard/transaksis/');
        // Note Ini harus input ke detail transaksi juga, caranya lewat form, select nama barang -> total nya berapa. nanti di generate total harga nya. sebelum itu harus ada tabel barang dulu. biar nanti barangnya ngambil dari tabel barang, di tabel detail transaksi field nama barangnya ilangin, ganti  foreign ke tabel barang. balik lagi. buat nama barang yang dipilih bakalan di input ke detail transaksi dengan id barang sekalian sama jumlah yang dibelinya. input ini ke tabel detail transaksi, kalau input ke tabel transaksinya tgl nya di input di form awal, pengguna idnya juga sama, total harga dari yang awal jumlah dari sum(harga barang * jumlah) oleh nya sama kaya syntax yang udah ada. 

        // KARENA TOTAL HARGANYA UDAH PASTI SAMA HASIL DARI JUMLAH HARGA DETAIL TRANASKSI, SEKARANG SUDAH BISA DIGUNAKAN DI FUNCTION SHOW
    }

    
    public function show(transaksi $transaksi)
    {
        // -------------------------- DISINI ----------------------------
        
        return view('dashboard.transaksi.detail', [
            'transaksis' => $transaksi
        ]);
        
    }

    
    public function edit(transaksi $transaksi)
    {
        //
    }

    
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
