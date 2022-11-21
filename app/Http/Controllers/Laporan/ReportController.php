<?php

namespace App\Http\Controllers\Laporan;

use App\Models\LaporanPelanggan;
use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReportController extends Controller
{
    
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->get('id')[0];
        // return $user->id;

        $pelanggan =  Pelanggan::where('user_id', $user->id)->get()[0];
        // foreach ($string as $i) {
        //     $pelangganLogin = $i->id;
        // }

        $ret = LaporanPelanggan::where('pelanggan_id', $pelanggan->id)->get();

        return view('myDashboard.pages.pelanggan.laporan.Lsaya', [
            'LaporanPelanggans' => $ret, 
        ]);
    }

    
    public function create()
    {
        return view('myDashboard.pages.pelanggan.laporan.LCreate', [
            'pelanggans' => Pelanggan::where('user_id', auth()->user()->id)->get()  ,
        ]);
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'pelanggan_id' => 'required',
        ]);
        $validateData['excerpt'] = Str::limit($validateData['body'], 15, '...');

        $date = Carbon::now()->toDateTimeString();        
        $validateData['send_at'] = $date;  

        LaporanPelanggan::create($validateData);

        // return $date = Carbon::now()->toDateTimeString();
        
        return redirect('/transaksi/reports/');
    }

    
    public function show(LaporanPelanggan $report)
    {
        return view('dashboard.transaksi.report.detail',[
            'laporanpelanggan' => $report, 
        ]);
    }


    public function edit(LaporanPelanggan $report)
    {
        return view('dashboard.transaksi.report.edit', [
            'LaporanPelanggan' => $report
        ]);
    }

    
    public function update(Request $request, LaporanPelanggan $report)
    {
        $validateData = $request->validate([
            'title' => 'required|min:10',
            'body' => 'required'
        ]);
        LaporanPelanggan::where('id', $report->id)->update($validateData);


        return redirect('/transaksi/reports/');   
    }


    public function destroy(LaporanPelanggan $report)
    {
        LaporanPelanggan::destroy($report->id);

        return redirect('/transaksi/reports/');
    }

    public function createReport(Transaksi $transaksi)
    {
        return $transaksi;
    }

    public function history(LaporanPelanggan $laporanPelanggan)
    {
        return view('myDashboard.pages.pelanggan.laporan.History', [
            'laporan' => LaporanPelanggan::whereDate('send_at', date('Y-m-d'))->get(),
        ]);
    }
}
