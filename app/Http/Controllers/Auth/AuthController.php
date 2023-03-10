<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Karyawan;
use App\Models\Notification;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function registerAction(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:4'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        $dataPelBaru = User::orderByDesc('id')->limit(1)->get('id');
        
        $pelanggansData['nama'] = $validateData['username'];
        $pelanggansData['user_id'] = $dataPelBaru[0]->id;
        $pelanggansData;

        Pelanggan::create($pelanggansData);
        

        return redirect(route('login'))->with('success', 'Register SuccessFully. Please Login!');
    }

    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        $level = User::where('email', $credentials['email'])->get('level');
        $credentials['level'] = $level;
       
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('/myDashboard')->with('loginOk', 'Selamat Berhasil Login');

        } elseif (Auth::check()) {

            return redirect('/');
            
        }

        return redirect('/')->with('failed','Login Failed, Username or Pasword wrong');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function resetPw(Request $request)
    {
        return view('auth.resetPw');
    }

    public function resetPwAction(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'newPassword' => 'required|min:8',
            'confirmNewPassword' => 'required|same:newPassword'
        ]);
        $update['password'] = bcrypt($validateData['newPassword']);        

        $data =  User::where('email', $validateData['email'])->get();
        $cek = $data->count();

        if ($cek == 1) {
            User::where('email', $validateData['email'])->update($update);

            // return User::where('password', $update['password'])->get();
            return redirect('/');

        } else {  
            
            return redirect('/resetPassword')->with('error', 'Email Not Match');
        }        
    }


    public function forgotPw()
    {
        return view('auth/forgot');
    }

    public function forgotGetEmail(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $validateData['email'])->get();
        
        $cek = $user->count('id');
        
        // return $validateData;
        if ($cek == 0) {

            return 'a';

        } elseif ($cek == 1) {

            return view('auth.forgotGetPw', [
                'email' => $validateData['email']
            ]);
            
        } else {
            
            return abort(403);
            
        }


    }
    
    public function forgotGetlastPw(Request $request)
    {
        $validateData = $request->validate([
            'password' => 'required|min:4',
            'passwordSame' => 'required|same:password|min:4',
            'email' => 'required'
        ]);
        // return $validateData;
        // $data = User::where('email', $validateData['email'])->get();
        // return $validateData;
        $data = DB::select('select * from users where email = ?', [$validateData['email']]);
        // return $data[0]->password;

        $dataCek = User::where('password', 'like', $data[0]->password)->where('email', $validateData['email'])->get();

        $cek = $dataCek->count();

        if ($cek == 1) {

            return redirect('/resetPassword');

        } elseif ($cek == 0) {

            return redirect('/forgot')->withErrors('failed', 'Not Match');

        } else {
            return abort(403);
        }

    }

    public function profile()
    {
        if (auth()->user()->level == 'pelanggan') {
            $data = Pelanggan::where('user_id', auth()->user()->id)->get();
        }
        if (auth()->user()->level == 'karyawan') {
            $data = Karyawan::where('user_id', auth()->user()->id)->get();
        }
        if (auth()->user()->level == 'Admin') {            
            $data = Admin::where('user_id', auth()->user()->id)->get();
        }

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


        return view('myDashboard.pages.Auth.profile', [
            'data' => $data,
            'user' => auth()->user(),
            'Notif' => $notif, 
            'baNotif' => $notifUnRead,
            'message' => $message,
            'baMessage' => $messageUnRead,
        ]);
    }

    public function profileUpdate(Request $request, Pelanggan $pelanggan)
    {
        $validateData = $request->except('_token');

        $user = User::where('id', auth()->user()->id)->get()[0];
        $user->update($validateData);

        if (auth()->user()->level == 'pelanggan') {

            $pelanggan->update($validateData);

            return redirect('/profile')->with('success','Berhasil Di simpan');
        }
        if (auth()->user()->level == 'karyawan') {
            $dataKaryawan = Karyawan::where('user_id', auth()->user()->id)->get()[0];

            $dataKaryawan->update($validateData);
            return redirect('/profile')->with('success','Berhasil Di simpan');
        }
        if (auth()->user()->level == 'Admin') {
            $dataAdmin = Admin::where('user_id', auth()->user()->id)->get()[0];

            $dataAdmin->update($validateData);
            return redirect('/profile')->with('success','Berhasil Di simpan');
        }
    }
}