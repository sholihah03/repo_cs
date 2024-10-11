<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekapPerusahaanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_direktur' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:tb_perusahaan',
            'password' => 'required|string|min:8',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload logo jika ada
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Simpan ke database
        Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_direktur' => $request->nama_direktur,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'logo' => $logoPath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function showProfile()
    {
        // Fetch the data from tb_perusahaan
        $perusahaan = Perusahaan::find(1); // Adjust this to fetch the correct company or use dynamic ID logic

        // Pass the data to the view
        return view('profile', compact('perusahaan'));
    }
}
