<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LaporanPelanggan;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    // DATA PELANGGAN
    public function p_export_pdf()
    {
    	$pelanggan = Pelanggan::all();

    	$pdf = PDF::loadview('myDashboard.pages.Reporting.pdf.RPelanggan',['pelanggan'=>$pelanggan]);
    	return $pdf->setPaper('a4', 'potrait')->download('laporan-data-pelanggan'. date('Y-m-d H:i:s'). '.pdf');
    }

    public function p_export_excel()
    {
        if (request()->data == 'pelanggan') {
            $data = Pelanggan::orderByDesc('nama')->orderByDesc('created_at')->get();            

            $title = 'Laporan Data Pelanggan';
            $desc = 'Laporan Data Seluruh Pelanggan Tanggal '. date('Y-m-d').'.';
        } else {
            return abort(403);
        }

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator('Mister Kodet')
            ->setLastModifiedBy('Mister Kodet')
            ->setTitle($title)
            ->setSubject($title)
            ->setDescription($desc)
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Laporan');


        $rowNumber = 2;
        for ($i=0; $i < $data->count() ; $i++) {             

            if ($rowNumber == 2) {
                $isiB = 'Nama';
                $isiC = 'Alamat';
                $isiD = 'No. Telepon';
                $isiE = 'Email';
                $isiF = 'Tanggal Gabung';
            } else {               
                $isiB = $data[$i]->nama;
                $isiC = $data[$i]->alamat;
                $isiD = $data[$i]->no_tlp;
                $isiE = $data[$i]->user->email;
                $isiF = $data[$i]->user->created_at;
            }
            // Add some data
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$rowNumber, $isiB)
                ->setCellValue('C'.$rowNumber, $isiC)
                ->setCellValue('D'.$rowNumber, $isiD)
                ->setCellValue('E'.$rowNumber, $isiE)
                ->setCellValue('F'.$rowNumber, $isiF);

            $rowNumber += 1;
        }
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Kodet');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="laporan-data-pelanggan.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }


    // PESANAN
    public function pesExportExcel()
    {
        if (request()->data == 'pesanan') {
            $data = Pesanan::orderByDesc('waktu_pesan')->get();

            $title = 'Laporan Pesanan';
            $desc = 'Laporan Dari data keseluruhan Pesanan';
        } else {
            // return abort(404);
        }

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator('Mister Kodet')
            ->setLastModifiedBy('Mister Kodet')
            ->setTitle($title)
            ->setSubject($title)
            ->setDescription($desc)
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Laporan');


            $rowNumber = 2;
            for ($i=0; $i < $data->count() ; $i++) {             
    
                if ($rowNumber == 2) {
                    $isiB = 'Nama';
                    $isiC = 'Waktu Pesanan';
                    $isiD = 'Total Harga';
                    $isiE = 'Pengiriman';
                    $isiF = 'Pembayaran';
                    $isiG = 'Bayar';
                } else {
                    $isiB = $data[$i]->pelanggan->nama;
                    $isiC = $data[$i]->waktu_pesan;
                    $isiD = $data[$i]->total_harga;
                    $isiE = $data[$i]->tipe_kirim;
                    $isiF = $data[$i]->tipePembayaran;
                    if ($data[$i]->buktiBayarPesanan) {
                        # code...
                        $isiG = $data[$i]->a;
                    }
                }
                // Add some data
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B'.$rowNumber, $isiB)
                    ->setCellValue('C'.$rowNumber, $isiC)
                    ->setCellValue('D'.$rowNumber, $isiD)
                    ->setCellValue('E'.$rowNumber, $isiE)
                    ->setCellValue('F'.$rowNumber, $isiF);
    
                $rowNumber += 1;
            }


        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Kodet');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="laporan-pesanan.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
    
    public function s_export_pdf()
    {
        $pesanan = Pesanan::all();

    	$pdf = PDF::loadview('myDashboard.pages.Reporting.pdf.Rpesanan',['pesanan'=>$pesanan]);
    	return $pdf->download('laporan-data-pesanan '. date('Y-m-d H:i:s'). '.pdf');
    }

    // Transaksi
    public function t_export_pdf()
    {
        $transaksi = Transaksi::all();

    	$pdf = PDF::loadview('myDashboard.pages.Reporting.pdf.RTransaksi',['transaksi'=>$transaksi]);
    	return $pdf->download('laporan-data-transaksi '. date('Y-m-d H:i:s'). '.pdf');
    }

    public function t_export_excel()
    {
        if (request()->data == 'transaksi') {
            $data = Transaksi::orderByDesc('tgl_transaksi')->get();

            $title = 'Laporan Transaksi';
            $desc = 'Laporan Dari data keseluruhan Transaksi';
        } else {
            return abort(404);
        }

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator('Mister Kodet')
            ->setLastModifiedBy('Mister Kodet')
            ->setTitle($title)
            ->setSubject($title)
            ->setDescription($desc)
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Laporan');


        $rowNumber = 2;
        for ($i=0; $i < $data->count() ; $i++) {             

            if ($rowNumber == 2) {
                $isiB = 'Tanggal';
                $isiC = 'Total Harga';
                $isiD = 'Total Barang';
                $isiE = 'Pencatat';
                $isiF = 'Pesanan';

            } else {

                $isiB = $data[$i]->tgl_transaksi;
                $isiC = $data[$i]->total_harga;
                $isiD = $data[$i]->detail_transaksi->count();
                $isiE = $data[$i]->pencatat;
                if ($data[$i]->pesanan_id != null || $data[$i]->pesanan_id != '') {
                    $isiF = 'online';
                } else {
                    $isiF = 'offline';
                }
            }
            // Add some data
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.$rowNumber, $isiB)
                ->setCellValue('C'.$rowNumber, $isiC)
                ->setCellValue('D'.$rowNumber, $isiD)
                ->setCellValue('E'.$rowNumber, $isiE)
                ->setCellValue('F'.$rowNumber, $isiF);

            $rowNumber += 1;
        }


        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Kodet');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        if (request()->filter) {
            $oke = 0;
        }
        header('Content-Disposition: attachment;filename="laporan-transaksi.xlsx"');

        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    // Keluhan \ Laporan Pelanggan
    public function lp_export_pdf()
    {        
        $laporan_pelanggan = LaporanPelanggan::all();
    
        $pdf = PDF::loadview('myDashboard.pages.Reporting.pdf.RLPelanggan',['lpelanggan'=>$laporan_pelanggan]);
        return $pdf->download('laporan-keluhan-pelanggan '. date('Y-m-d H:i:s'). '.pdf');
    }

    public function lp_export_excel()
    {
        if (request()->data == 'lpelanggan') {
            $data = LaporanPelanggan::orderByDesc('send_at')->get();

            $title = 'Laporan Keluhan Pelanggan';
            $desc = 'Laporan Dari data keseluruhan Keluhan Pelanggan';
        } else {
            // return abort(404);
        }

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator('Mister Kodet')
            ->setLastModifiedBy('Mister Kodet')
            ->setTitle($title)
            ->setSubject($title)
            ->setDescription($desc)
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Laporan');


            $rowNumber = 2;
            for ($i=0; $i < $data->count() ; $i++) {             
    
                if ($rowNumber == 2) {
                    $isiB = 'Tanggal Kirim';
                    $isiC = 'Judul';
                    $isiD = 'Nama Pengirim';
                    $isiE = 'Email Pengirim';

                } else {

                    $isiB = $data[$i]->send_at;
                    $isiC = $data[$i]->title;
                    $isiD = $data[$i]->pelanggan->nama;
                    $isiE = $data[$i]->pelanggan->user->email;
                }
                // Add some data ke kotak kotak di excel
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('B'.$rowNumber, $isiB)
                    ->setCellValue('C'.$rowNumber, $isiC)
                    ->setCellValue('D'.$rowNumber, $isiD)
                    ->setCellValue('E'.$rowNumber, $isiE);
    
                $rowNumber += 1;
            }


        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Kodet');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        if (request()->filter) {
            $oke = 0;
        }
        header('Content-Disposition: attachment;filename="laporan-keluhan-pelanggan.xlsx"');

        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
