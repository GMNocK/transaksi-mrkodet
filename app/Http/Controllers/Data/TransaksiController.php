<?php

namespace App\Http\Controllers\Data;

use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Detail_transaksi;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{

    public function index()
    {
        $userLevel = auth()->user()->level;

        if ($userLevel == 'pelanggan') {
            return redirect(route('myDashboard'));
        }

        if ($userLevel == 'karyawan' || $userLevel == 'Admin') {
            return view('myDashboard.pages.karyawan.dataTransaksi.dataTransaksi', [
                'transaksis' => Transaksi::orderBy('created_at','desc')->with(['pelanggan.user'])->paginate(10),
            ]); 
        }        

        return abort(403);
    }

    
    public function create()
    {
        $this->authorize('karyawan');
        return view('myDashboard.pages.karyawan.dataTransaksi.createTrans', [
            'pelanggans' => Pelanggan::all(),
            'barangs' => Barang::all(),
        ]);
    }

    
    public function store(Request $request)
    {
        $this->authorize('karyawan');

        $ini = $request->PanjangtblKeranjang;
        $panjang = Str::afterLast($ini, ',');
        $validateData = $request->validate([
            'TotalBayar' => 'required|min:2',
            'status' => 'required',
            'tipe_bayar' => 'required',
            'PanjangtblKeranjang' => 'required',            
        ]);
        // return $request;
        $tanggal = now()->format('Y-m-d H-i-s');
        
        $token = password_hash($tanggal, PASSWORD_DEFAULT);
        
        $token = Str::limit($token, 16, '');        
        $token = Str::after($token, '$2y$10$');
        $token = Str::before($token, '/');        
        
        
        // MASUK KE DB TRANSAKSI
        $transaksi = new Transaksi([
            'pesanan' => false,
            'tgl_transaksi' => $tanggal,
            'total_harga' => Str::after($validateData['TotalBayar'],'.'),
            'status' => $validateData['status'],
            'tipe_bayar' => $validateData['tipe_bayar'],
            'pencatat' => auth()->user()->username,     // Diambil Dari yang sedang login
            'token' => $token,
        ]);

        $transaksi->save();
        
        for ($i=1; $i <= $panjang; $i++) { 

            $nambar = 'BR'.$i;
            $har = 'harga'.$i;
            $ukuran = 'ukuran'.$i;
            $jumlah = 'jumlah'.$i;
            $subtotal = 'subtotal'.$i;

            // MASUK KE DETAIL TRANSAKSI
            $transaksiId = Transaksi::orderByDesc('id')->limit(1)->get('id');

            // echo $request->$subtotal . $har . $ukuran . $jumlah . $subtotal
            
            if ($request->$nambar != '') {

                $barangId = Barang::where('nama_barang', $request->$nambar)->get('id');
                $hargaSatuan = Str::after($request->$har, 'Rp.');
                $ukurandb = Str::after($request->$ukuran, 'Rp.');
                $subtotaldb = Str::after($request->$subtotal, 'Rp.');


                $detailTransaksi = new Detail_transaksi([
                    'transaksi_id' => $transaksiId[0]->id,
                    'barang_id' => $barangId[0]->id,
                    'harga_satuan' => $hargaSatuan,
                    'ukuran' => $ukurandb,
                    'jumlah' => $request->$jumlah,
                    'subtotal' => $subtotaldb,
                ]);

                $detailTransaksi->save();

            }                    
        }

        return redirect('/transaksi');
    }

    
    public function show(Transaksi $transaksi)
    {
        $pesanan = Pesanan::where('id', $transaksi->pesanan_id)->get();
        // return $pesanan;
        $totalharga = DB::select("select concat('Rp.',format(total_harga,0)) as hargaTotal FROM `transaksis` where id = ?", [$transaksi->id]);        

        $detail = DB::select("select concat('Rp.',format(subtotal,0)) as apa from detail_transaksis where transaksi_id = ?", [$transaksi->id]);
        // return $detail;
        return view('myDashboard.pages.karyawan.dataTransaksi.detailtrans', [
            'transaksi' => $transaksi,
            'pesanan' => $pesanan,
            'hargaTotal' => $totalharga[0]->hargaTotal,
            'detail' => Detail_transaksi::where('transaksi_id' , $transaksi->id)->paginate(5),
        ]);
    }

    
    public function edit(Transaksi $transaksi)
    {
        $this->authorize('karyawan');
        $detailTransaksi = Detail_transaksi::where('transaksi_id', $transaksi->id)->get();
        // return $transaksi->pelanggan;
        return view('myDashboard.pages.karyawan.dataTransaksi.Tedit', [
            'transaksis' => $transaksi,
            'pelanggans' => Pelanggan::all(),
            'barangs' => Barang::all(),
            'detailtransaksis' => $detailTransaksi,
        ]);
    }

    
    public function update(Request $request, Transaksi $transaksi)
    {
        return $request;
    }

    
    public function destroy(Transaksi $transaksi)
    {
        $this->authorize('karyawan');
        Transaksi::destroy($transaksi->id);

        return redirect('/transaksi')->with('successDelete', 'Data Berhasil Dihapus');

    }

    public function lihatTransaksi(Request $request, Pesanan $pesanan)
    {
        $pesanan =Pesanan::where('id', $request->id)->get()[0];

        $transaksi = Transaksi::where('pesanan_id', $request->id)->get()[0];
        $totalharga = DB::select("select concat('Rp.',format(total_harga,0)) as hargaTotal FROM `transaksis` where id = ?", [$transaksi->id])[0];

        return view('myDashboard.pages.karyawan.dataTransaksi.detailtrans', [
            'transaksi' => $transaksi,
            'pesanan' => $pesanan,
            'hargaTotal' => $totalharga->hargaTotal,
            'detail' => Detail_transaksi::where('transaksi_id' , $transaksi->id)->paginate(10),
        ]);
    }
}
