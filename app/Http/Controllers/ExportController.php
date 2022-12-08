<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use PDF;

class ExportController extends Controller
{
    public function index()
    {
    	$pelanggan = Pelanggan::all();
    	return view('pelanggan',['pelanggan'=>$pelanggan]);
    }

    public function export_pdf()
    {
    	$pelanggan = Pelanggan::all();

    	$pdf = PDF::loadview('login',['pelanggan'=>$pelanggan]);
    	return $pdf->download('laporan-data-pelanggan '. date('Y-m-s_H:i:s'). '.pdf');
    }

    public function export_excel()
    {
        $pelanggan = Pelanggan::all();

        $excel = 0;
    }

}
