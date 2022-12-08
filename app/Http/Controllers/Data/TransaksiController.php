<?php

namespace App\Http\Controllers\Data;

use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Detail_transaksi;
use App\Models\Notification;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransaksiController extends Controller
{

    public function index()
    {
        // NOTIFIKASI
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        $notifUnRead = 0;
        for ($i=0; $i < $banyakNotif->count(); $i++) {
            if ($banyakNotif[$i]->notifRead == '[]') {
                $notifUnRead += 1;
            }
        }
        $messageUnRead = 0;
        for ($i=0; $i < $banyakMessage->count(); $i++) { 
            if ($banyakMessage[$i]->notifRead == '[]') {
                $messageUnRead += 1;
            }
        }

        $userLevel = auth()->user()->level;

        if ($userLevel == 'pelanggan') {
            return redirect(route('myDashboard'));
        }

        if ($userLevel == 'karyawan' || $userLevel == 'Admin') {
            return view('myDashboard.pages.karyawan.dataTransaksi.dataTransaksi', [
                'transaksis' => Transaksi::orderBy('created_at','desc')->with(['pelanggan.user'])->get(),
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]); 
        }        

        return abort(403);
    }

    
    public function create()
    {
        $this->authorize('karyawan');

        // NOTIFIKASI
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        $notifUnRead = 0;
        for ($i=0; $i < $banyakNotif->count(); $i++) {
            if ($banyakNotif[$i]->notifRead == '[]') {
                $notifUnRead += 1;
            }
        }
        $messageUnRead = 0;
        for ($i=0; $i < $banyakMessage->count(); $i++) { 
            if ($banyakMessage[$i]->notifRead == '[]') {
                $messageUnRead += 1;
            }
        }


        return view('myDashboard.pages.karyawan.dataTransaksi.createTrans', [
            'pelanggans' => Pelanggan::all(),
            'barangs' => Barang::all(),
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
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
        // NOTIFIKASI
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        $notifUnRead = 0;
        for ($i=0; $i < $banyakNotif->count(); $i++) {
            if ($banyakNotif[$i]->notifRead == '[]') {
                $notifUnRead += 1;
            }
        }
        $messageUnRead = 0;
        for ($i=0; $i < $banyakMessage->count(); $i++) { 
            if ($banyakMessage[$i]->notifRead == '[]') {
                $messageUnRead += 1;
            }
        }

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
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function edit(Transaksi $transaksi)
    {
        $this->authorize('karyawan');
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        $notifUnRead = 0;
        for ($i=0; $i < $banyakNotif->count(); $i++) {
            if ($banyakNotif[$i]->notifRead == '[]') {
                $notifUnRead += 1;
            }
        }
        $messageUnRead = 0;
        for ($i=0; $i < $banyakMessage->count(); $i++) { 
            if ($banyakMessage[$i]->notifRead == '[]') {
                $messageUnRead += 1;
            }
        }

        $detailTransaksi = Detail_transaksi::where('transaksi_id', $transaksi->id)->get();
        // return $transaksi->pelanggan;
        return view('myDashboard.pages.karyawan.dataTransaksi.Tedit', [
            'transaksis' => $transaksi,
            'pelanggans' => Pelanggan::all(),
            'barangs' => Barang::all(),
            'detailtransaksis' => $detailTransaksi,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function update(Request $request, Transaksi $transaksi)
    {
        // return $request;
        $validateData = $request->validate([
            'totalHarga' => 'required',
            'status' => 'required',
            'tipe_bayar' => 'required',
        ]);
        
        // Persiapan Data ke transaksi;
        $token = Str::random(10);
        $status = 1;

        // Persiapan Data ke detail transaksi
        $detailCount = Detail_transaksi::where('transaksi_id', $transaksi->id)->get()->count();        

        for ($i=0; $i < $detailCount; $i++) {
            DB::delete('delete from detail_transaksis where transaksi_id = ?', [$transaksi->id]);
        }
        
        // UPDATE KE TABEL TRANSAKSI
        
        $data = [
            'total_harga' => Str::after($validateData['totalHarga'],'.'),
            'status' => $status,
            'tipe_bayar' => $validateData['tipe_bayar'],
            'token' => $token,
        ];
        $transaksi->update($data);

        $tes = 1;
        // MASUK KE DATABASE TABEL DETAIL TRANS
        for ($i=1; $i < $request->panjang ; $i++) {

            $barang = 'BR'.$i;
            $harsat = 'harga'.$i;
            $ukuran = 'ukuran'.$i;
            $jml = 'jumlah'.$i;
            $subtot = 'subtotal'.$i;
            
            if ($request->$barang != '') {
                $tes += 1;
                
                $barangId = Barang::where('nama_barang', $request->$barang)->get('id')[0]->id;

                $detailTransaksi = new Detail_transaksi([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $barangId,
                    'harga_satuan' => Str::after($request->$harsat, '.'),
                    'ukuran' => $request->$ukuran,
                    'jumlah' => $request->$jml,
                    'subtotal' => Str::after($request->$subtot, '.'),
                ]);
        
                $detailTransaksi->save();
            }
        }
        return redirect('/transaksi');
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
