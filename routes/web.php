<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'cs.layouts.index')->name('dashboardcs');
Route::view('/jam', 'cs.layouts.jam')->name('jam');
Route::view('/login', 'cs.login.login')->name('login');

Route::view('/rincian', 'rekap.rincian')->name('rincian');
Route::view('/setting', 'rekap.setting')->name('setting');
Route::view('/informasi', 'rekap.informasi')->name('informasi');
Route::view('/edit', 'rekap.edit')->name('edit');
Route::view('/login', 'rekap.login')->name('login');


Route::view('/settingcs', 'cs.setting.settingProfile')->name('settingcs');
