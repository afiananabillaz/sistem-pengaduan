<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RiwayatPengaduanController;

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
    if (Auth::check()) {
        if (Auth::user()->role == 'pegawai') {
            return redirect(RouteServiceProvider::PEGAWAI);
        } elseif (Auth::user()->role == 'penyedia') {
            return redirect(RouteServiceProvider::HOME);
        } elseif (Auth::user()->role == 'helpdesk') {
            return redirect(RouteServiceProvider::HELPDESK);
        }
    } else {
        return view('welcome');
    }
});

Route::controller(PenyediaController::class)->middleware(['auth', 'verified', 'is_penyedia'])->group(function () {
    Route::get('dashboardPenyedia', 'index')->name('penyedia.index');
    Route::post('dashboardPenyedia', 'store')->name('penyedia.store');
    Route::get('trackingPenyedia', 'tracking')->name('penyedia.tracking');
    Route::post('kodePenyedia', 'kode')->name('penyedia.kode');
    Route::get('tiketPenyedia', 'tiket')->name('penyedia.tiket');    
});

Route::controller(RiwayatPengaduanController::class)->middleware(['auth', 'verified', 'is_penyedia'])->group(function () {
    Route::get('riwayatPengaduanPenyedia', 'index')->name('riwayat.index');
    Route::get('riwayatPengaduanPenyedia/{id}', 'show')->name('riwayat.show');
});

Route::controller(HelpdeskController::class)->middleware(['auth', 'verified', 'is_helpdesk'])->group(function () {
    Route::get('dashboardHelpdesk', 'index')->name('helpdesk.index');
    Route::get('akumulasiHelpdesk', 'akumulasi')->name('helpdesk.akumulasi');
    Route::get('kelolaPengguna', 'pengguna')->name('helpdesk.pengguna');
    Route::post('simpanPengguna', 'store')->name('helpdesk.store');
    Route::post('kelolaPengguna/{id}', 'update')->name('helpdesk.update');
    Route::delete('kelolaPengguna/{id}', 'destroy')->name('helpdesk.destroy');
});

Route::controller(PengaduanController::class)->middleware(['auth', 'verified', 'is_helpdesk'])->group(function () {
    Route::get('pengaduanHelpdesk', 'index')->name('pengaduan.index');
    Route::post('pengaduanHelpdesk', 'store')->name('pengaduan.store');
    Route::put('pengaduanHelpdesk/{id}', 'update')->name('pengaduan.update');
    Route::delete('pengaduanHelpdesk/{id}', 'destroy')->name('pengaduan.destroy');
    Route::get('laporanHelpdesk', 'laporan')->name('pengaduan.laporan');
});

Route::controller(PegawaiController::class)->middleware(['auth', 'verified', 'is_pegawai'])->group(function () {
    Route::get('dashboardPegawai', 'index')->name('pegawai.index');
    Route::get('pengaduanPegawai', 'show')->name('pegawai.show');
    Route::post('pengaduanPegawai', 'store')->name('pegawai.store');
    Route::get('tambahLayananPegawai', 'layanan')->name('pegawai.layanan');
    Route::get('riwayatLayananPegawai', 'riwayat')->name('pegawai.riwayat');
    Route::post('riwayatLayananPegawai', 'simpan')->name('pegawai.simpan');
    Route::get('trackingPegawai', 'tracking')->name('pegawai.tracking');
});

require __DIR__ . '/auth.php';
