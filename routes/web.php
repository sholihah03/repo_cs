<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'cs.layouts.index')->name('dashboardcs');
Route::view('/jam', 'cs.layouts.jam')->name('jam');
<<<<<<< HEAD
Route::view('/pemasukan', 'cs.layouts.pemasukan')->name('pemasukan');
Route::view('/rincian', 'cs.layouts.rincian')->name('rincian');
=======
Route::view('/login', 'cs.login.login')->name('login');
>>>>>>> 9ff33aa0778a82ec8a7cdfa9226b93ccc4fd73af
