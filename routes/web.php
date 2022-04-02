<?php

use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\RiwayatPengaduanController;
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

Route::controller(PenyediaController::class)->middleware(['auth', 'verified', 'is_penyedia'])->group(function () {
    Route::get('dashboardPenyedia', 'index')->name('penyedia.index');
    Route::get('trackingPenyedia', 'tracking')->name('penyedia.tracking');
    Route::post('trackingPenyedia', 'store')->name('penyedia.store');
});

Route::controller(RiwayatPengaduanController::class)->middleware(['auth', 'verified', 'is_penyedia'])->group(function () {
    Route::get('riwayatPengaduanPenyedia', 'index')->name('riwayat.index');
    Route::post('riwayatPengaduanPenyedia', 'store')->name('riwayat.store');
});

Route::controller(HelpdeskController::class)->middleware(['auth', 'verified', 'is_helpdesk'])->group(function () {
    Route::get('dashboardHelpdesk', 'index')->name('helpdesk.index');
    Route::get('laporanHelpdesk', 'show')->name('helpdesk.show');
    Route::get('akumulasiHelpdesk', 'akumulasi')->name('helpdesk.akumulasi');
    Route::get('kelolaPengguna', 'pengguna')->name('helpdesk.pengguna');
    Route::post('kelolaPengguna', 'store')->name('helpdesk.store');
});

Route::controller(PengaduanController::class)->middleware(['auth', 'verified', 'is_helpdesk'])->group(function () {
    Route::get('pengaduanHelpdesk', 'index')->name('pengaduan.index');
    Route::post('pengaduanHelpdesk', 'store')->name('pengaduan.store');
    Route::post('laporanHelpdesk', 'store')->name('laporan.store');
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
