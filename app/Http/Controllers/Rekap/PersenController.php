<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use App\Models\PersenTarget;
use Illuminate\Http\Request;
use App\Models\PersenBagiHasil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PersenController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::find(1);
        $perusahaan = Perusahaan::with(['persenBagiHasil', 'persenTarget'])->first();
        $persen = PersenBagiHasil::all();
        $persenTarget = PersenTarget::all();
        $daftarPerusahaan = Perusahaan::all();
        return view('rekap.perusahaan.persen', compact('perusahaan', 'daftarPerusahaan', 'persen', 'persenTarget'));
    }

    public function indexEdit()
    {
        // Ambil perusahaan pertama (sesuai kebutuhan bisnis Anda)
        $perusahaan = Perusahaan::first(); // Ambil data perusahaan pertama

        if (!$perusahaan) {
            return redirect()->back()->withErrors('Tidak ada data perusahaan yang ditemukan.');
        }

        // Gunakan perusahaan_id yang ada
        $persen = PersenBagiHasil::where('perusahaan_id', $perusahaan->id_perusahaan)->first();

        $daftarPerusahaan = Perusahaan::all();

        return view('rekap.perusahaan.editPersen', compact('persen', 'daftarPerusahaan', 'perusahaan'));
    }

    public function indexEditTarget()
    {
        // Ambil perusahaan pertama (sesuai kebutuhan bisnis Anda)
        $perusahaan = Perusahaan::first(); // Ambil data perusahaan pertama

        if (!$perusahaan) {
            return redirect()->back()->withErrors('Tidak ada data perusahaan yang ditemukan.');
        }

        // Gunakan perusahaan_id yang ada
        $persenTarget = PersenTarget::where('perusahaan_id', $perusahaan->id_perusahaan)->first();

        $daftarPerusahaan = Perusahaan::all();

        return view('rekap.perusahaan.editPersenTarget', compact('persenTarget', 'daftarPerusahaan', 'perusahaan'));
    }


    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'perusahaan_id' => 'required|exists:tb_perusahaan,id_perusahaan', // Pastikan perusahaan_id valid
            'persen' => 'nullable|numeric|min:0|max:100', // Validasi angka persen
        ]);

        // Simpan atau perbarui data ke tabel PersenBagiHasil
        PersenBagiHasil::updateOrCreate(
            ['perusahaan_id' => $validated['perusahaan_id']], // Gunakan perusahaan_id dari dropdown
            ['persen' => $validated['persen']]
        );

        return redirect()->route('persen.index')->with('success', 'Persen perusahaan berhasil diperbarui.');
    }

    public function storeTarget(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'perusahaan_id' => 'required|exists:tb_perusahaan,id_perusahaan', // Pastikan perusahaan_id valid
            'persen_target' => 'nullable|numeric|min:0|max:100', // Validasi angka persen
        ]);

        // Simpan atau perbarui data ke tabel PersenBagiHasil
        PersenTarget::updateOrCreate(
            ['perusahaan_id' => $validated['perusahaan_id']], // Gunakan perusahaan_id dari dropdown
            ['persen_target' => $validated['persen_target']]
        );

        return redirect()->route('persen.index')->with('success', 'Persen perusahaan berhasil diperbarui.');
    }


}
