<?php

namespace App\Http\Controllers\Data;

use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataPelangganController extends Controller
{
    
    public function index()
    {
        return view('myDashboard.pages.karyawan.dataPelanggan.DPelanggan', [
            'pelanggans' => Pelanggan::orderByDesc('id')->with(['pesanan'])->paginate(10),
        ]);
    }

    
    public function create()
    {
        return view('dashboard.dataPelanggan.create', [
            'users' => User::all(),
        ]);
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $validateData['user_id'] = 1;

        $user = new User([
            'username' => $validateData['nama'],
            'email' => $validateData['nama'] . "@gmail.com",
            'password' => 1234,
            ''
        ]);
        Pelanggan::create($validateData); 

        

        return redirect(route('dataPelanggan.index'));
    }

    
    public function show(Pelanggan $dataPelanggan)
    {
        return view('myDashboard.pages.karyawan.dataPelanggan.Pdetail', [
            'pelanggan' => $dataPelanggan,
        ]);
    }

    
    public function edit(Pelanggan $dataPelanggan)
    {
        return view('dashboard.dataPelanggan.edit', [
            'pelanggan' => $dataPelanggan
        ]);
    }

    
    public function update(Request $request, Pelanggan $dataPelanggan)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $Keterangan = $request->ket;

        $dataPelanggan->update($validateData);

        return redirect(route('dataPelanggan.index'));
    }

    
    public function destroy(Pelanggan $dataPelanggan)
    {
        // return $dataPelanggan;
        Pelanggan::destroy($dataPelanggan->id);

        return redirect('/dashboard/dataPelanggan');

    }

    public function FastAddedData(Request $request)
    {
        $validateData = $request->validate([
            'namaPelanggan' => 'required',
            'Ket' => 'required|min:5',
        ]);

        $PelangganId = User::orderBy('id', 'DESC')->limit(1)->get('id');
        
        // $PelangganAccount = new User([
        //     'username' => $validateData['namaPelanggan'],
        // ]);
        
        $pelangganData = new Pelanggan([
            'nama' => $validateData['namaPelanggan'],
            'Keterangan' => $validateData['Ket'],
            'user_id' => $PelangganId[0]->id + 1,
        ]);

        $pelangganData->save();


        return redirect(route('transaksis.create'));
    }
}
