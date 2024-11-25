<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardKaryawanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::find(1);
        return view('rekap.dashboardKaryawan',compact('perusahaan'));
    }
}
