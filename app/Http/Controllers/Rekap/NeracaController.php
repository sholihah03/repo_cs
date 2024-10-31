<?php

namespace App\Http\Controllers\Rekap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi; // Pastikan model ini diimpor

class NeracaController extends Controller
{
    public function index()
    {
        return view('rekap.neraca.transaksi');
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
