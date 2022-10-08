<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Controllers\Controller;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class DashboardTransController extends Controller
{
    
    public function index()
    {
        
        return view('dashboard.transaksi.index', [
            'transaksis' => transaksi::where('pelanggan_id', auth()->user()->id)->get(),
            'pelanggans' => pelanggan::all()
        ]); 
    }

    
    public function create()
    {
        return view('dashboard.transaksi.create', [
            'pelanggans' => pelanggan::all()
        ]);
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tgl_transaksi' => 'required|date',
            'pelanggan_id' => 'required',
            'total_harga' => 'required|min:4'
        ]);
        $validateData['oleh'] = auth()->user()->username; // isi dengan nama dari tabel pelanggan
        $validateData['token'] = password_hash($validateData['tgl_transaksi'], PASSWORD_DEFAULT);

        $validateData['token'] = Str::limit($validateData['token'], 16, '');        
        $validateData['token'] = Str::after($validateData['token'], '$2y$10$');
        // ka12lk21 /3asd
        $validateData['token'] = Str::before($validateData['token'], '/');

        transaksi::create($validateData);

        return redirect('/dashboard/transaksis/');


        // Note Ini harus input ke detail transaksi juga, caranya lewat form, select nama barang -> total nya berapa. nanti di generate total harga nya. sebelum itu harus ada tabel barang dulu. biar nanti barangnya ngambil dari tabel barang, di tabel detail transaksi field nama barangnya ilangin, ganti  foreign ke tabel barang. balik lagi. buat nama barang yang dipilih bakalan di input ke detail transaksi dengan id barang sekalian sama jumlah yang dibelinya. input ini ke tabel detail transaksi, kalau input ke tabel transaksinya tgl nya di input di form awal, pengguna idnya juga sama, total harga dari yang awal jumlah dari sum(harga barang * jumlah) oleh nya sama kaya syntax yang udah ada. 

        // KARENA TOTAL HARGANYA UDAH PASTI SAMA HASIL DARI JUMLAH HARGA DETAIL TRANASKSI, SEKARANG SUDAH BISA DIGUNAKAN DI FUNCTION SHOW
    }

    
    public function show(transaksi $transaksi)
    {
        // -------------------------- DISINI ----------------------------
        
        return view('dashboard.transaksi.detail', [
            'transaksis' => transaksi::where('id', $transaksi->id)->get(),
            'pelanggans' => pelanggan::all()
        ]);
        
    }

    
    public function edit(transaksi $transaksi)
    {
        return view('dashboard.transaksi.edit', [
            'transaksis' => $transaksi,
            'pelanggans' => pelanggan::all()
        ]);
    }

    
    public function update(Request $request, transaksi $transaksi)
    {
        $validateData = $request->validate([
            'tgl_transaksi' => 'required|date',
            'pelanggan_id' => 'required',
            'total_harga' => 'required|min:4'
        ]);
        $validateData['token'] = $transaksi->token;

        transaksi::where('id', $transaksi->id)
                    ->update($validateData);

        return redirect('/dashboard/transaksis/')->with('succes','Update berhasil');
    }

    
    public function destroy(transaksi $transaksi)
    {
        transaksi::destroy($transaksi->id);

        return redirect('/dashboard/transaksis/');

    }
}
