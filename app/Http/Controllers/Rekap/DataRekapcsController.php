<?php

namespace App\Http\Controllers\Rekap;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\HasilCs;
use App\Models\RekapCs;
use App\Models\Karyawan;
use App\Models\BagiHasil;
use App\Models\Perusahaan;
use App\Models\RekapProduk;
use App\Models\NotifikasiCs;
use App\Models\PersenTarget;
use App\Models\RekapCsTotal;
use Illuminate\Http\Request;
use App\Models\PersenBagiHasil;
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

        $karyawanTarget = Karyawan::whereHas('jabatan', function($query) {
            $query->where('jabatan_id', 4);
        })
        ->when($search, function ($query, $search) {
            $query->where('nama_lengkap', 'like', '%' . $search . '%');
        })
        ->get();
        $perusahaan = Perusahaan::first();
        return view('rekap.datarekap.datarekapcs', compact('perusahaan', 'karyawanCS', 'karyawanTarget'));
    }
    public function searchKaryawan(Request $request)
    {
        $karyawanId = $request->query('search');

        // Cari data karyawan berdasarkan ID
        $karyawan = Karyawan::find($karyawanId);

        if ($karyawan) {
            // Cari data RekapCs yang terkait dengan karyawan ini dan tidak memiliki HasilCs
            $rekapCs = RekapCs::where('karyawan_id', $karyawan->id_karyawan)
                ->doesntHave('hasilCs') // RekapCs tanpa HasilCs
                ->first();

            if ($rekapCs) {
                // Ambil data produk terkait
                $rekapProduk = RekapProduk::where('rekap_cs_id', $rekapCs->id_rekap_cs)->first();
                $rekapProdukId = $rekapProduk ? $rekapProduk->id_rekap_produk : null;

                // Ambil data RekapCsTotal
                $rekapCsTotal = RekapCsTotal::where('rekap_cs_id', $rekapCs->id_rekap_cs)->first();
                $totalBotol = $rekapCsTotal ? $rekapCsTotal->total_botol : 0;

                // Ambil data harga botol dari Produk
                $produk = Produk::where('karyawan_id', $karyawan->id_karyawan)->first();
                $hargaBotol = $produk ? $produk->harga_botol : 0;

                // Ambil persen bagi hasil
                $persenBagiHasil = PersenBagiHasil::first();

                return response()->json([
                    'rekapcs_id' => $rekapCs->id_rekap_cs,
                    'rekap_produk_id' => $rekapProdukId,
                    'closing' => $rekapCs->total_closing,
                    'lead' => $rekapCs->total_lead,
                    'totalBotol' => $totalBotol,
                    'hargaBotol' => $hargaBotol,
                    'profile_karyawan' => $karyawan->profile_karyawan,
                    'nama_lengkap' => $karyawan->nama_lengkap,
                    'persen_bagi' => $persenBagiHasil->persen
                ]);
            }
        }

        // Jika data tidak ditemukan
        return response()->json([
            'rekapcs_id' => null,
            'rekap_produk_id' => null,
            'closing' => 0,
            'lead' => 0,
            'totalBotol' => 0,
            'hargaBotol' => 0,
            'profile_karyawan' => '',
            'nama_lengkap' => ''
        ]);
    }
    public function searchKaryawanTarget(Request $request)
    {
        $karyawanId = $request->query('search'); // Ambil karyawan_id dari query

        // Cari data karyawan berdasarkan ID
        $karyawan = Karyawan::find($karyawanId);

        if ($karyawan) {
            // Cari data cr_new dari tb_hasilcs melalui relasi dengan rekap_cs
            $hasilCs = HasilCs::whereHas('rekapCs', function ($query) use ($karyawanId) {
                $query->where('karyawan_id', $karyawanId);
            })
            ->whereDoesntHave('notifikasics') // Menghindari data yang sudah ada di notifikasi_cs
            ->first();

            if ($hasilCs) {
                // Ambil nilai persen_target dari tabel persen_target
                // $persenTarget = PersenTarget::where('perusahaan_id', $karyawan->perusahaan_id)
                //     ->value('persen_target');
                $persenTarget = PersenTarget::first()->value('persen_target');

                // Ambil nilai cr_new
                $crNew = $hasilCs->cr_new;

                // Bandingkan cr_new dengan persen_target
                $isTargetMet = $crNew >= $persenTarget; // Benar jika cr_new >= persen_target

                // Format nilai untuk ditampilkan ke UI (hilangkan angka desimal)
                $crNewFormatted = number_format($crNew, 0); // Contoh: 70
                $persenTargetFormatted = number_format($persenTarget, 0); // Contoh: 70


                return response()->json([
                    'crNew' => $crNewFormatted, // Nilai yang ditampilkan tanpa simbol "%"
                    'id_hasilcs' => $hasilCs->id_hasilcs,
                    'persenTarget' => $persenTargetFormatted,
                    'isTargetMet' => $isTargetMet, // Status (true untuk "Memenuhi", false untuk "Warning")
                    // 'coba' => $persenTarget, // Status (true untuk "Memenuhi", false untuk "Warning")
                ]);
            }
        }

        // Jika data tidak ditemukan
        return response()->json([
            'crNew' => '0', // Default nilai 0 tanpa simbol "%"
            'persenTarget' => '0',
            'isTargetMet' => false, // Default status adalah "Warning"
        ]);
    }


    public function searchKaryawanByNama(Request $request)
    {
        $search = $request->input('search');
        $searchTarget = $request->input('searchTarget');

        $karyawanCS = Karyawan::where('nama_lengkap', 'like', '%' . $search . '%')
            ->whereHas('jabatan', function ($query) {
                $query->where('jabatan_id', 4);
            })
            ->select('id_karyawan', 'nama_lengkap', 'profile_karyawan')
            ->get();

        $perusahaan = Perusahaan::first();

        $karyawanTarget = Karyawan::where('nama_lengkap', 'like', '%' . $searchTarget . '%')
            ->whereHas('jabatan', function ($query) {
                $query->where('jabatan_id', 4);
            })
            ->select('id_karyawan', 'nama_lengkap', 'profile_karyawan')
            ->get();

        $perusahaan = Perusahaan::first(); // Ini redundan

        return view('rekap.datarekap.datarekapcs', compact('karyawanCS', 'karyawanTarget', 'perusahaan'));
    }

    public function store(Request $request)
    {
        $idBaru = HasilCs::create([
            'rekapcs_id' => $request->input('rekapcs_id'),
            'rekap_produk_id' => $request->input('rekap_produk_id'),
            'cr_new' => (float) str_replace('%', '', $request->input('cr_new')),
            'ratio_botol' => $request->input('ratio_botol'),
            'omzet' => $request->input('omzet'),
        ]);

        $persenBagiHasil = PersenBagiHasil::first();

        BagiHasil::create([
            'hasilcs_id' => $idBaru->id_hasilcs, // Akses ID dari instance model
            'persen_id' => $persenBagiHasil->id_persen,
            'bagi_hasil' => $request->input('hasil'),
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
