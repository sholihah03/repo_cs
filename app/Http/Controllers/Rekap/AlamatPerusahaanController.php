<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\AlamatPerusahaan;
use App\Http\Controllers\Controller;

class AlamatPerusahaanController extends Controller
{
    public function index(){
        $perusahaan = Perusahaan::find(1);
        $alamatPerusahaan = AlamatPerusahaan::where('perusahaan_id', 1)->first();

        return view('rekap.perusahaan.alamatperusahaan', compact('alamatPerusahaan', 'perusahaan'));
    }
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

        // Update data yang ada atau buat baru jika tidak ditemukan
        AlamatPerusahaan::updateOrCreate(
            ['perusahaan_id' => 1], // Kondisi untuk mencari data berdasarkan perusahaan_id
            [
                'provinsi' => $validated['provinsi'],
                'kabupaten' => $validated['kabupaten'],
                'kecamatan' => $validated['kecamatan'],
                'kelurahan' => $validated['kelurahan'],
                'kode_pos' => $validated['kode_pos'],
                'rt' => $validated['rt'],
                'rw' => $validated['rw'],
                'detail_lainnya' => $validated['detail_lainnya'],
            ]
        );

        // Redirect dengan pesan sukses
        return redirect()->route('rekapPerusahaan')->with('success', 'Alamat perusahaan berhasil diperbarui.');
    }
}
