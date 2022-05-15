<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\LayananController;
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
});

Route::controller(HelpdeskController::class)->middleware(['auth', 'verified', 'is_helpdesk'])->group(function () {
    Route::get('dashboardHelpdesk', 'index')->name('helpdesk.index');
    Route::get('kelolaPengguna', 'pengguna')->name('helpdesk.pengguna');
    Route::post('simpanPengguna', 'store')->name('helpdesk.store');
    Route::put('kelolaPengguna/{id}', 'update')->name('helpdesk.update');
    Route::delete('kelolaPengguna/{id}', 'destroy')->name('helpdesk.destroy');
});

Route::controller(PengaduanController::class)->middleware(['auth', 'verified', 'is_helpdesk'])->group(function () {
    Route::get('pengaduanHelpdesk', 'index')->name('pengaduan.index');
    Route::post('pengaduanHelpdesk', 'store')->name('pengaduan.store');
    Route::put('pengaduanHelpdesk/{id}', 'update')->name('pengaduan.update');
    Route::delete('pengaduanHelpdesk/{id}', 'destroy')->name('pengaduan.destroy');
    Route::get('laporanHelpdesk', 'laporan')->name('pengaduan.laporan');
    Route::put('disposisiPengaduan/{id}', 'disposisi')->name('pengaduan.disposisi');
});

Route::controller(LayananController::class)->middleware(['auth', 'verified', 'is_helpdesk'])->group(function () {
    Route::get('layanan', 'index')->name('layanan.index');
    Route::put('layananPegawai/{id}', 'update')->name('layanan.update');
    Route::delete('layananPegawai/{id}', 'destroy')->name('layanan.destroy');
    Route::get('laporanLayanan', 'laporan')->name('layanan.laporan');
    Route::put('disposisiLayanan/{id}', 'disposisi')->name('layanan.disposisi');
});

Route::controller(PegawaiController::class)->middleware(['auth', 'verified', 'is_pegawai'])->group(function () {
    Route::get('dashboardPegawai', 'index')->name('pegawai.index');
    Route::get('pengaduanPegawai', 'show')->name('pegawai.show');
    Route::post('pengaduanPegawai', 'store')->name('pegawai.store');
    Route::post('pengaduanPegawai/{id}', 'tanggapan')->name('pegawai.tanggapan');
    Route::get('tambahLayananPegawai', 'layanan')->name('pegawai.layanan');
    Route::post('tambahLayananPegawai', 'simpan')->name('pegawai.simpan');
    Route::get('riwayatLayananPegawai', 'riwayat')->name('pegawai.riwayat');
    Route::get('trackingPegawai', 'tracking')->name('pegawai.tracking');
    Route::get('tiketPegawai', 'tiket')->name('pegawai.tiket');
    Route::post('kodePegawai', 'kode')->name('pegawai.kode');
    Route::get('layananPegawai', 'showLayanan')->name('pegawai.showLayanan');
    Route::post('layananPegawai/{id}', 'tanggapanLayanan')->name('pegawai.tanggapanLayanan');
});

require __DIR__ . '/auth.php';
