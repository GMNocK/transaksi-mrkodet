<?php

namespace App\Http\Controllers\Data;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Barang;
use App\Models\Detail_Pesanan;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    
    public function index()
    {
        if (auth()->user()->level != 'pelanggan') {
            // $itu = Pesanan::where('pelanggan_id', 18)->get();
            // return $itu[0];
            return view('myDashboard.pages.karyawan.pesanan.daftarPesanan', [
                'pesanan' => Pesanan::all(),
                // 'waktuPesan' => $ini[0]
            ]);
        }
        $pelangganId = Pelanggan::where('user_id', auth()->user()->id)->get('id');
        // return $pelangganId[0]->id;
        return view('myDashboard.pages.pelanggan.pesanan.pesan', [
            'pesananSaya' => Pesanan::where('pelanggan_id', $pelangganId[0]->id)->get(),
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
        $this->authorize('pelanggan');

        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->get();

        if ($pelanggan[0]->alamat == '' || $pelanggan[0]->no_tlp == '') {
            return redirect('/pesanan/create')
                        ->with('IsNull', 'Identitas Kosong');//'Maaf, Pemesanan tidak bisa dilakukan. Silahkan isi identitas lengkap di profile anda');
        }

        $validateData = $request->validate([
            'TotalBayar' => 'required|min:2',
            'tipePengiriman' => 'required',
            'tipe_bayar' => 'required',
            'PanjangtblKeranjang' => 'required',
        ]);
        // return $request->toArray();
        if ($validateData['PanjangtblKeranjang'] == [] || $request->TotalBayar == 'Rp.0') {
            return redirect('/pesanan/create')
                    ->with('IsNull', 'Identitas Kosong');
        }

        $pelangganId = $pelanggan[0]->id;
        
        // Diambil Dari pelanggan yang sedang login


        $ini = $request->PanjangtblKeranjang;
        $panjang = Str::afterLast($ini, ',');
        
        // return $request;
        // $tanggal = now()->format('Y-m-d H-i-s');
        
        // use password_hash To create a Random Kode
        $kode = Hash::make(Str::random(10));
        $kode = Str::limit($kode, 18, '');
        $kode = Str::after($kode, '$2y$10$');
        $kode = Str::before($kode, '/'); 
        
        // MASUK KE DB TRANSAKSI
        $pesanan = new Pesanan([
            'pelanggan_id' => $pelangganId,  
            'total_harga' => Str::after($validateData['TotalBayar'],'.'),
            'tipe_kirim' => $validateData['tipePengiriman'],
            'tipePembayaran' => $validateData['tipe_bayar'],
            'kode' => $kode,
        ]);

        $pesanan->save();
        
        for ($i=1; $i <= $panjang; $i++) {

            $nambar = 'BR'.$i;
            $har = 'harga'.$i;
            $ukuran = 'ukuran'.$i;
            $jumlah = 'jumlah'.$i;
            $subtotal = 'subtotal'.$i;

            // MASUK KE DETAIL TRANSAKSI
            $pesananId = Pesanan::orderByDesc('id')->limit(1)->get('id');

            // echo $request->$subtotal . $har . $ukuran . $jumlah . $subtotal
            
            if ($request->$nambar != '') {

                $barangId = Barang::where('nama_barang', $request->$nambar)->get('id');
                $hargaSatuan = Str::after($request->$har, 'Rp.');
                $ukurandb = Str::after($request->$ukuran, 'Rp.');
                $subtotaldb = Str::after($request->$subtotal, 'Rp.');

                $detailPesanan = new Detail_Pesanan([
                    'pesanan_id' => $pesananId[0]->id,
                    'barang_id' => $barangId[0]->id,
                    'hargaPerKg' => $hargaSatuan,
                    'ukuran' => $ukurandb,
                    'jumlahPesan' => $request->$jumlah,
                    'subtotal' => $subtotaldb,
                ]);

                $detailPesanan->save();

            }

        }

        return redirect('/pesananSaya');

    }

    public function show(Pesanan $pesanan)
    {
        // $ini[] = Detail_Pesanan::where('pesanan_id', $pesanan->id)->get();
        // return $ini.toArray();
        if (auth()->user()->level != 'pelanggan') {
            return view('myDashboard.pages.karyawan.pesanan.detailPesan', [
                'pesanan' => $pesanan,
                'detail' => Detail_Pesanan::where('pesanan_id', $pesanan->id)->get()
            ]);
        }
        // return Detail_Pesanan::where('pesanan_id', $pesanan->id)->get();
        return view('myDashboard.pages.pelanggan.pesanan.Pdetail', [
            'pesanan' => $pesanan,
            'detailPesanan' => Detail_Pesanan::where('pesanan_id', $pesanan->id)->get(),
        ]);
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
