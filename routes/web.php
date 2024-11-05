<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Cs\DashboardController;
use App\Http\Controllers\Rekap\EditCSController;
use App\Http\Controllers\Rekap\KaryawanController;
use App\Http\Controllers\Rekap\InformasiController;
use App\Http\Controllers\Rekap\HistoryAkunController;
use App\Http\Controllers\Cs\Setting\SettingController;
use App\Http\Controllers\Rekap\RekapPerusahaanController;
use App\Http\Controllers\Rekap\AlamatPerusahaanController;
use App\Http\Controllers\Rekap\KontakPerusahaanController;
use App\Http\Controllers\Cs\Setting\SettingProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/storage-link', function () {
    $target = storage_path('app/public');  // Target folder yang akan disimbolkan
    $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';  // Lokasi link di public_html

    // Cek apakah link sudah ada
    if (file_exists($link)) {
        return 'The "storage" directory already exists!';
    }

    symlink($target, $link);  // Buat symlink manual

    return 'Storage link has been created successfully!';
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginrekap');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::view('/dashboard', 'cs.layouts.index')->name('dashboardcs');
Route::get('/dashboardCs', [DashboardController::class, 'indexCs'])->name('dashboardcs');
Route::view('/jam', 'cs.layouts.jam')->name('jam');
Route::get('/cs/setting', [SettingController::class, 'index'])->name('settingcs');
Route::put('/cs/setting/update', [SettingController::class, 'update'])->name('updateProfile.cs');
Route::post('/cs/profile/update', [SettingProfileController::class, 'updateProfilePhoto'])->name('cs.profile.update');
Route::delete('/cs/profile/delete', [SettingProfileController::class, 'deleteProfilePhoto'])->name('cs.profile.delete');
Route::post('/cs/setting/password', [SettingController::class, 'resetPassword'])->name('setting.password.cs');

Route::view('/rincian', 'rekap.rincian')->name('rincian');
Route::view('/settings', 'rekap.settings')->name('settings');
Route::get('/informasipegawai', [InformasiController::class, 'index'])->name('informasipegawai');
Route::view('/edit', 'rekap.edit')->name('edit');
Route::view('/editperusahaan', 'rekap.editperusahaan')->name('editperusahaan');
Route::view('/kontakperusahaan', 'rekap.kontakperusahaan')->name('kontakperusahaan');
Route::view('/alamatperusahaan', 'rekap.alamatperusahaan')->name('alamatperusahaan');

// Route::post('/rekapperusahaan/store', [RekapPerusahaanController::class, 'store'])->name('rekapperusahaan.store');
Route::post('/rekapPerusahaan/store', [RekapPerusahaanController::class, 'store'])->name('rekapPerusahaan.store');
Route::post('/kontakperusahaan/store', [KontakPerusahaanController::class, 'store'])->name('kontakperusahaan.store');
Route::post('/alamatperusahaan/store', [AlamatPerusahaanController::class, 'store'])->name('alamatperusahaan.store');
Route::get('/profile', [RekapPerusahaanController::class, 'showProfile'])->name('profile');

// Route::view('/tambahpegawai', 'rekap.tambahpegawai')->name('tambahpegawai');
Route::view('/dashboardRekap', 'rekap.dashboard')->name('dashboardRekap');
// Route::get('/karyawan/create', function () {
//     return view('rekap.informasipegawai'); // Render the form view
// })->name('karyawan.create');
Route::get('/karyawan/index', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::put('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::get('/informasi/index', [InformasiController::class, 'index'])->name('informasi.index');

Route::get('/karyawan/filter', [KaryawanController::class, 'filter'])->name('karyawan.filter');
Route::get('/historyakun', [HistoryAkunController::class, 'index'])->name('historyakun');
Route::delete('/rekap/karyawan/{id}', [InformasiController::class, 'destroy'])->name('karyawan.destroy');

