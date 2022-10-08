<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    public function register()
    {
        return view('login');
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

        $pelanggansData = $request->validate([
            'nama' =>'required'
        ]);
        pelanggan::create($pelanggansData);

        return redirect('/login')->with('success', 'Register SuccessFully. Please Login!');
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
        $level = User::where('email', $credentials['email'])->get('level');
        $credentials['level'] = $level;
       
        if (Auth::attempt($credentials)) {                
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return redirect('/login')->withErrors('failed','Login Failed, Username or Pasword wrong');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
