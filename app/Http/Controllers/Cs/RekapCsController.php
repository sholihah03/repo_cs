<?php

namespace App\Http\Controllers\Cs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekapCs;

class RekapCsController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'lead' => 'required|integer',
            'closing' => 'required|integer',
        ]);

        // Simpan data ke tabel rekap_cs
        RekapCs::create([
            'total_lead' => $request->input('lead'),
            'total_closing' => $request->input('closing'),
        ]);

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
