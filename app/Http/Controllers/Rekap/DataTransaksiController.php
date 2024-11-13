<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Transaksi;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DataTransaksi; // Pastikan model ini diimpor

class DataTransaksiController extends Controller
{

public function store(Request $request)
    {
        // Memeriksa apakah pengguna sudah login sebagai karyawan
        if (Auth::guard('manager')->check()) {
            // Mendapatkan data karyawan yang sedang login
            $karyawan = Auth::guard('manager')->user();
            $karyawan_id = $karyawan->id_karyawan;  // Mengambil ID karyawan

        } else {
            // Jika pengguna tidak login sebagai karyawan, arahkan ke halaman login dengan pesan error
            return redirect()->route('login')->with('error', 'Anda harus login sebagai karyawan.');
        }

        // Validasi input
        $request->validate([
            'nama_transaksi' => 'required|string',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
        ]);

        // Mencari ID transaksi berdasarkan nama_transaksi
        $transaksi = Transaksi::where('nama_transaksi', $request->nama_transaksi)->firstOrFail();

        // Menyimpan data ke tabel tb_datatransaksi
        DataTransaksi::create([
            'transaksi_id' => $transaksi->id_transaksi,
            'karyawan_id' => $karyawan_id,  // Menggunakan ID karyawan yang sudah didapatkan
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('neraca.index')->with('success', 'Detail transaksi berhasil disimpan!');
    }

    public function getTransaksiPerBulan()
    {
        $perusahaan = Perusahaan::find(1);
        // Ambil data transaksi yang dikelompokkan per bulan
        $transaksiPerBulan = DataTransaksi::selectRaw('YEAR(tanggal) as year, MONTH(tanggal) as month, SUM(jumlah) as total')
            ->groupByRaw('YEAR(tanggal), MONTH(tanggal)')
            ->orderByRaw('YEAR(tanggal) DESC, MONTH(tanggal) DESC')
            ->get();

        // Kirim data ke view
        return view('rekap.neraca.grafik', compact('transaksiPerBulan', 'perusahaan'));
    }
}
