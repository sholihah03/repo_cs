<?php

namespace App\Http\Controllers\Cs;

use App\Models\Perusahaan;
use App\Models\Produk;
use App\Models\RekapProduk;
use App\Models\RekapCsTotal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexCs()
    {
        $cs = Auth::guard('cs')->user();
        $jabatan = $cs->jabatan;
        $produkList = Produk::where('karyawan_id', $cs->id_karyawan)->get();
        $perusahaan = Perusahaan::find(1);


        return view('cs.layouts.index', compact('cs', 'jabatan', 'produkList', 'perusahaan'));
    }

    public function getProduct($id)
    {
        $produk = Produk::find($id);

        if ($produk) {
            return response()->json($produk);
        }

        return response()->json(['error' => 'Produk tidak ditemukan.'], 404);
    }

    public function storeRekap(Request $request)
{
    $rekapCsId = Auth::guard('cs')->user()->id_karyawan;
    $jumlahProduk = $request->input('jumlah', []);
    $totalBotol = array_sum($jumlahProduk);

    $rekapCsTotal = new RekapCsTotal([
        'rekap_cs_id' => $rekapCsId,
        'total_botol' => $totalBotol,
    ]);
    $rekapCsTotal->save();

    foreach ($jumlahProduk as $produkId => $jumlah) {
        if ($jumlah > 0) {
            RekapProduk::create([
                'rekap_cs_id' => $rekapCsId,
                'produk_id' => $produkId,
                'total_produk' => $jumlah,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Data rekap produk berhasil disimpan.');
}

    
}
