<?php

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\KirimEmailController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardTransController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\KaryawanController;

use App\Http\Controllers\ReportingController;
use App\Http\Controllers\ExportController;

use App\Http\Controllers\Laporan\FeedbackKaryawanController;
use App\Http\Controllers\Laporan\LaporanKaryawanController;
use App\Http\Controllers\Laporan\ReportController;
use App\Http\Controllers\Laporan\ReportForAdminController;

use App\Http\Controllers\Data\ProdukController;
use App\Http\Controllers\Data\PesananController;
use App\Http\Controllers\Data\DataPelangganController;
use App\Http\Controllers\Data\TransaksiController;
use App\Http\Controllers\Rekap\RDatPelangganController;
use App\Http\Controllers\Rekap\RekapPesananController;
use App\Http\Controllers\Rekap\RekapLPelangganController;
use App\Http\Controllers\Rekap\RekapTransaksiController;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Models\Pesanan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['guest'])->group(function () {
    
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login' ,[AuthController::class, 'loginAction']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerAction']);

    // FORGOT PASSWORD
    Route::get('/forgot', [AuthController::class, 'forgotPw'])->name('forgotPw');
    Route::post('/forgotNext', [AuthController::class, 'forgotGetEmail']);
    Route::post('/forgotLast', [AuthController::class, 'forgotGetLastPw']);

    // RESET PASSWORD
    Route::get('/new', function () {
        return view('newLogin');
    });
});
Route::get('/resetPassword', [AuthController::class, 'resetPw']);
Route::post('/resetPassword/action', [AuthController::class, 'resetPwAction']);

Route::resource('/dashboard/users', DashboardUsersController::class)->middleware('auth');

Route::resource('/dashboard/transaksis', DashboardTransController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/myDashboard', [DashboardController::class, 'myDashboard'])->name('myDashboard');
    
    Route::middleware(['IsPelanggan'])->group(function () {
        
        Route::resource('/pesananSaya', PesananController::class)->only('index');
        Route::resource('/pesanan', PesananController::class)->except('index');
        Route::get('/pesanan/batal/{pesanan}', [PesananController::class, 'batal']);
        Route::get('/pesanan/delete/{pesanan}', [PesananController::class, 'destroy']);
        Route::post('/pesanan/bukti/upload/{pesanan}', [PesananController::class, 'upload']);
        Route::get('/pesanan/bukti/delete/{pesanan}', [PesananController::class, 'bukti_delete']);
        Route::get('/pesanan/invoice/{pesanan}', [PesananController::class, 'invoice_cetak']);
        
        Route::get('/pesananSaya/history', [PesananController::class, 'history']);
        
        Route::get('/LaporanSaya', [ReportController::class, 'index']);
        Route::resource('/Laporan', ReportController::class)->except('index');
        Route::get('/Laporan/History', [ReportController::class, 'history']);
    });
    
    Route::get('/pesanan/sampai/{pesanan}', [PesananController::class, 'sampai_mark']);
    
    Route::middleware(['IsOperator'])->group(function () {
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('/delete/transaksi/{transaksi}', [TransaksiController::class, 'destroy']);
        Route::post('/pesanan/transaksi', [TransaksiController::class, 'lihatTransaksi']);
        
        Route::get('/pesananPelanggan/{pesanan}', [PesananController::class, 'show'])->name('showPpelanggan');
        Route::get('/pesanan/accept/{pesanan}', [PesananController::class, 'KaryawanAccept']);
        Route::get('/pesanan/progress/{pesanan}', [PesananController::class, 'KarAcceptProgress']);
        Route::get('/pesanan/bukti/verify/{pesanan}', [PesananController::class, 'buktiVerify']);
        Route::post('/pesanan/dikirim/{pesanan}', [PesananController::class, 'tandaiKirimOrSelesai']);
        Route::post('/pesanan/selesai/{pesanan}', [PesananController::class, 'tandaiKirimOrSelesai']);
        // Route::post('/pesanan/{pesanan}/transaksi', [PesananController::class, 'transIntegration']);
        Route::get('/pesanan/{pesanan}/transaksi', [PesananController::class, 'transIntegration']);
        Route::get('/pesanan/transaksi/{pesanan}', [PesananController::class, 'transIntegration']);
        Route::resource('/pesananPelanggan', PesananController::class)->only(['index']);
        
        Route::resource('/produk', ProdukController::class);
        Route::get('/delete/produk/{produk}', [ProdukController::class, 'destroy']);
        
        Route::resource('/dataPelanggan', DataPelangganController::class);
        
        Route::get('/laporanPelanggan', [KaryawanController::class, 'pelangganReport']);
        Route::post('/laporanPelanggan/reply/{laporanPelanggan}/create', [KaryawanController::class, 'replyPelangganR'])->name('indexReply');
        Route::post('/laporanPelanggan/reply', [KaryawanController::class, 'StoreReply']);
        
        Route::resource('/laporanPelanggan/Feedback', FeedbackKaryawanController::class);
        
        Route::resource('/Rekap/RPesanan', RekapPesananController::class);
        Route::resource('/Rekap/RTransaksi', RekapTransaksiController::class);
        Route::resource('/Rekap/RPelanggan', RDatPelangganController::class);
        Route::resource('/Rekap/RLaporanPelanggan', RekapLPelangganController::class);
        
        Route::post('/Rekap/Pesanan', [ReportingController::class, 'pesanan']);
        Route::post('/Rekap/Transaksi', [ReportingController::class, 'transaksi']);
        Route::post('/Rekap/Pelanggan', [ReportingController::class, 'pelanggan']);
        Route::post('/Rekap/LPelanggan', [ReportingController::class, 'lpelanggan']);

        // Route Export ke Pdf & Excel
        Route::get('DataPelanggan/export/pdf', [ExportController::class, 'p_export_pdf'] );
        Route::get('DataPelanggan/export/excel', [ExportController::class, 'p_export_excel'] );
        Route::get('pesanan/export/pdf', [ExportController::class, 's_export_pdf']);
        Route::get('/export/pesanan/excel', [ExportController::class, 'pesExportExcel']);
        Route::get('/export/transaksi/excel', [ExportController::class, 't_export_excel']);
        Route::get('/export/transaksi/pdf', [ExportController::class, 't_export_pdf']);
        Route::get('/export/lpelanggan/excel', [ExportController::class, 'lp_export_excel']);
        Route::get('/export/lpelanggan/pdf', [ExportController::class, 'lp_export_pdf']);

        Route::resource('/laporanSaya', LaporanKaryawanController::class)->middleware('IsKaryawan');
        Route::resource('/laporanKaryawan', LaporanKaryawanController::class)->middleware('IsAdmin');
    });
    
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/Profile/update/{pelanggan}', [AuthController::class, 'profileUpdate']);

    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::resource('/message', MessageController::class);
    Route::get('/message/delete/readed', [NotificationController::class, 'del_read_mes']);
    Route::get('/read/message', [NotificationController::class, 'read_mes']);
    
    Route::resource('/notif', NotificationController::class)->except('destroy');
    Route::get('/notif/delete/{notif}', [NotificationController::class, 'destroy']);
    Route::get('/delete/notif', [NotificationController::class,'delete_readed']);
    Route::get('read/notif', [NotificationController::class, 'read_all']);
});

// Route::get('/pdf', function () {
//     return view('myDashboard.pages.Reporting.pdf.Rpesanan', [
//         'pesanan' => Pesanan::all(),
//     ]);
// });