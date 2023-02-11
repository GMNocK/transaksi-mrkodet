<?php

namespace App\Http\Controllers\Data;

use App\Models\Barang;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class ProdukController extends Controller
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

        return view('myDashboard.pages.karyawan.DataBarang.barang', [
            'barang' => Barang::all(),
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
        
        return view('myDashboard.pages.karyawan.DataBarang.Bcreate', [
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namBar' => 'required',
            'harBar' => 'required|min:4',
            'keterangan' => 'required',
            'foto' => 'required|file|image',
        ],[
            'namBar.required' => 'Nama Barang harus di isi',
            'harBar.required' => 'Harga harus di isi',
            'harBar.min' => 'Harga harus lebih dari :min karakter',
            'keterangan.required' => 'Keterangan harus di isi',
            'foto.required' => 'Harus Menyertakan Foto barang',
            'foto.file' => 'Foto harus berupa file',
            'foto.image' => 'Foto harus berupa foto / gambar',
        ]);

        $validateData['foto'] = $request->file('foto')->store('foto-produk');

        $barang = Barang::create([
            'nama_barang' => $validateData['namBar'],
            'harga' => $validateData['harBar'],
            'keterangan' => $validateData['keterangan'],
            'foto' => $validateData['foto'],
        ]);

        if ($barang) {
            return redirect('/produk')->with('added', 'Data Berhasil Di Tambahkan');
        } else {
            return redirect('/produk')->with('serverError', 'Terjadi Kesalahan Dalam Server');
        }
    }

    
    public function show(Barang $produk)
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

        return view('myDashboard.pages.karyawan.DataBarang.Bar_detail', [
            'barang' => $produk,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function edit(Barang $produk)
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
        
        return view('myDashboard.pages.karyawan.DataBarang.bar_edit', [
            'barang' => $produk,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    
    public function update(Request $request, Barang $produk)
    {
        $validateData = $request->validate([
            'namBar' => 'required',
            'harBar' => 'required|min:4',
            'keterangan' => 'required',
            'foto' => 'required|min:4',
        ]);

        $produk->update($validateData);

        return redirect('/produk')->with('edited', 'Data Berhasil Di edit');
    }

    
    public function destroy(Barang $produk)
    {
        $produk->destroy($produk->id);

        return redirect('/produk')->with('Deleted', 'Data Berhasil dihapus');
    }
}
