<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardTransController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DataPelangganController;
use App\Http\Controllers\FeedbackKaryawanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanKaryawanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportForAdminController;

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

Route::get('/ini', function ()
{
    return view('dab');
});


Route::get('/', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login' ,[UserController::class, 'loginAction']);
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'registerAction']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// FORGOT PASSWORD
Route::get('/forgot', [UserController::class, 'forgotPw'])->name('forgotPw');
Route::post('/forgotNext', [UserController::class, 'forgotGetEmail']);
Route::post('/forgotLast', [UserController::class, 'forgotGetLastPw']);

// RESET PASSWORD
Route::get('/resetPassword', [UserController::class, 'resetPw']);
Route::post('/resetPassword/action', [UserController::class, 'resetPwAction']);

// --------------------------------------------------------------------------------------------------

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard'); 

Route::resource('/dashboard/users', DashboardUsersController::class)->middleware('auth');

Route::resource('/dashboard/transaksis', DashboardTransController::class)->middleware('auth');

// Route::get('transaksis/report', [ReportController::class, 'index']);

Route::resource('/transaksi/reports', ReportController::class)->middleware('auth');

// Route::resource('/laporankaryawans', LaporanKaryawanController::class)->middleware('auth');
Route::resource('/laporankaryawans', LaporanKaryawanController::class)->middleware('auth');

Route::get('/karyawan/laporanuser', [KaryawanController::class, 'pelangganReport'])->middleware('auth');

Route::post('/karyawan/laporanuser/reply/{laporanPelanggan}', [KaryawanController::class, 'replyPelangganR'])->name('indexReply')->middleware('auth');

// Route::post('/karyawan/laporanuser/reply', [KaryawanController::class, 'FeedbackKaryawan'])->middleware('auth');
Route::resource('/karyawan/laporanuser/reply', FeedbackKaryawanController::class)->middleware('auth');

Route::get('/admin/laporan/karyawan', [ReportForAdminController::class , 'indexKaryawan']);
Route::get('/admin/laporan/karyawan/today', [ReportForAdminController::class , 'todayKaryawan']);
Route::get('/admin/laporan/karyawan/thisMonth', [ReportForAdminController::class , 'thisMonthKaryawan']);
Route::get('/admin/laporan/karyawan/thisYear', [ReportForAdminController::class , 'thisYearKaryawan']);

Route::get('/admin/laporan/pelanggan', [ReportForAdminController::class , 'indexPelanggan']);
Route::get('/admin/laporan/pelanggan/today', [ReportForAdminController::class , 'todayPelanggan']);
Route::get('/admin/laporan/pelanggan/thisMonth', [ReportForAdminController::class , 'thisMonthPelanggan']);


Route::get('/admin/laporan/pelanggan/thisYear', [ReportForAdminController::class , 'thisYearPelanggan']);


Route::resource('/dashboard/dataPelanggan', DataPelangganController::class)->middleware('auth');

Route::post('/added/DataPelanggan', [DataPelangganController::class, 'FastAddedData'])->name('dpFasterAdd')->middleware('auth');