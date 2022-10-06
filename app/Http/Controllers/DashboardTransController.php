<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardTransController extends Controller
{
    
    public function index()
    {
        
        return view('admin.transaksi.index', [
            'transaksis' => transaksi::where('pengguna_id', auth()->user()->id)->get()
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(transaksi $transaksi)
    {
        return $transaksi;
        //->where('pengguna_id', auth()->user()->id)->get()
    }

    
    public function edit(transaksi $transaksi)
    {
        //
    }

    
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
