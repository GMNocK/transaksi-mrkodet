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
    Route::get('/resetPassword', [AuthController::class, 'resetPw']);
    Route::post('/resetPassword/action', [AuthController::class, 'resetPwAction']);
});




Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard'); 

Route::resource('/dashboard/users', DashboardUsersController::class)->middleware('auth');

Route::resource('/dashboard/transaksis', DashboardTransController::class)->middleware('auth');

// Route::get('transaksis/report', [ReportController::class, 'index']);

Route::resource('/transaksi/reports', ReportController::class)->middleware('auth');

// Route::resource('/laporankaryawans', LaporanKaryawanController::class)->middleware('auth');
Route::resource('/laporankaryawans', LaporanKaryawanController::class)->middleware('auth');


Route::get('/admin/laporan/karyawan', [ReportForAdminController::class , 'indexKaryawan']);
Route::get('/admin/laporan/karyawan/today', [ReportForAdminController::class , 'todayKaryawan']);
Route::get('/admin/laporan/karyawan/thisMonth', [ReportForAdminController::class , 'thisMonthKaryawan']);
Route::get('/admin/laporan/karyawan/thisYear', [ReportForAdminController::class , 'thisYearKaryawan']);

Route::get('/admin/laporan/pelanggan', [ReportForAdminController::class , 'indexPelanggan']);
Route::get('/admin/laporan/pelanggan/today', [ReportForAdminController::class , 'todayPelanggan']);
Route::get('/admin/laporan/pelanggan/thisMonth', [ReportForAdminController::class , 'thisMonthPelanggan']);


Route::get('/admin/laporan/pelanggan/thisYear', [ReportForAdminController::class , 'thisYearPelanggan']);



// Route::post('/added/DataPelanggan', [DataPelangganController::class, 'FastAddedData'])->name('dpFasterAdd')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    
    Route::get('/myDashboard', [DashboardController::class, 'myDashboard'])->name('myDashboard');
    
    Route::middleware(['IsPelanggan'])->group(function () {
        
        Route::resource('/pesananSaya', PesananController::class)->only('index');
        Route::resource('/pesanan', PesananController::class)->except('index');
        Route::post('/pesanan/bukti/upload/{pesanan}', [PesananController::class, 'upload']);
        Route::get('/pesanan/batal/{pesanan}', [PesananController::class, 'batal']);
        Route::get('/pesanan/delete/{pesanan}', [PesananController::class, 'destroy']);
        
        Route::get('/myDashboard/pesanan/history', [PesananController::class, 'history']);
        
        Route::get('/LaporanSaya', [ReportController::class, 'index']);
        Route::resource('/Laporan', ReportController::class)->except('index');
        Route::get('/Laporan/History', [ReportController::class, 'history']);
    });
    
    Route::middleware(['IsKaryawan', 'IsAdmin'])->group(function () {
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('/delete/transaksi/{transaksi}', [TransaksiController::class, 'destroy']);

        // Terkait Pemesanan \ Pesanan
        Route::get('/pesananPelanggan/{pesanan}', [PesananController::class, 'show'])->name('showPpelanggan');
        Route::post('/pesanan/accept/{pesanan}', [PesananController::class, 'KaryawanAccept']);
        Route::post('/pesanan/progress/{pesanan}', [PesananController::class, 'KarAcceptProgress']);
        Route::post('/pesanan/dikirim/{pesanan}', [PesananController::class, 'tandaiKirim']);
        Route::post('/pesanan/selesai/{pesanan}', [PesananController::class, 'tandaiKirim']);
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

    });

    Route::get('/coba', [Controller::class, 'coba']);
    Route::get('/kirim', [KirimEmailController::class, 'emailVerify']);
    
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/Profile/update/{pelanggan}', [AuthController::class, 'profileUpdate']);

    Route::post('/logout', [AuthController::class, 'logout']);
});