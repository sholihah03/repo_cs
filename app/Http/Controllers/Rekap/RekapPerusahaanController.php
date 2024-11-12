<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\AlamatPerusahaan;
use App\Models\KontakPerusahaan;
use App\Http\Controllers\Controller;

class RekapPerusahaanController extends Controller
{
    public function index()
    {
        // Ambil data perusahaan, kontak, dan alamat
        $perusahaan = Perusahaan::find(1);
        $kontakPerusahaan = KontakPerusahaan::where('perusahaan_id', 1)->first();
        $alamatPerusahaan = AlamatPerusahaan::where('perusahaan_id', 1)->first();

        // Kirim data ke view
        return view('rekap.perusahaan.settings', compact('perusahaan', 'kontakPerusahaan', 'alamatPerusahaan'));
    }

    public function indexEdit()
    {
        // Ambil data perusahaan, kontak, dan alamat
        $perusahaan = Perusahaan::find(1);
        // $perusahaan = Perusahaan::where('id_perusahaan', 1)->first();

        // Kirim data ke view
        return view('rekap.perusahaan.editperusahaan', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_direktur' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cek apakah data perusahaan dengan ID tersebut ada
        $perusahaan = Perusahaan::find($request->id_perusahaan);

        if (!$perusahaan) {
            return redirect()->back()->withErrors('Perusahaan tidak ditemukan.');
        }

        // Upload logo jika ada
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Update data perusahaan
        $perusahaan->update([
            'nama_perusahaan' => $validated['nama_perusahaan'],
            'nama_direktur' => $validated['nama_direktur'],
            'username' => $validated['username'],
            'password' => $request->password ? bcrypt($validated['password']) : $perusahaan->password, // Jika password diisi, maka update
            'logo' => $logoPath ? $logoPath : $perusahaan->logo, // Update logo jika ada upload baru, jika tidak, gunakan logo lama
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('rekapPerusahaan')->with('success', 'Data perusahaan berhasil disimpan.');
    }

}
