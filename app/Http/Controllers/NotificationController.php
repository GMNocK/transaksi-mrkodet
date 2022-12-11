<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\notifRead;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    
    public function index()
    {
        // return Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->orderByDesc('created_at')->get();
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

        return view('myDashboard.pages.notifications.all', [
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
            'notifikasi' => Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get(),
        ]);
    }
    
    public function show(Notification $notif)
    {

        if ($notif->notifRead == '[]') {
            
            $read = new notifRead([
                'isRead' => 1, // TRUE atau 1 == Telah dibaca
                'notification_id' => $notif->id,
                'user_id' => auth()->user()->id,
            ]);

            $read->save();
        }
        $message = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->limit(4)->get();
        $banyakMessage = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', 3)->get();
        $notifikasi = Notification::orderByDesc('created_at')->where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->limit(4)->get();
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

        return view('myDashboard.pages.notifications.showNotif', [
            'notif' => $notif,
            'Notif' => $notifikasi, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
            
        ]);
    }

    public function destroy(Notification $notif)
    {
        Notification::destroy($notif->id);

        return redirect('/notif')->with('notif', 'Notifikasi Dihapus');
    }

    public function delete_readed()
    {
        $notification = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        for ($i=0; $i < $notification->count() ; $i++) { 
            $notif = $notification[$i];
            if ($notif->notifRead != '[]') {  
                
                Notification::destroy($notif->id);
                DB::delete('delete from notif_reads where notification_id = ?', [$notif->id]);
            }
        }

        return redirect('/notif');
    }

    public function read_all()
    {
        $notification = Notification::where('user_id', auth()->user()->id)->where('kategori_notif_id', '!=', 3)->get();

        for ($i=0; $i < $notification->count() ; $i++) { 
            $notif = $notification[$i];
            if ($notif->notifRead == '[]') {                
                $read = new notifRead([
                    'isRead' => 1, // TRUE atau 1 == Telah dibaca
                    'notification_id' => $notif->id,
                    'user_id' => auth()->user()->id,
                ]);
    
                $read->save();
            }
        }
        
        return redirect('/notif');
    }
}
