<?php

namespace App\Http\Controllers\Rekap;

use Illuminate\Http\Request;
use App\Models\KontakPerusahaan;
use App\Http\Controllers\Controller;

class KontakPerusahaanController extends Controller
{

    public function index(){
        $kontakPerusahaan = KontakPerusahaan::where('perusahaan_id', 1)->first();

        return view('rekap.perusahaan.kontakperusahaan', compact('kontakPerusahaan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'no_telepon' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'wa' => 'nullable|string|max:255',
        ]);

        // Simpan atau update data ke database
        KontakPerusahaan::updateOrCreate(
            ['perusahaan_id' => 1], // Ubah sesuai dengan id_perusahaan yang relevan
            [
                'no_telepon' => $validated['no_telepon'],
                'email' => $validated['email'],
                'instagram' => $validated['instagram'],
                'wa' => $validated['wa'],
            ]
        );

        // Redirect dengan pesan sukses
        return redirect()->route('rekapPerusahaan')->with('success', 'Kontak perusahaan berhasil disimpan.');
    }
}
