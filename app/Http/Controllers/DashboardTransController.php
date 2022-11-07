<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Detail_transaksi;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use LengthException;

class DashboardTransController extends Controller
{
    
    public function index()
    {
        $userLevel = auth()->user()->level;
        if ($userLevel == 'karyawan' || $userLevel == 'Admin') {
            return view('dashboard.transaksi.index', [
                'transaksis' => Transaksi::orderBy('tgl_transaksi','desc')->with(['pelanggan.user'])->paginate(10),
            ]); 
        }
        if ($userLevel == 'costumer') {            
            $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->get();

            return view('dashboard.transaksi.index', [
                'transaksis' => Transaksi::where('pelanggan_id', $pelanggan[0]->id)->paginate(10),
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
            'pelanggan_id' => 'required',
            'tanggal' => 'required|date',
            'TotalBayar' => 'required|min:2',
            'status' => 'required',
            'tipe_bayar' => 'required',
        ]);
        
        // return $validateData['TotalBayar'];

        $validateData['pencatat'] = auth()->user()->username; // isi dengan nama dari tabel pelanggan
        $validateData['token'] = password_hash($validateData['tanggal'], PASSWORD_DEFAULT);

        $validateData['token'] = Str::limit($validateData['token'], 16, '');        
        $validateData['token'] = Str::after($validateData['token'], '$2y$10$');
        $validateData['token'] = Str::before($validateData['token'], '/');        

        $transaksi = new Transaksi([
            'pelanggan_id' => $validateData['pelanggan_id'],
            'tgl_transaksi' => $validateData['tanggal'],
            'total_harga' => $validateData['TotalBayar'],
            'status' => $validateData['status'],
            'tipe_bayar' => $validateData['tipe_bayar'],
            'pencatat' => $validateData['pencatat'],
            'token' => $validateData['token'],
        ]);

        $transaksi->save();

        // MASUK KE DETAIL TRANSAKSI
        $transaksiId = Transaksi::orderByDesc('id')->limit(1)->get('id');
        // return $transaksi[0]->id;    

        for ($i=1; $i <= 20; $i++) { 

            $nambar = 'BR'.$i;
            $har = 'harga'.$i;
            $ukuran = 'ukuran'.$i;
            $jumlah = 'jumlah'.$i;
            $subtotal = 'subtotal'.$i;

            
            if ($request->$subtotal != 0 && $request->$subtotal != '') {
                $barangId = Barang::where('nama_barang', $request->$nambar)->get('id');
                
                $detailTransaksi = new Detail_transaksi([
                    'transaksi_id' => $transaksiId[0]->id,
                    'barang_id' => $barangId[0]->id,
                    'harga_satuan' => $request->$har,
                    'ukuran' => $request->$ukuran,
                    'jumlah' => $request->$jumlah,
                    'subtotal' => $request->$subtotal,
                ]);

                $detailTransaksi->save();
            }                    
        }


        return redirect('/dashboard/transaksis/');


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
        $detailTransaksi = Detail_transaksi::where('transaksi_id', $transaksi->id)->get();

        return view('dashboard.transaksi.edit', [
            'transaksis' => $transaksi,
            'pelanggans' => Pelanggan::all(),
            'barangs' => Barang::all(),
            'detailtransaksis' => $detailTransaksi,
        ]);
        
    }

    
    public function update(Request $request, Transaksi $transaksi)
    {
        return $request;
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

        return redirect('/dashboard/transaksis/')->with('successDelete', 'Berhasil Dihapus');

    }
}
