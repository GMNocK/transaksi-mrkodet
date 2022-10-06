<?php

use App\Http\Controllers\DashboardTransController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [HomeController::class, 'index'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/admin', [LoginController::class, 'admin'])->name('admin');


Route::get('/dashboard', function ()
{
    return view('admin.index',[
        'title' => 'dasboard'
    ]);
})->middleware('auth'); 

Route::resource('/dashboard/transaksis', DashboardTransController::class)->middleware('auth');