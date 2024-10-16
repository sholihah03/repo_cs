<?php

namespace App\Http\Controllers\Cs;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexCs()
    {
        $cs = Auth::guard('cs')->user();
        $jabatan = $cs->jabatan;
        $produk = Produk::all();
        // return view('cs.layouts.inde');
        return view('cs.layouts.index', compact('cs', 'jabatan', 'produk'));
    }
}
