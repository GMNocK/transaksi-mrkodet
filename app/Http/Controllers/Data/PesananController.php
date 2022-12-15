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
use App\Models\Notification;
use App\Models\Pelanggan;
use App\Models\pengirim;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    
    public function index()
    {
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

        if (auth()->user()->level != 'pelanggan') {
            // $itu = Pesanan::where('pelanggan_id', 18)->get();
            // return $itu[0];
            return view('myDashboard.pages.karyawan.pesanan.daftarPesanan', [
                'pesanan' => Pesanan::orderBy('status', 'desc')->orderBy('waktu_pesan', 'desc')->orderByDesc('bukti')->paginate(15),
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
            ]);
        }
        $pelangganId = Pelanggan::where('user_id', auth()->user()->id)->get('id');
        // return $pelangganId[0]->id;
        return view('myDashboard.pages.pelanggan.pesanan.pesan', [
            'pesananSaya' => Pesanan::where('pelanggan_id', $pelangganId[0]->id)->orderByDesc('status')->orderBy('waktu_pesan', 'desc')->orderByDesc('bukti')->get(),
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function create()
    {
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

        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->get()[0];

        if ($pelanggan->alamat == '' || $pelanggan->no_tlp == '') {
            return redirect('/pesananSaya')->with('IsNull', 'Identitas Kosong');   //'Maaf, Pemesanan tidak bisa dilakukan. Silahkan isi identitas lengkap di profile anda');
        }

        return view('myDashboard.pages.pelanggan.pesanan.formPemesanan', [
            'barangs' => Barang::paginate(3),
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function store(StorePesananRequest $request)
    {
        $this->authorize('pelanggan');

        // Diambil Dari pelanggan yang sedang login
        $pelanggan = Pelanggan::where('user_id', auth()->user()->id)->get()[0];
        $pelangganId = $pelanggan->id;

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

        if ($validateData['PanjangtblKeranjang'] == [] || $request->TotalBayar == 'Rp.0') {
            return redirect('/pesanan/create')
                    ->with('IsNull', 'Identitas Kosong');
        }

        $ini = $request->PanjangtblKeranjang;
        $panjang = Str::afterLast($ini, ',');
        
        // use STR Random To create a Random Kode
        $kode = Str::random(18);

        // use password_hash To create a Random Kode
        // $kode = Hash::make(Str::random(18));
        // $kode = Str::limit($kode, 18, '');
        // $kode = Str::after($kode, '$2y$10$');
        // $kode = Str::before($kode, '/'); 
        
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
        
        $pesananId = Pesanan::orderByDesc('id')->limit(1)->get('id');
        for ($i=1; $i <= $panjang; $i++) {

            $nambar = 'BR'.$i;
            $har = 'harga'.$i;
            $ukuran = 'ukuran'.$i;
            $jumlah = 'jumlah'.$i;
            $subtotal = 'subtotal'.$i;

            // MASUK KE DETAIL TRANSAKSI
            
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

        $detailNotif = 'Pesanan Telah dibuat, tunggu informasi lebih lanjut melalui notifikasi via email';

        $notif = new Notification([
            'title' => 'Pesanan Dibuat',
            'detail' => $detailNotif,
            'potongan' => 'Pesanan Telah dibuat, tunggu informasi lebih ...',
            'user_id' => auth()->user()->id,
            'kategori_notif_id' => 1,
            'pesanan_id' => $pesananId[0]->id,
        ]);

        $notif->save();

        $isi = 'Pelaggan dengan username ' . auth()->user()->username . ' Telah melalukan pesanan, cek pesanan melalui link dibawah';
        
        $Karyawan = User::where('level', 'karyawan')->get();

        for ($i=0; $i < $Karyawan->count(); $i++) {             
            $notifToKar = new Notification([
                'title' => 'Pesanan Baru' .auth()->user()->username,
                'detail' => $isi,
                'potongan' => Str::limit($isi, 30, ' ...'),
                'kategori_notif_id' => 1,
                'user_id' => $Karyawan[$i]->id,
                'pesanan_id' => $pesananId[0]->id,
                'pelanggan_id' => $pelangganId,
            ]);
    
            $notifToKar->save();
        }

        return redirect('/pesananSaya')->with('memesan', 'Berhasil Memesan, Tunggu informasi selanjutnya');

    }

    public function show(Pesanan $pesanan)
    {
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

        $cek_trans = Transaksi::where('pesanan_id', $pesanan->id)->get();
        $transaksi = $cek_trans;
        if ($cek_trans->count() == 0) {
            $transaksi_cek = 0;
        } elseif ($cek_trans->count() == 1) {
            $transaksi_cek = 1;
            $transaksi = $cek_trans[0];
        } else {
            return redirect(route('pesananSaya.index'))->with('error', 'Maaf Terjadi kesalahan');
        }
        if (auth()->user()->level != 'pelanggan') {

            if ($pesanan->status == '3') {
                $status = ['status' => 4];
                $pesanan->update($status);
            }

            return view('myDashboard.pages.karyawan.pesanan.detailPesan', [
                'pesanan' => $pesanan,
                'detail' => Detail_Pesanan::where('pesanan_id', $pesanan->id)->get(),
                'trans_cek' => $transaksi_cek,
                'Notif' => $notif, 
                'baNotif' => $notifUnRead,
                'message' => $message,
                'baMessage' => $messageUnRead,
                'transaksi' => $transaksi
            ]);
        }

        return view('myDashboard.pages.pelanggan.pesanan.Pdetail', [
            'pesanan' => $pesanan,
            'trans_cek' => $transaksi_cek,
            'detailPesanan' => Detail_Pesanan::where('pesanan_id', $pesanan->id)->get(),
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
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
        $status = array('status' => 1);

        $pesanan->update($status);

        return redirect('/pesananSaya')->with('batal', 'Pesanan Berhasil Dibatalkan');
    }

    public function KaryawanAccept(Request $request, Pesanan $pesanan)
    {
        $bukti = ['bukti' => 2];
        if ($pesanan->tipePembayaran == 'COD') {
            $bukti = ['bukti' => 4];
        }
        $update = array('status' => 5);

        $pesanan->update($update);
        $pesanan->update($bukti);

        // Mengirim Notifikasi
        $pemilikPesanan = $pesanan->pelanggan->user->id;
        $message = 'Pesanan Anda Diterima, Silahkan untuk melakukan pembayaran, pesanan akan di proses setelah pembayaran dilakukan. Informasi lebih lanjut hubungi kontak kami. Terima Kasih...';
        $potonganDetail = 'Pesanan Anda Diterima, Silahkan ...';

        if ($pesanan->tipePembayaran == 'COD') {
            $message = 'Pesanan Diterima, Pesanan Anda akan segera di proses, Tunggu Informasi Lebih lengkapnya';
            $potonganDetail = 'Pesanan Diterima, Pesanan Anda ...';
        }
        if ($pesanan->tipe_kirim == 'Ambil Di Toko') {
            $message = 'Pesanan Diterima, Tunggu Informasi Lebih Lanjut Untuk Mengambil Pesanan';
            $potonganDetail = 'Pesanan Diterima, Tunggu Informasi ...';
        }

        $notifikasi = new Notification([
            'title' => 'Pesanan Telah Diterima',
            'detail' => $message,
            'potongan' => $potonganDetail,
            'user_id' => $pemilikPesanan,
            'kategori_notif_id' => 1,
            'pesanan_id' => $pesanan->id,
        ]);

        $notifikasi->save();
        if (request()->reply) {
            $message = new Notification([
                'title' => 'Pesan Baru',
                'detail' => request()->reply,
                'potongan' => Str::limit(request()->reply, 35, ' ...'),
                'user_id' => $pemilikPesanan,
                'kategori_notif_id' => 3,
                'pesanan_id' => $pesanan->id,
            ]);
            $message->save();
            $messageId = Notification::where('kategori_notif_id', '3')->orderByDesc('id')->limit(1)->get()[0]->id;
            $pengirim = new pengirim([
                'notification_id' => $messageId,
                'user_id' => auth()->user()->id,
            ]);
            $pengirim->save();
        }

        return redirect(route('pesananPelanggan.index'))->with('berhasil', 'Pesanan telah diterima');
    }

    public function KarAcceptProgress(Pesanan $pesanan)
    {
        $status = 6;

        $update = array('status' => $status);

        $pesanan->update($update);

        // NOTIFIKASI
        $pemilikPesanan = $pesanan->pelanggan->user->id;
        $message = 'Pesanan Anda Dalam Proses Pembuatan. Pemberitahuan lebih lanjut Akan dikirim melalui pesan / notifikasi. Terima Kasih...';
        $potonganDetail = 'Pesanan Anda Dalam Proses Pembuatan ...';

        $notifikasi = new Notification([
            'title' => 'Pesanan Dalam Proses Pembuatan',
            'detail' => $message,
            'potongan' => $potonganDetail,
            'user_id' => $pemilikPesanan,
            'kategori_notif_id' => 1,
            'pesanan_id' => $pesanan->id,
        ]);

        $notifikasi->save();        

        return redirect(route('pesananPelanggan.index'))->with('terimaProgress', 'Pesanan Dalam Proses Pembuatan');
    }

    public function tandaiKirimOrSelesai(Request $request, Pesanan $pesanan)
    {
        $status = 8;

        if ($request->finish) {
            $status = 2;
        }
        if ($pesanan->tipe_kirim != "COD" && $status == 2) {
            $bukti = ['bukti' => 1];
            $pesanan->update($bukti);
        }
        
        $update = array('status' => $status);
        $pesanan->update($update);
        
        $pelangganID = $pesanan->pelanggan->user->id;
        if ($status == 8) {
            $isi = 'Pesanan Sedang Dikirim';
            $detail = 'Pesanan Dalam Proses Pengiriman, Silahkan tunggu informasi lebih lanjutnya';
            $potongan = 'Pesanan Dalam Proses Pengiriman ...';
        } else  if ($status == 2) {
            $isi = 'Pesanan Selesai';
            $detail = 'Pesanan Anda Telah Selesai, Terima kasih karena sudah melakukan pembelian di toko kami.';
            $potongan = 'Pesanan Anda Telah Selesai, Ter ...';            
        } else {
            $status = array('status' => 6);
            $pesanan->update($status);
            return redirect('/daftarPesanan')->with('error', 'Maaf Terjadi Kesalahan, silahkan ulang kembali..');
        }
        
        $isi = 'Pesanan Selesai';
        $notif = new Notification([
            'title' => $isi,
            'detail' => $detail,
            'potongan' => $potongan,
            'user_id' => $pelangganID,
            'kategori_notif_id' => 1,
            'pesanan_id' => $pesanan->id,
            'karyawan_id' => auth()->user()->id,
        ]);
        
        $notif->save();

        if ($status == 8) {
            return redirect(route('pesananPelanggan.index'))->with('Dikirim', 'Pesanan Dalam Proses Pengiriman');
        } else {
            return redirect('/pesananPelanggan')->with('selesai', 'Pesanan Selesai');
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
            'status' => 1,
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

        $isi = 'Migrasi Pesanan Ke Transaksi';
        $detail = 'Migrasi Pesanan Ke Transaksi Berhasil. Silahkan Cek pada data transaksi terbaru';
        $potongan = 'Migrasi Pesanan Ke Transaksi Berhasil ...';
        $notif = new Notification([
            'title' => $isi,
            'detail' => $detail,
            'potongan' => $potongan,
            'user_id' => auth()->user()->id,
            'kategori_notif_id' => 1,
            'pesanan_id' => $pesanan->id,
            'karyawan_id' => auth()->user()->id,
        ]);

        $notif->save();

        return redirect(route('transaksi.index'))->with('integrasi', 'Pesanan Selesai, Integrasi Berhasil');
    }

    public function upload(Pesanan $pesanan ,Request $request)
    {
        ddd($request);
        $pelangganID = $pesanan->pelanggan->user->id;
        $pelangganName = $pesanan->pelanggan->user->username;
        $validateData = $request->validate([
            'buktiBayar' => 'required|file|image',
        ]);
        $validateData['buktiBayar'] = $request->file('buktiBayar')->store('bukti-bayar');

        $bukti['bukti'] = 3;

        $pesanan->update($bukti);

        $bukti_bayar_pesanan = new bukti_bayar_pesanan([
            'pesanan_id' => $pesanan->id,
            'bukti_bayar' => $validateData['buktiBayar'],
        ]);

        $bukti_bayar_pesanan->save();

        $karyawan = User::where('level', 'karyawan')->get();

        for ($i=0; $i <= ($karyawan->count() - 1) ; $i++) {
            $notif = new Notification([
                'title' => 'Bukti Pembayaran',
                'detail' => $pelangganName . 'Telah Mengirim Bukti Pembayaran, silahkan untuk memproses',
                'potongan' => $pelangganName . 'Telah Mengirim Bukti Pembayaran ...',
                'user_id' => $karyawan[$i]->id,
                'kategori_notif_id' => 1,
                'pelanggan_id' => $pelangganID,
            ]);

            $notif->save();
        }

        $notifPelanggan = new Notification([
            'title' => 'Bukti Pembayaran terkirim',
            'detail' => 'Bukti Pembayaran Telah terkirim, silahkan tunggu verivikasi pembayaran untuk melanjutkan',
            'potongan' => 'Bukti Pembayaran Telah terkirim, silahkan tunggu ...',
            'user_id' => auth()->user()->id,
            'kategori_notif_id' => 1,
        ]);

        $notifPelanggan->save();

        return redirect('/pesananSaya')->with('bukti', 'Bukti pembayaran terkirim');
    }

    public function bukti_delete(Pesanan $pesanan)
    {
        Storage::delete(request()->gambar);

        $bukti = bukti_bayar_pesanan::where('bukti_bayar', request()->gambar)->get()[0];
        DB::delete('delete from bukti_bayar_pesanans where bukti_bayar = ?', [request()->gambar]);

        if ($pesanan->bukti_bayar_pesanan == '[]') {
            $status = ['bukti' => 2];
            $pesanan->update($status);
        }

        return redirect('pesananSaya')->with('message', 'Berhasil menghapus foto');
    }

    public function buktiVerify(Pesanan $pesanan)
    {
        $bukti = ['bukti' => 1];
        $pesanan->update($bukti);

        $pemilikPesanan = $pesanan->pelanggan->user->id;
        $message = 'Pembayaran Sudah Ter Verifikasi, informasi lebih lanjut hubungi kontak kami. silahkan untuk melakukan pengecekan lebih lanjut..';
        $potonganDetail = 'Pembayaran Sudah Ter Verifikasi ...';

        $notifikasi = new Notification([
            'title' => 'Pembayaran Sudah Ter Verifikasi',
            'detail' => $message,
            'potongan' => $potonganDetail,
            'user_id' => $pemilikPesanan,
            'kategori_notif_id' => 1,
            'pesanan_id' => $pesanan->id,
            'karyawan_id' => Karyawan::where('user_id', auth()->user()->id)->get()[0]->id,
        ]);

        $notifikasi->save();

        return redirect('/pesananPelanggan')->with('verified', 'Pembayaran berhasil Di verifikasi');
    }

    public function sampai_mark(Pesanan $pesanan)
    {
        $status = ['status' => 9];
        $pesanan->update($status);
        $pelangganID = $pesanan->pelanggan->user->id;
        $pelangganName = $pesanan->pelanggan->user->username;

        $karyawan = User::where('level', 'karyawan')->get();
        if (auth()->user()->level == 'pelanggan') {
            for ($i=0; $i <= ($karyawan->count() - 1) ; $i++) {
                $notif = new Notification([
                    'title' => 'Pesanan Sampai',
                    'detail' => $pelangganName . 'Telah Melakukan Konfirmasi Bahwa Pesanan Sudah Sampai',
                    'potongan' => $pelangganName . 'Telah Melakukan Konfirmasi Bahwa ...',
                    'user_id' => $karyawan[$i]->id,
                    'kategori_notif_id' => 1,
                ]);
    
                $notif->save();
            }
        }
        if (auth()->user()->level != 'pelanggan') {
            $notif = new Notification([
                'title' => 'Pesanan Sampai',
                'detail' => auth()->user()->username .'Telah Melakukan Konfirmasi Bahwa Pesanan Sudah Sampai',
                'potongan' => auth()->user()->username .'Telah Melakukan Konfirmasi Bahwa ...',
                'user_id' => $pesanan->pelanggan->user->id,
                'kategori_notif_id' => 1,
            ]);

            $notif->save();
            return redirect('pesananPelanggan')->with('message', 'Pesanan Berhasil Ditandai Sampai');
        }
        return redirect('/pesananSaya')->with('message', 'Pesanan Ditandai Sampai Di Tujuan');
    }
}
