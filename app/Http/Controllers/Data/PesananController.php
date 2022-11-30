<?php

namespace App\Http\Controllers\Data;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;
use App\Models\Barang;
use App\Models\bukti_bayar_pesanan;
use App\Models\Detail_Pesanan;
use App\Models\Detail_transaksi;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LengthException;

class PesananController extends Controller
{
    
    public function index()
    {
        if (auth()->user()->level != 'pelanggan') {
            // $itu = Pesanan::where('pelanggan_id', 18)->get();
            // return $itu[0];
            return view('myDashboard.pages.karyawan.pesanan.daftarPesanan', [
                'pesanan' => Pesanan::orderByDesc('bukti')->orderBy('waktu_pesan', 'desc')->orderBy('status', 'asc')->paginate(10),
                // 'waktuPesan' => $ini[0]
            ]);
        }
        $pelangganId = Pelanggan::where('user_id', auth()->user()->id)->get('id');
        // return $pelangganId[0]->id;
        return view('myDashboard.pages.pelanggan.pesanan.pesan', [
            'pesananSaya' => Pesanan::where('pelanggan_id', $pelangganId[0]->id)->orderBy('waktu_pesan', 'desc')->get(),
        ]);
    }

    
    public function create()
    {
        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->get()[0];

        if ($pelanggan->alamat == '' || $pelanggan->no_tlp == '') {
            return redirect('/pesananSaya')->with('IsNull', 'Identitas Kosong');   //'Maaf, Pemesanan tidak bisa dilakukan. Silahkan isi identitas lengkap di profile anda');
        }

        return view('myDashboard.pages.pelanggan.pesanan.formPemesanan', [
            'barangs' => Barang::paginate(3),
        ]);
    }

    
    public function store(StorePesananRequest $request)
    {
        $this->authorize('pelanggan');

        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->get()[0];

        if ($pelanggan->alamat == '' || $pelanggan->no_tlp == '') {
            return redirect('/pesanan/create')
                        ->with('IsNull', 'Identitas Kosong');   //'Maaf, Pemesanan tidak bisa dilakukan. Silahkan isi identitas lengkap di profile anda');
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

        $pelangganId = $pelanggan->id;
        
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
            'waktu_pesan' => now(),
            'pelanggan_id' => $pelangganId,  
            'total_harga' => Str::after($validateData['TotalBayar'],'.'),
            'tipe_kirim' => $validateData['tipePengiriman'],
            'tipePembayaran' => $validateData['tipe_bayar'],
            'kode' => $kode,    
            'keterangan' => $request->ketTam,   
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
        $transaksi_cek = 'ada';

        $cek_trans = Transaksi::where('pesanan_id', $pesanan->id)->get()->count();
        if ($cek_trans == 0) {
            $transaksi_cek = 0;
        }
        if (auth()->user()->level != 'pelanggan') {

            if ($pesanan->status == '1') {
                $status = ['status' => 2];
                $pesanan->update($status);
            }

            return view('myDashboard.pages.karyawan.pesanan.detailPesan', [
                'pesanan' => $pesanan,
                'detail' => Detail_Pesanan::where('pesanan_id', $pesanan->id)->get(),
                'trans_cek' => $transaksi_cek,
            ]);
        }

        return view('myDashboard.pages.pelanggan.pesanan.Pdetail', [
            'pesanan' => $pesanan,
            'trans_cek' => $transaksi_cek,
            'detailPesanan' => Detail_Pesanan::where('pesanan_id', $pesanan->id)->get(),
        ]);
    }

    public function edit(Pesanan $pesanan)
    {
        return view('myDashboard.pages.pelanggan.pesanan.Pedit' ,[
            'pesanan' => $pesanan,
            'barangs' => Barang::all()
        ]);
    }

    
    public function update(UpdatePesananRequest $request, Pesanan $pesanan)
    {
        return $pesanan;
    }

    
    public function destroy(Pesanan $pesanan)
    {
        Pesanan::destroy($pesanan->id);

        return redirect('/pesananSaya')->with('deleted', 'Pesanan Berhasil Dihapus');
    }

    public function history()
    {
        return view('myDashboard.pages.pelanggan.pesanan.historyPesan', [
            'pesananSaya' => Pesanan::whereDate('waktu_pesan', date('Y-m-d'))->get(),
        ]);
    }

    
    public function batal(Pesanan $pesanan)
    {
        $status = array('status' => 0);

        $pesanan->update($status);

        return redirect('/pesananSaya')->with('batal', 'Pesanan Berhasil Dibatalkan');
    }


    public function KaryawanAccept(Request $request, Pesanan $pesanan)
    {
        $status = 3;

        if ($request->stat == '4') {
            $status = 4;
        }

        $update = array('status' => $status);

        $pesanan->update($update);
        // Terima Kasih, Pesanan Anda kami terima. pemberitahuan lebih lanjut akan kami hubungi lewat whatsapp
        return redirect(route('pesananPelanggan.index'))->with('berhasil', 'Pesanan telah diterima');
    }

    public function KarAcceptProgress(Request $request, Pesanan $pesanan)
    {
        $status = 4;

        if ($request->stat == '4') {
            $status = 4;
        }

        $update = array('status' => $status);

        $pesanan->update($update);

        // Terima Kasih, Pesanan Anda kami terima. pemberitahuan lebih lanjut akan kami hubungi lewat whatsapp
        return redirect(route('pesananPelanggan.index'))->with('terimaProgress', 'Pesanan Dalam Proses Pembuatan');
    }

    public function tandaiKirimOrSelesai(Request $request, Pesanan $pesanan)
    {
        $status = 5;

        if ($request->finish) {
            $status = 6;
            // $trans = 'ok';
        }

        // $updt_trans = array('pesanan_id' => $pesanan->id);
        $update = array('status' => $status);
        
        $pesanan->update($update);

        // Terima Kasih, Pesanan Anda kami terima. pemberitahuan lebih lanjut akan kami hubungi lewat whatsapp
        if ($status == 5) {            
            return redirect(route('pesananPelanggan.index'))->with('Dikirim', 'Pesanan Dalam Proses Pengiriman');
        } else {
            return redirect(route('pesananPelanggan.index'))->with('selesai', 'Pesanan Selesai');
        }
    }

    public function transIntegration(Pesanan $pesanan)
    {
        $tgl = Str::limit($pesanan->waktu_pesan, 10, '');
        
        $detailPesanan = Detail_Pesanan::where('pesanan_id', $pesanan->id)->get();
        
        $karyawan = Karyawan::where('user_id' , auth()->user()->id)->get()[0]->nama;

        $transaksi = new Transaksi([
            'pesanan_id' => $pesanan->id,
            'tgl_transaksi' => $tgl,
            'total_harga' => $pesanan->total_harga,
            'status' => 'lunas',
            'tipe_bayar' => $pesanan->tipePembayaran,
            'pencatat' => $karyawan,
            'token' => Str::random(10),
        ]);

        $transaksi->save();

        $id_trans = Transaksi::orderByDesc('id')->limit(1)->get()[0]->id;

        for ($i=0; $i < ($detailPesanan->count()); $i++) {
            
            $detail_trans = new Detail_transaksi([
                'transaksi_id' => $id_trans,
                'barang_id' => $detailPesanan[$i]->barang_id,
                'harga_satuan' => $detailPesanan[$i]->hargaPerKg,
                'ukuran' => $detailPesanan[$i]->ukuran,
                'jumlah' => $detailPesanan[$i]->jumlahPesan,
                'subtotal' => $detailPesanan[$i]->subtotal,
            ]);

            $detail_trans->save();
        }

        return redirect(route('transaksi.index'))->with('integrasi', 'Integrasi Berhasil');
    }

    public function upload(Pesanan $pesanan ,Request $request)
    {
        $validateData = $request->validate([
            'buktiBayar' => 'required|file|image',
        ]);
        $validateData['buktiBayar'] = $request->file('buktiBayar')->store('bukti-bayar');

        $bukti['bukti'] = true;

        $pesanan->update($bukti);
        
        $bukti_bayar_pesanan = new bukti_bayar_pesanan([
            'pesanan_id' => $pesanan->id,
            'bukti_bayar' => $validateData['buktiBayar'],
        ]);

        $bukti_bayar_pesanan->save();

        return redirect('/pesananSaya')->with('bukti', 'Bukti pembayaran terkirim');
    }
}
