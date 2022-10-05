<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('login.register', [
            'title' => 'Register'
        ]);
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:4'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        $request->session()->flash('success', 'Register SuccessFully. Please Login!');

        return redirect('/login');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
