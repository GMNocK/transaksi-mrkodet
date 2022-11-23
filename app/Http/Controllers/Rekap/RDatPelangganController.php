<?php

namespace App\Http\Controllers\Rekap;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class RDatPelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::orderByDesc('nama')->orderByDesc('created_at');

        if (request('filterTgl')) {
            if (request('filterTgl') == 'today') {
                return redirect('/Rekap/RPelanggan');
            }
    
            if (request('filterTgl') == 'tmonth') {
                return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan', [
                    'pelanggan' => $pelanggans->whereMonth('created_at' , date('m'))->whereYear('created_at', date('Y'))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'tyear') {
                return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan', [
                    'pelanggan' => $pelanggans->whereYear('created_at', date('Y'))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'yester') {
                return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan', [
                    'pelanggan' => $pelanggans->WhereDate('created_at', (date('Y-m-') . (date('d')-1)))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'all') {
                return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan', [
                    'pelanggan' => $pelanggans->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
        }

        return view('myDashboard.pages.karyawan.Rekap.RDataPelanggan',[
            'pelanggan' => $pelanggans->whereDate('created_at', date('Y-m-d'))->paginate(15),
            'filter' => 'today',
        ]);
    }
}
