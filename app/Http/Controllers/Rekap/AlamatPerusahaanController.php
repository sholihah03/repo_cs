<?php

namespace App\Http\Controllers\Rekap;

use Illuminate\Http\Request;
use App\Models\AlamatPerusahaan;
use App\Http\Controllers\Controller;

class AlamatPerusahaanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'provinsi' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'detail_lainnya' => 'nullable|string|max:255',
        ]);

        // Simpan data ke database
        AlamatPerusahaan::create([
            'perusahaan_id' => 1, // Ganti dengan perusahaan_id yang relevan
            'provinsi' => $validated['provinsi'],
            'kabupaten' => $validated['kabupaten'],
            'kecamatan' => $validated['kecamatan'],
            'kelurahan' => $validated['kelurahan'],
            'kode_pos' => $validated['kode_pos'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
            'detail_lainnya' => $validated['detail_lainnya'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Alamat perusahaan berhasil ditambahkan.');
    }
}

