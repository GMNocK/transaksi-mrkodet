<?php

namespace App\Http\Controllers;

use App\Models\laporanKaryawan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return now()->toArray(); 
        // return laporanKaryawan::where('send_at', '<' , now())->get();

        return view('dashboard.laporankaryawan.index',[
            'laporankaryawans' => laporanKaryawan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.laporankaryawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "INI BUAT SIMPAN LAPORAN HARIAN";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanKaryawan  $laporanKaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(laporanKaryawan $laporankaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanKaryawan  $laporanKaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(laporanKaryawan $laporankaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanKaryawan  $laporanKaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laporanKaryawan $laporankaryawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanKaryawan  $laporanKaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporanKaryawan $laporankaryawan)
    {
        laporanKaryawan::destroy($laporankaryawan->id);

        return redirect('/laporankaryawans');
    }
}
