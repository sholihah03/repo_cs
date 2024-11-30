<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Perusahaan;
use App\Models\HistoryAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil semua jabatan
        $jabatan = Jabatan::all();
        $perusahaan = Perusahaan::find(1);
        $historyakun = HistoryAkun::all();

        // Mengambil karyawan berdasarkan jabatan_id dari request
        if ($request->jabatan_id) {
            $karyawan = Karyawan::where('jabatan_id', $request->jabatan_id)->get();
        } else {
            $karyawan = Karyawan::all();
        }

        if ($request->ajax()) {
            return response()->json($karyawan);
        }

        return view('rekap.pegawai.informasipegawai', compact('karyawan', 'jabatan', 'historyakun', 'perusahaan'));
    }


    public function destroy($id)
{
    // Mengambil data karyawan yang akan dihapus
    $karyawan = Karyawan::find($id);

    if (!$karyawan) {
        return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
    }

    // Memindahkan data karyawan ke tb_historyakun
    DB::table('tb_historyakun')->insert([
        'jabatan_id' => $karyawan->jabatan_id,
        'nama_lengkap' => $karyawan->nama_lengkap,
        'username' => $karyawan->username,
        'email' => $karyawan->email,
        'no_telepon' => $karyawan->no_telepon,
        'profile_karyawan' => $karyawan->profile_karyawan,
        'status' => $karyawan->status,
        'mulai_bekerja' => $karyawan->mulai_bekerja,
        'akhir_bekerja' => $karyawan->_bekerja,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Menghapus data karyawan dari tb_karyawan
    $karyawan->delete();

    return redirect()->route('informasi.index')->with('success', 'Data karyawan berhasil dipindahkan ke history.');
}

}
