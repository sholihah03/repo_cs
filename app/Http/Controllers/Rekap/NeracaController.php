<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi; // Pastikan model ini diimpor

class NeracaController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::find(1);
        return view('rekap.neraca.transaksi', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        // Validasi input formulir
        $request->validate([
            'nama_transaksi' => 'required|string|max:255',
            'type' => 'required|string',
        ]);
    
        // Simpan data transaksi ke tabel 'tb_transaksi'
        $transaksi = Transaksi::create([
            'nama_transaksi' => $request->nama_transaksi,
            'type' => $request->type,
        ]);

        // Simpan nama transaksi ke session
        session(['nama_transaksi' => $request->nama_transaksi]);
    
        // Redirect ke halaman input detail transaksi dengan membawa ID transaksi
        return redirect()->route('neraca.index', ['transaksi_id' => $transaksi->id])->with('success', 'Transaksi berhasil disimpan!');
    }
    
}
