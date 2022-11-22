<?php

namespace App\Http\Controllers\Rekap;

use App\Models\LaporanKaryawan;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class RekapTransaksiController extends Controller
{
    
    public function index()
    {
        $transaksis = Transaksi::orderByDesc('tgl_transaksi');

        if (request('filterTgl')) {
            if (request('filterTgl') == 'today') {
                return redirect('/Rekap/RTransaksi');
            }
    
            if (request('filterTgl') == 'tmonth') {
                return view('myDashboard.pages.karyawan.Rekap.RTransaksi', [
                    'transaksi' => $transaksis->whereMonth('tgl_transaksi' , date('m'))->whereYear('tgl_transaksi', date('Y'))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'tyear') {
                return view('myDashboard.pages.karyawan.Rekap.RTransaksi', [
                    'transaksi' => $transaksis->whereYear('tgl_transaksi', date('Y'))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'yester') {
                return view('myDashboard.pages.karyawan.Rekap.RTransaksi', [
                    'transaksi' => $transaksis->WhereDate('tgl_transaksi', (date('Y-m-') . (date('d')-1)))->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
            if (request('filterTgl') == 'all') {
                return view('myDashboard.pages.karyawan.Rekap.RTransaksi', [
                    'transaksi' => $transaksis->paginate(15),
                    'filter' => request('filterTgl')
                ]);
            }
        }

        return view('myDashboard.pages.karyawan.Rekap.RTransaksi',[
            'transaksi' => Transaksi::whereDate('tgl_transaksi', date('Y-m-d'))->orderByDesc('tgl_transaksi')->paginate(5),
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

    
    public function show(Laporankaryawan $laporankaryawan)
    {
        //
    }

    
    public function edit(Laporankaryawan $laporankaryawan)
    {
        //
    }

    
    public function update(Request $request, Laporankaryawan $laporankaryawan)
    {
        //
    }


    public function destroy(Laporankaryawan $laporankaryawan)
    {
        //
    }

    public function filterRekap(Request $request)
    {
        $request->validate(['filterTgl' => 'required']);

        if ($request->filterTgl == 'today') {
            return redirect('/Rekap/RTransaksi');
        }


        if ($request->filterTgl == 'tmonth') {
            return view('myDashboard.pages.karyawan.Rekap.RTransaksi', [
                'transaksi' => Transaksi::whereMonth('tgl_transaksi' , date('m'))->whereYear('tgl_transaksi', date('Y'))->orderBy('tgl_transaksi', 'ASC')->paginate(15),
                'filter' => $request->filterTgl
            ]);
        }
        if ($request->filterTgl == 'tyear') {
            return view('myDashboard.pages.karyawan.Rekap.RTransaksi', [
                'transaksi' => Transaksi::whereYear('tgl_transaksi', date('Y'))->orderBy('tgl_transaksi', 'DESC')->paginate(15),
                'filter' => $request->filterTgl
            ]);
        }
        if ($request->filterTgl == 'yester') {
            return view('myDashboard.pages.karyawan.Rekap.RTransaksi', [
                'transaksi' => Transaksi::WhereDate('tgl_transaksi', (date('Y-m-') . (date('d')-1)))->orderBy('tgl_transaksi', 'DESC')->paginate(15),
                'filter' => $request->filterTgl
            ]);
        }
        if ($request->filterTgl == 'all') {
            return view('myDashboard.pages.karyawan.Rekap.RTransaksi', [
                'transaksi' => Transaksi::orderBy('tgl_transaksi', 'DESC')->paginate(15),
                'filter' => $request->filterTgl
            ]);
        }
    }
}
