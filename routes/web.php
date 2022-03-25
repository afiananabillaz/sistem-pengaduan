<?php

use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\RiwayatPengaduanController;
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

Route::get('/dashboardPenyedia', [PenyediaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('penyedia.index');

Route::get('/riwayatPengaduanPenyedia', [RiwayatPengaduanController::class, 'index'])
    ->name('riwayat.index');

Route::post('/riwayatPengaduanPenyedia', [RiwayatPengaduanController::class, 'store'])
    ->name('riwayat.store');

Route::get('/trackingPenyedia', [PenyediaController::class, 'tracking'])
    ->name('penyedia.tracking');

Route::post('/trackingPenyedia', [PenyediaController::class, 'store'])
    ->name('penyedia.tracking.store');


Route::get('/dashboardHelpdesk', [HelpdeskController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('helpdesk.index');

Route::get('/pengaduanHelpdesk', [PengaduanController::class, 'index'])
    ->name('pengaduan.index');

Route::post('/pengaduanHelpdesk', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');

Route::get('/laporanHelpdesk', [HelpdeskController::class, 'show'])
    ->name('helpdesk.show');

Route::post('/laporanHelpdesk', [PengaduanController::class, 'store'])
    ->name('laporan.store');

Route::get('/akumulasiHelpdesk', [HelpdeskController::class, 'akumulasi'])
    ->name('helpdesk.akumulasi');

Route::post('/akumulasiHelpdesk', [PengaduanController::class, 'store'])
    ->name('helpdesk.akumulasi.store');

Route::get('/kelolaPengguna', [HelpdeskController::class, 'pengguna'])
    ->name('helpdesk.pengguna');

Route::post('/kelolaPengguna', [HelpdeskController::class, 'store'])
    ->name('helpdesk.store');


Route::get('/dashboardPegawai', [PegawaiController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('pegawai.index');

Route::get('/pengaduanPegawai', [PegawaiController::class, 'show'])
    ->name('pegawai.show');

Route::post('/pengaduanPegawai', [PegawaiController::class, 'store'])
    ->name('pegawai.store');

Route::get('/tambahLayananPegawai', [PegawaiController::class, 'layanan'])
    ->name('pegawai.layanan');

Route::get('/riwayatLayananPegawai', [PegawaiController::class, 'riwayat'])
    ->name('pegawai.riwayat');

Route::post('/riwayatLayananPegawai', [PegawaiController::class, 'store'])
    ->name('pegawai.store');

Route::get('/trackingPegawai', [PegawaiController::class, 'tracking'])
    ->name('pegawai.tracking');

require __DIR__ . '/auth.php';
