<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Cs\DashboardController;
use App\Http\Controllers\Rekap\NeracaController;
use App\Http\Controllers\Cs\Setting\SettingController;
use App\Http\Controllers\Rekap\RekapPerusahaanController;
use App\Http\Controllers\Rekap\AlamatPerusahaanController;
use App\Http\Controllers\Rekap\KontakPerusahaanController;
use App\Http\Controllers\Cs\Setting\SettingProfileController;
use App\Http\Controllers\Rekap\DataTransaksiController;

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
Route::view('/informasi', 'rekap.informasi')->name('informasi');
Route::view('/edit', 'rekap.edit')->name('edit');
Route::view('/editperusahaan', 'rekap.editperusahaan')->name('editperusahaan');
Route::view('/kontakperusahaan', 'rekap.kontakperusahaan')->name('kontakperusahaan');
Route::view('/alamatperusahaan', 'rekap.alamatperusahaan')->name('alamatperusahaan');

// Route::post('/rekapperusahaan/store', [RekapPerusahaanController::class, 'store'])->name('rekapperusahaan.store');
Route::post('/rekapPerusahaan/store', [RekapPerusahaanController::class, 'store'])->name('rekapPerusahaan.store');
Route::post('/kontakperusahaan/store', [KontakPerusahaanController::class, 'store'])->name('kontakperusahaan.store');
Route::post('/alamatperusahaan/store', [AlamatPerusahaanController::class, 'store'])->name('alamatperusahaan.store');
Route::get('/profile', [RekapPerusahaanController::class, 'showProfile'])->name('profile');
// Rute untuk menampilkan daftar produk
// Route::view('/produk', 'rekap.produk')->name('produk.index');
// Rute untuk daftar produk
Route::get('/produk', [ProdukController::class, 'index'])->name('rekap.produk');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('rekap.createproduk');
Route::post('/produk1', [ProdukController::class, 'store'])->name('produk.store'); // ini yang benar
Route::get('/produk/{id_produk}/edit', [ProdukController::class, 'edit'])->name('editproduk');
Route::put('/produk/{id_produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id_produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::get('/produk2', [ProdukController::class, 'index'])->name('produk.index');

//neraca
Route::get('/neraca', [NeracaController::class, 'index'])->name('neraca.index');
Route::post('/rekap/neraca/store', [NeracaController::class, 'store'])->name('rekap.neraca.store');
Route::post('/rekap/transaksi/store', [DataTransaksiController::class, 'store'])->name('rekap.transaksi.store');