<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersenController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('rekap.settings', compact('perusahaan'));
    }

    public function indexx()
    {
        $perusahaan = Perusahaan::all();
        return view('rekap.popupPersen', compact('perusahaan'));
    }
}
