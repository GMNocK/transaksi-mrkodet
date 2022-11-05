<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\karyawan;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{
    public function index()
    {
        $this->authorize('mustBeAdmin');
        return view('dashboard.user.index', [
            'users' => user::where('level', 'costumer')->orWhere('level', 'karyawan')->paginate(10),
        ]);
    }

    
    public function create()
    {
        $this->authorize('mustBeAdmin');
        return view('dashboard.user.create', [

        ]);
    }

    
    public function store(Request $request)
    {
        $this->authorize('mustBeAdmin');
        $validateData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $validateData['level'] = 'karyawan';
        $validateData['password'] = bcrypt($request['password']);

        user::create($validateData);
        // return User::where('level','karyawan')->get();

        $userData = $request->validate([
            'nama' => 'required'
        ]);
        // return $request;
        $userData['user_id'] = '3';

        karyawan::create($userData);

        return redirect(route('users.index'));
    }

    
    public function show(user $user)
    {
        //
    }

    
    public function edit(user $user)
    {
        $this->authorize('mustBeAdmin');
        return view('dashboard.user.edit',[
            'user' => $user,
            'karyawan' => $user->karyawan,
            'pelanggans' => $user->pelanggan,
            'Admin' => $user->admin,
        ]);
    }

    
    public function update(Request $request, user $user)
    {
        $this->authorize('mustBeAdmin');
        $validateData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|max:255'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $user->update($validateData);

        return redirect(route('users.index'));
    }

    
    public function destroy(user $user)
    {
        $this->authorize('mustBeAdmin');
        User::destroy($user->id);

        return redirect(route('users.index'));
    }
}
