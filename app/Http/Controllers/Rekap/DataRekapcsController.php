<?php

namespace App\Http\Controllers\Rekap;

use App\Models\RekapCs;
use App\Models\Karyawan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataRekapcsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $karyawanCS = Karyawan::whereHas('jabatan', function($query) {
            $query->where('jabatan_id', 4);
        })
        ->when($search, function ($query, $search) {
            $query->where('nama_lengkap', 'like', '%' . $search . '%');
        })
        ->get();
        $perusahaan = Perusahaan::find(1);
        return view('rekap.datarekap.datarekapcs', compact('perusahaan', 'karyawanCS'));
    }
    public function searchKaryawan(Request $request)
    {
        $karyawanId = $request->query('search');
    
        // Cari data karyawan berdasarkan ID
        $karyawan = Karyawan::find($karyawanId);
    
        if ($karyawan) {
            // Retrieve the RekapCs data associated with this karyawan
            $rekapCs = RekapCs::where('karyawan_id', $karyawan->id_karyawan)->first();
    
            // Check if rekapCs exists and return the data
            return response()->json([
                'closing' => $rekapCs ? $rekapCs->total_closing : 0,
                'lead' => $rekapCs ? $rekapCs->total_lead : 0,
                'profile_karyawan' => $karyawan->profile_karyawan,
                'nama_lengkap' => $karyawan->nama_lengkap
            ]);
        } else {
            return response()->json([
                'closing' => 0,
                'lead' => 0,
                'profile_karyawan' => '',
                'nama_lengkap' => ''
            ]);
        }
    }
    

}
