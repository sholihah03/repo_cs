<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Cs\DashboardController;
use App\Http\Controllers\Cs\Setting\SettingController;
use App\Http\Controllers\Cs\RekapCsController;

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
Route::view('/settingcs', 'cs.setting.settingProfile')->name('settingcs');

Route::get('/cs/setting', [SettingController::class, 'index'])->name('setting.cs');
Route::get('/cs/setting/profile', [SettingController::class, 'index'])->name('cs.setting.profile');
Route::put('cs/setting/edit', [SettingController::class, 'storeOrUpdateProfile'])->name('storeProfile.cs');
Route::post('/cs/setting/password', [SettingController::class, 'updatePassword'])->name('setting.password.cs');

Route::view('/rincian', 'rekap.rincian')->name('rincian');
Route::view('/settings', 'rekap.settings')->name('settings');
Route::view('/informasi', 'rekap.informasi')->name('informasi');
Route::view('/edit', 'rekap.edit')->name('edit');
Route::view('/editperusahaan', 'rekap.editperusahaan')->name('editperusahaan');


Route::post('/rekap-cs', [RekapCsController::class, 'store'])->name('rekap_cs.store');