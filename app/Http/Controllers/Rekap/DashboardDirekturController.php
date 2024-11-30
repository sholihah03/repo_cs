<?php

namespace App\Http\Controllers\Rekap;

use Carbon\Carbon;
use App\Models\Karyawan;
use App\Models\BagiHasil;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardDirekturController extends Controller
{
    public function index(Request $request)
    {
        $perusahaan = Perusahaan::find(1);

        // Menghitung jumlah karyawan berdasarkan jabatan_id
        $jumlahManager = Karyawan::where('jabatan_id', 2)->count(); // Manager (jabatan_id = 2)
        $jumlahKaryawan = Karyawan::where('jabatan_id', 3)->count(); // Karyawan (jabatan_id = 3)
        $jumlahCS = Karyawan::where('jabatan_id', 4)->count(); // Customer Service (jabatan_id = 4)
        $jumlahAdvertiser = Karyawan::where('jabatan_id', 5)->count(); // Advertiser (jabatan_id = 5)

        // Ambil tahun dari request atau gunakan tahun saat ini
        $tahun = $request->input('tahun', Carbon::now()->year);

        // Ambil data bagi hasil per bulan
        $dataBagiHasil = BagiHasil::selectRaw('MONTH(created_at) as bulan, SUM(bagi_hasil) as total_bagi_hasil')
            ->whereYear('created_at', $tahun)
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('bulan')
            ->get();

        // Nama bulan
        $namaBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Format data untuk grafik
        $chartData = [];
        foreach ($namaBulan as $index => $bulan) {
            $chartData[$bulan] = $dataBagiHasil->firstWhere('bulan', $index + 1)->total_bagi_hasil ?? 0;
        }

        // Ambil semua tahun yang tersedia dalam data
        $availableYears = BagiHasil::selectRaw('YEAR(created_at) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        if ($request->ajax()) {
            return response()->json([
                'chartData' => $chartData
            ]);
        }

        return view('rekap.dashboardDirektur', compact('perusahaan', 'chartData', 'availableYears', 'tahun', 'jumlahManager', 'jumlahKaryawan', 'jumlahCS', 'jumlahAdvertiser'));
    }

    public function getManagerData()
    {
        $manager = Karyawan::where('jabatan_id', 2)->get(); // Ambil data manager beserta jabatan

        return response()->json([
            'manager' => $manager->map(function($manager) {
                return [
                    'nama_lengkap' => $manager->nama_lengkap,
                    'username' => $manager->username,  // Pastikan relasi jabatan sudah ada
                    'email' => $manager->email,
                    'no_telepon' => $manager->no_telepon,
                    'profile_karyawan' => $manager->profile_karyawan,
                    'status' => $manager->status,
                    'mulai_bekerja' => $manager->mulai_bekerja,
                    'akhir_bekerja' => $manager->akhir_bekerja,
                ];
            })
        ]);
    }

    public function getKaryawanData()
    {
        $karyawan = Karyawan::where('jabatan_id', 3)->get(); // Ambil data karyawan beserta jabatan

        return response()->json([
            'karyawan' => $karyawan->map(function($karyawan) {
                return [
                    'nama_lengkap' => $karyawan->nama_lengkap,
                    'username' => $karyawan->username,  // Pastikan relasi jabatan sudah ada
                    'email' => $karyawan->email,
                    'no_telepon' => $karyawan->no_telepon,
                    'profile_karyawan' => $karyawan->profile_karyawan,
                    'status' => $karyawan->status,
                    'mulai_bekerja' => $karyawan->mulai_bekerja,
                    'akhir_bekerja' => $karyawan->akhir_bekerja,
                ];
            })
        ]);
    }

    public function getCsData()
    {
        $cs = Karyawan::where('jabatan_id', 4)->get(); // Ambil data cs beserta jabatan

        return response()->json([
            'cs' => $cs->map(function($cs) {
                return [
                    'nama_lengkap' => $cs->nama_lengkap,
                    'username' => $cs->username,  // Pastikan relasi jabatan sudah ada
                    'email' => $cs->email,
                    'no_telepon' => $cs->no_telepon,
                    'profile_karyawan' => $cs->profile_karyawan,
                    'status' => $cs->status,
                    'mulai_bekerja' => $cs->mulai_bekerja,
                    'akhir_bekerja' => $cs->akhir_bekerja,
                ];
            })
        ]);
    }

    public function getAdvertiserData()
    {
        $advertiser = Karyawan::where('jabatan_id', 5)->get(); // Ambil data cs beserta jabatan

        return response()->json([
            'advertiser' => $advertiser->map(function($advertiser) {
                return [
                    'nama_lengkap' => $advertiser->nama_lengkap,
                    'username' => $advertiser->username,  // Pastikan relasi jabatan sudah ada
                    'email' => $advertiser->email,
                    'no_telepon' => $advertiser->no_telepon,
                    'profile_karyawan' => $advertiser->profile_karyawan,
                    'status' => $advertiser->status,
                    'mulai_bekerja' => $advertiser->mulai_bekerja,
                    'akhir_bekerja' => $advertiser->akhir_bekerja,
                ];
            })
        ]);
    }


}
