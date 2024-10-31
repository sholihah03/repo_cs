<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\PersenBagiHasil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PersenController extends Controller
{
    public function index()
    {
        $persen = PersenBagiHasil::all();
        // $perusahaan = Perusahaan::all();
        $perusahaan = Perusahaan::with('persenBagiHasil')->get();
        $daftarPerusahaan = Perusahaan::all();
        return view('rekap.perusahaan.settings', compact('perusahaan', 'daftarPerusahaan', 'persen'));
    }

    public function indexEdit()
    {
        $persen = PersenBagiHasil::where('perusahaan_id', 1)->first();
        $daftarPerusahaan = Perusahaan::all();

        return view('rekap.perusahaan.editPersen', compact('persen', 'daftarPerusahaan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'persen' => 'nullable|string|max:255',
        ]);

        PersenBagiHasil::updateOrCreate(
            ['perusahaan_id' => 1],
            [
                'persen' => $validated['persen'],
            ]
        );

        return redirect()->route('rekapPerusahaan')->with('success', 'Persen perusahaan berhasil diperbarui.');
    }

    


}
