<?php

namespace App\Http\Controllers\Laporan;

use App\Models\laporanKaryawan;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaporanKaryawanController extends Controller
{
    
    public function index()
    {
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->get()->where('kategori_notif_id', '!=', 3);

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

        return view('myDashboard.pages.Admin.laporanKaryawan',[
            'laporankaryawans' => laporanKaryawan::paginate(12),
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $message->count(),
        ]);
    }

    
    public function create()
    { 
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->get()->where('kategori_notif_id', '!=', 3);

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


        $ls =  Karyawan::where('user_id', auth()->user()->id)->get();
        
        foreach ($ls as $l) {
            $idK = $l->id;
        }

        return view('dashboard.karyawan.laporankaryawan.create', [
            'ik' => $idK,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $message->count(),
        ]);
    }

    
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required|min:1',
            'body' => 'required|min:10',
            'karyawan_id' => 'required'
        ]);

        $validateData['excerpt'] = Str::limit($validateData['body'], 50, '...');

        $validateData['send_at'] = date('Y-m-d H-i-s');

        laporanKaryawan::create($validateData);

        return redirect(route('laporankaryawans.index'));
    }

    
    public function show(laporanKaryawan $laporankaryawan)
    {
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->get()->where('kategori_notif_id', '!=', 3);

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
        

        return view('dashboard.karyawan.laporankaryawan.show', [
            'laporankaryawans' => $laporankaryawan,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $message->count(),
        ]);
    }

    
    public function edit(laporanKaryawan $laporankaryawan)
    {
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notif = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
        $banyakNotif = Notification::where('user_id', auth()->user()->id)->get()->where('kategori_notif_id', '!=', 3);

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

        return view('dashboard.karyawan.laporankaryawan.edit', [
            'laporankaryawan' => $laporankaryawan,
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $message->count(),
        ]);
    }

    
    public function update(Request $request, laporanKaryawan $laporankaryawan)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ]);
        $validateData['excerpt'] = Str::limit($validateData['body'], 50, '...');

        $laporankaryawan->update($validateData);

        return redirect(route('laporankaryawans.index'));
    }

    
    public function destroy(laporanKaryawan $laporankaryawan)
    {
        laporanKaryawan::destroy($laporankaryawan->id);

        return redirect('/laporankaryawans');
    }
}
