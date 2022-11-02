<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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

        // $pelanggansData = $request->validate([
        //     'nama' =>'required'
        // ]);
        // pelanggan::create($pelanggansData);

        return redirect(route('login'))->with('success', 'Register SuccessFully. Please Login!');
    }

    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // return $credentials;
        $level = User::where('email', $credentials['email'])->get('level');
        $credentials['level'] = $level;
       
        if (Auth::attempt($credentials)) {                
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } elseif (Auth::check()) {

            return redirect('/dashboard');
            
        }

        return redirect('/')->withErrors('failed','Login Failed, Username or Pasword wrong');
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
}