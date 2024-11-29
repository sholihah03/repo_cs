<?php

namespace App\Http\Controllers\Cs;

use App\Models\Produk;
use App\Models\RekapCs;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RekapCsController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::first();
        // Ambil semua produk untuk dropdown
        $produkList = Produk::all();

        // Ambil produk yang terpilih dari session
        $produkTerpilih = session('produkTerpilih', null);

        return view('cs.layouts.index', compact('produkList', 'produkTerpilih', 'perusahaan'));
    }
    public function store(Request $request)
    {

        // Validasi input
        $request->validate([
            'total_lead' => 'required|integer',
            'total_closing' => 'required|integer',
            'produk_id' => 'nullable|exists:produk,id',
            'jumlah' => 'nullable|integer'
        ]);

        // Ambil ID karyawan yang sedang login
        $karyawan = Auth::guard('cs')->user();

        // Simpan data ke tabel rekap_cs
        RekapCs::create([
            'karyawan_id' => $karyawan->id_karyawan,
            'total_lead' => $request->input('total_lead'),
            'total_closing' => $request->input('total_closing'),
            'produk_id' => $request->input('produk_id'), // Tambahkan produk_id jika ada
            'jumlah' => $request->input('jumlah'), // Tambahkan jumlah jika ada
        ]);

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('dashboardcs')->with('success', 'Data pemasukan berhasil disimpan.');
      }
//       public function storeproduk(Request $request)
// {
//     $request->validate([
//         'produk_id' => 'required',
//         // Validasi lainnya
//     ]);

//     // Simpan produk terpilih di session
//     $produkTerpilih = Produk::find($request->produk_id);
//     session(['produkTerpilih' => $produkTerpilih]);

//     // Redirect ke halaman yang sesuai setelah menyimpan
//     return redirect()->route('dashboardcs');
// }

}
