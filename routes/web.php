<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/rincian', 'rekap.rincian')->name('rincian');
Route::view('/setting', 'rekap.setting')->name('setting');
Route::view('/informasi', 'rekap.informasi')->name('informasi');
Route::view('/edit', 'rekap.edit')->name('edit');
Route::view('/login', 'rekap.login')->name('login');