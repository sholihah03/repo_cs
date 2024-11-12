<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardRekapController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::find(1);
        return view('rekap.dashboardRekap', compact('perusahaan'));
    }
}
