<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class DashboardTransController extends Controller
{
    
    public function index()
    {
        // return Transaksi::where('pelanggan_id', auth()->user()->id)->get();
        $userLevel = auth()->user()->level;
        if ($userLevel == 'karyawan' || $userLevel == 'Admin') {
            return view('dashboard.transaksi.index', [
                'transaksis' => Transaksi::orderBy('tgl_transaksi','desc')->with(['pelanggan.user'])->get(),
                // 'pelanggans' => Pelanggan::all()
            ]); 
        }
        if ($userLevel == 'costumer') {            
            return view('dashboard.transaksi.index', [
                'transaksis' => Transaksi::where('pelanggan_id', auth()->user()->id)->get(),
                'pelanggans' => Pelanggan::all()
            ]);
        }
        return abort(403);
    }

    
    public function create()
    {
        $this->authorize('karyawan');
        return view('dashboard.transaksi.create', [
            'pelanggans' => Pelanggan::all(),
            'barangs' => Barang::all()
        ]);
    }

    
    public function store(Request $request)
    {
        // return $request;
        $this->authorize('karyawan');
        $validateData = $request->validate([
            'tgl_transaksi' => 'required|date',
            'pelanggan_id' => 'required',
            'total_harga' => 'required|min:4'
        ]);
        
        $validateData['oleh'] = auth()->user()->username; // isi dengan nama dari tabel pelanggan
        $validateData['token'] = password_hash($validateData['tgl_transaksi'], PASSWORD_DEFAULT);

        $validateData['token'] = Str::limit($validateData['token'], 16, '');        
        $validateData['token'] = Str::after($validateData['token'], '$2y$10$');
        $validateData['token'] = Str::before($validateData['token'], '/');

        Transaksi::create($validateData);


        return $request;


        // return redirect('/dashboard/transaksis/');


        // Note Ini harus input ke detail transaksi juga, caranya lewat form, select nama barang -> total nya berapa. nanti di generate total harga nya. sebelum itu harus ada tabel barang dulu. biar nanti barangnya ngambil dari tabel barang, di tabel detail transaksi field nama barangnya ilangin, ganti  foreign ke tabel barang. balik lagi. buat nama barang yang dipilih bakalan di input ke detail transaksi dengan id barang sekalian sama jumlah yang dibelinya. input ini ke tabel detail transaksi, kalau input ke tabel transaksinya tgl nya di input di form awal, pengguna idnya juga sama, total harga dari yang awal jumlah dari sum(harga barang * jumlah) oleh nya sama kaya syntax yang udah ada. 

        // KARENA TOTAL HARGANYA UDAH PASTI SAMA HASIL DARI JUMLAH HARGA DETAIL TRANASKSI, SEKARANG SUDAH BISA DIGUNAKAN DI FUNCTION SHOW
    }

    
    public function show(Transaksi $transaksi)
    {        
        // -------------------------- DISINI ----------------------------
        // return $transaksi->detail_transaksi;
        return view('dashboard.transaksi.detail', [
            'transaksi' => $transaksi,
            'transaksis' => Transaksi::with(['Pelanggan','Detail_transaksi'])->where('token', $transaksi->token)->get(),
            'pelanggans' => Pelanggan::all()
        ]);
        
    }

    
    public function edit(Transaksi $transaksi)
    {
        $this->authorize('karyawan');
        return view('dashboard.transaksi.edit', [
            'transaksis' => $transaksi,
            'pelanggans' => Pelanggan::all(),
            'barangs' => Barang::all()
        ]);
        
    }

    
    public function update(Request $request, Transaksi $transaksi)
    {
        $this->authorize('karyawan');
        $validateData = $request->validate([
            'tgl_transaksi' => 'required|date',
            'pelanggan_id' => 'required',
            'total_harga' => 'required|min:4'
        ]);
        $validateData['token'] = $transaksi->token;

        $transaksi->update($validateData);

        return redirect('/dashboard/transaksis/')->with('succes','Update berhasil');
    }

    
    public function destroy(Transaksi $transaksi)
    {
        $this->authorize('karyawan');
        Transaksi::destroy($transaksi->id);

        return redirect('/dashboard/transaksis/');

    }
}
