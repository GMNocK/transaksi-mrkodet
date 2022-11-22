<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekapPesananController extends Controller
{
    
    public function index()
    {
        $pesanans = Pesanan::orderByDesc('waktu_pesan');

        if (request('filterTgl')) {
            if (request('filterTgl') == 'today') {
                return redirect('/Rekap/RPesanan');
            }
    
            if (request('filterTgl') == 'tmonth') {
                return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
                    'pesanan' => $pesanans->whereMonth('waktu_pesan' , date('m'))->whereYear('waktu_pesan', date('Y'))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'tyear') {
                return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
                    'pesanan' => $pesanans->whereYear('waktu_pesan', date('Y'))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'yester') {
                return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
                    'pesanan' => $pesanans->WhereDate('waktu_pesan', (date('Y-m-') . (date('d')-1)))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'all') {
                return view('myDashboard.pages.karyawan.Rekap.RPesanan', [
                    'pesanan' => $pesanans->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
        }

        return view('myDashboard.pages.karyawan.Rekap.RPesanan',[
            'pesanan' => Pesanan::whereDate('waktu_pesan', date('Y-m-d'))->orderByDesc('waktu_pesan')->paginate(5),
            'filter' => 'today',
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

    
    public function show(Pesanan $pesanan)
    {
        //
    }

    
    public function edit(Pesanan $pesanan)
    {
        //
    }

    
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
