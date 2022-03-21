<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginBaru', function () {
    return view('loginBaru');
});

Route::get('/dashboardPenyedia', function () {
    return view('penyedia.dashboardPenyedia');
});

Route::get('/riwayatPengaduanPenyedia', function () {
    return view('penyedia.riwayatPengaduanPenyedia');
});

Route::get('/trackingPenyedia', function () {
    return view('penyedia.trackingPenyedia');
});

Route::get('/dashboardHelpdesk', function () {
    return view('helpdesk.dashboardHelpdesk');
});

Route::get('/pengaduanHelpdesk', function () {
    return view('helpdesk.pengaduanHelpdesk');
});

Route::get('/laporanHelpdesk', function () {
    return view('helpdesk.laporanHelpdesk');
});

Route::get('/akumulasiHelpdesk', function () {
    return view('helpdesk.akumulasiHelpdesk');
});

Route::get('/kelolaPengguna', function () {
    return view('helpdesk.kelolaPengguna');
});

Route::get('/dashboardPegawai', function () {
    return view('pegawai.dashboardPegawai');
});

Route::get('/pengaduanPegawai', function () {
    return view('pegawai.pengaduanPegawai');
});


Route::get('/tambahLayananPegawai', function () {
    return view('pegawai.tambahLayananPegawai');
});


Route::get('/riwayatLayananPegawai', function () {
    return view('pegawai.riwayatLayananPegawai');
});

Route::get('/trackingPegawai', function () {
    return view('pegawai.trackingPegawai');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
