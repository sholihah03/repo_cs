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
        $produkList = Produk::all();
        return view('cs.layouts.index', compact('cs', 'jabatan', 'produkList'));
    }

    public function getProduct($id)
    {
        $produk = Produk::find($id);

        if ($produk) {
            return response()->json($produk);
        }

        return response()->json(['error' => 'Produk tidak ditemukan.'], 404);
    }
    
    
}
