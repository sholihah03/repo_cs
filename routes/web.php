<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'cs.layouts.index')->name('dashboardcs');
Route::view('/jam', 'cs.layouts.jam')->name('jam');
Route::view('/pemasukan', 'cs.layouts.pemasukan')->name('pemasukan');
Route::view('/rincian', 'cs.layouts.rincian')->name('rincian');
