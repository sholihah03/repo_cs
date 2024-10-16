<?php

namespace App\Http\Controllers\Cs;

use App\Models\Produk;
use App\Models\RekapCs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RekapCsController extends Controller
{
    public function store(Request $request)
    {
            // Periksa apakah karyawan terautentikasi
        if (!Auth::guard('karyawan')->check()) {
            return redirect()->route('loginrekap')->withErrors(['message' => 'Anda harus login terlebih dahulu.']);
        }

        // Validasi input
        $request->validate([
            'total_lead' => 'required|integer',
            'total_closing' => 'required|integer',
        ]);

        // Ambil ID karyawan yang sedang login
        $karyawan = Auth::guard('karyawan')->user();

        // Simpan data ke tabel rekap_cs
        RekapCs::create([
            'total_lead' => $request->input('total_lead'),
            'total_closing' => $request->input('total_closing'),
            'karyawan_id' => $karyawan->id, // Simpan ID karyawan yang sedang login
        ]);

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
