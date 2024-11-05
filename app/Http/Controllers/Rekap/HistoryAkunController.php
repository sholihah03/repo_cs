<?php

namespace App\Http\Controllers\Rekap;

use App\Models\HistoryAkun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryAkunController extends Controller
{
    public function index(Request $request)
    {
        $historyakun = HistoryAkun::all();

        return view('rekap.pegawai.historyakun', compact('historyakun'));
    }
}
