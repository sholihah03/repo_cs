<?php

use App\Http\Controllers\Cs\NotifikasiCsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckCsAuthenticated;
use App\Http\Controllers\Cs\RekapCsController;
use App\Http\Controllers\Cs\DashboardController;

use App\Http\Controllers\Rekap\NeracaController;
use App\Http\Controllers\Rekap\PersenController;
use App\Http\Controllers\Rekap\ProdukController;
use App\Http\Controllers\Rekap\KaryawanController;
use App\Http\Middleware\CheckManagerAuthenticated;
use App\Http\Controllers\Rekap\InformasiController;
use App\Http\Controllers\Rekap\DataRekapcsController;
use App\Http\Controllers\Rekap\HistoryAkunController;
use App\Http\Controllers\Cs\Setting\SettingController;
use App\Http\Controllers\Rekap\DataTransaksiController;
use App\Http\Controllers\Rekap\DashboardRekapController;
use App\Http\Controllers\Rekap\PembagianProdukController;
use App\Http\Controllers\Rekap\RekapPerusahaanController;
use App\Http\Controllers\Rekap\AlamatPerusahaanController;
use App\Http\Controllers\Rekap\KontakPerusahaanController;
use App\Http\Controllers\Rekap\DashboardDirekturController;
use App\Http\Controllers\Rekap\DashboardKaryawanController;
use App\Http\Controllers\Cs\Setting\SettingProfileController;
use App\Http\Controllers\Rekap\DashboardAdvertiserController;

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

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginrekap');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard Admin
Route::get('/dashboardDirektur', [DashboardDirekturController::class, 'index'])->name('dashboardDirektur');
Route::get('/get-manager-data', [DashboardDirekturController::class, 'getManagerData'])->name('getManagerData');
Route::get('/get-karyawan-data', [DashboardDirekturController::class, 'getKaryawanData'])->name('getKaryawanData');
Route::get('/get-cs-data', [DashboardDirekturController::class, 'getCsData'])->name('getCsData');
Route::get('/get-advertiser-data', [DashboardDirekturController::class, 'getAdvertiserData'])->name('getAdvertiserData');
Route::get('/dashboardKaryawan', [DashboardKaryawanController::class, 'index'])->name('dashboardKaryawan');
Route::get('/dashboardAdvertiser', [DashboardAdvertiserController::class, 'index'])->name('dashboardAdvertiser');

Route::middleware(CheckCsAuthenticated::class)->group(function () {
//cs
Route::get('/dashboardCs', [DashboardController::class, 'indexCs'])->name('dashboardcs');
Route::get('/notifikasics', [NotifikasiCsController::class, 'index'])->name('notifikasi');
Route::view('/jam', 'cs.layouts.jam')->name('jam');
Route::get('/cs/setting', [SettingController::class, 'index'])->name('settingcs');
Route::put('/cs/setting/update', [SettingController::class, 'update'])->name('updateProfile.cs');
Route::post('/cs/profile/update', [SettingProfileController::class, 'updateProfilePhoto'])->name('cs.profile.update');
Route::delete('/cs/profile/delete', [SettingProfileController::class, 'deleteProfilePhoto'])->name('cs.profile.delete');
Route::post('/cs/setting/password', [SettingController::class, 'resetPassword'])->name('setting.password.cs');
Route::post('/rekap-cs', [RekapCsController::class, 'store'])
     ->name('rekap_cs.store');
Route::get('/cs/produk/{id}', [DashboardController::class, 'getProduct']);
Route::post('/produkterpilih', [ProdukController::class, 'storeproduk'])->name('produkterpilih');
Route::post('/cs/rekap/store', [DashboardController::class, 'storeRekap'])->name('cs.rekap.store');
Route::post('/cs/rekap', [DashboardController::class, 'storeRekap'])->name('cs.storeRekap');
});

// Route::middleware(CheckDirekturAuthenticatedMiddleware::class)->group(function () {
//     Route::get('/dashboardRekap', [DashboardRekapController::class, 'index'])->name('dashboardRekap');
// });

Route::middleware(CheckManagerAuthenticated::class)->group(function () {
    Route::get('/dashboardRekap', [DashboardRekapController::class, 'index'])->name('dashboardRekap');

    Route::view('/rincian', 'rekap.rincian')->name('rincian');
    Route::view('/informasi', 'rekap.informasi')->name('informasi');
    Route::get('/rekapdata', [DataRekapcsController::class, 'index'])->name('rekapdata');
    
    Route::post('/notifikasi-cs/store', [NotifikasiCsController::class, 'store'])->name('notifikasi.cs.store');


    Route::get('/rekap/search-karyawan', [DataRekapcsController::class, 'searchKaryawan'])->name('rekap.search.karyawan');
    Route::get('/rekap/search-karyawan-target', [DataRekapcsController::class, 'searchKaryawanTarget'])->name('rekap.search.karyawan.target');

    Route::post('/rekap/hasilcs', [DataRekapcsController::class, 'store'])->name('hasilcs.store');
    Route::get('/search-karyawan', [DataRekapcsController::class, 'searchKaryawanByNama'])
    ->name('search.karyawan');


    //Rekap_Perusahaan
    Route::get('/settingPerusahaan', [RekapPerusahaanController::class, 'index'])->name('rekapPerusahaan');
    Route::get('/editPerusahaan', [RekapPerusahaanController::class, 'indexEdit'])->name('editPerusahaan');
    Route::post('/rekapPerusahaan/store', [RekapPerusahaanController::class, 'store'])->name('rekapPerusahaan.store');
    Route::get('/kontakPerusahaan', [KontakPerusahaanController::class, 'index'])->name('kontakperusahaan');
    Route::post('/kontakperusahaan/store', [KontakPerusahaanController::class, 'store'])->name('kontakperusahaan.store');
    Route::get('/alamatPerusahaan', [AlamatPerusahaanController::class, 'index'])->name('alamatperusahaan');
    Route::post('/alamatperusahaan/store', [AlamatPerusahaanController::class, 'store'])->name('alamatperusahaan.store');
    Route::get('/profile', [RekapPerusahaanController::class, 'showProfile'])->name('profile');

    //Rekap_Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('rekap.produk');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('rekap.createproduk');
    Route::post('/produk1', [ProdukController::class, 'store'])->name('produk.store'); // ini yang benar
    Route::get('/produk/{id_produk}/edit', [ProdukController::class, 'edit'])->name('editproduk');
    // Route::put('/produk/{id_produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::put('/produk/{id_produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id_produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::get('/produk2', [ProdukController::class, 'index'])->name('produk.index');
    // Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

    //Rekap_Persen
    Route::get('/persen', [PersenController::class, 'index'])->name('persen.index');
    Route::get('/persen/edit', [PersenController::class, 'indexEdit'])->name('persen.edit');
    Route::get('/persen/edit/target', [PersenController::class, 'indexEditTarget'])->name('persen.target.edit');
    Route::post('/persenPerusahaan', [PersenController::class, 'store'])->name('persen.store');
    Route::post('/persenTargetPerusahaan', [PersenController::class, 'storeTarget'])->name('persen.target.store');

    //Rekap_Neraca
    Route::get('/neraca', [NeracaController::class, 'index'])->name('neraca.index');
    Route::post('/rekap/neraca/store', [NeracaController::class, 'store'])->name('rekap.neraca.store');
    Route::post('/rekap/transaksi/store', [DataTransaksiController::class, 'store'])->name('rekap.transaksi.store');
    Route::get('/grafik-transaksi', [DataTransaksiController::class, 'getTransaksiPerBulan'])->name('rekap.grafikTransaksi');

    //Rekap_PembagianProdukCS
    Route::get('/pembagianProdukCS', [PembagianProdukController::class, 'index'])->name('pembagianProdukCS.index');
    Route::get('/pembagianProdukCS/tambah', [PembagianProdukController::class, 'indexTambah'])->name('pembagianProdukCS.tambah');
    Route::post('pembagianProdukCS/store', [PembagianProdukController::class, 'store'])->name('pembagianProdukCS.store');
    Route::get('/pembagianProdukCS/edit/{id}', [PembagianProdukController::class, 'indexEdit'])->name('pembagianProdukCS.edit');
    Route::put('/pembagianProdukCS/update/{id}', [PembagianProdukController::class, 'update'])->name('pembagianProdukCS.update');

//Rekap_Pegawai
Route::get('/karyawan/index', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::put('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::get('/informasi/index', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/karyawan/filter', [KaryawanController::class, 'filter'])->name('karyawan.filter');
Route::get('/historyakun', [HistoryAkunController::class, 'index'])->name('historyakun');
Route::delete('/rekap/karyawan/{id}', [InformasiController::class, 'destroy'])->name('karyawan.destroy');
Route::get('/informasipegawai', [InformasiController::class, 'index'])->name('informasipegawai');

});
