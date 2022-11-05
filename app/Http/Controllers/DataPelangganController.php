<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataPelangganController extends Controller
{
    
    public function index()
    {
        return view('dashboard.dataPelanggan.index', [
            'pelanggans' => Pelanggan::orderBy('id', 'asc')->paginate(12),
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

        Pelanggan::create($validateData);

        return redirect(route('dataPelanggan.index'));
    }

    
    public function show(Pelanggan $dataPelanggan)
    {
        return view('dashboard.dataPelanggan.detailPelanggan', [
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
}
