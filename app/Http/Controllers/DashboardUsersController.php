<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Controllers\Controller;
use App\Models\karyawan;
use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{
    
    public function index()
    {
        return view('dashboard.user.index', [
            'users' => user::all()
        ]);
    }

    
    public function create()
    {
        return view('dashboard.user.create', [

        ]);
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $validateData['level'] = 'karyawan';
        $validateData['password'] = bcrypt($request['password']);

        user::create($validateData);

        $userData = $request->validate([
            'nama' => 'required'
        ]);

        karyawan::create($userData);

        return redirect('/dashboard/users');
    }

    
    public function show(user $user)
    {
        //
    }

    
    public function edit(user $user)
    {
        //
    }

    
    public function update(Request $request, user $user)
    {
        //
    }

    
    public function destroy(user $user)
    {
        
    }
}
