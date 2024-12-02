<?php
namespace App\Http\Controllers\Rekap;

use Carbon\Carbon;
use App\Models\HasilCs;
use App\Models\Karyawan;
use App\Models\BagiHasil;
use App\Models\Perusahaan;
use App\Models\PersenTarget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardRekapController extends Controller
{
    public function index(Request $request)
    {
        $perusahaan = Perusahaan::first();

        $persenTarget = round(PersenTarget::where('perusahaan_id', $perusahaan->id_perusahaan)->value('persen_target') ?? 0);

        // Filter karyawan CS
        $karyawanQuery = Karyawan::where('jabatan_id', 4);
        $karyawan = $karyawanQuery->get();

        // Menghitung data bagi hasil
        $karyawanWithBagiHasil = $karyawan->map(function ($cs) use ($request) {
            $bagiHasilQuery = BagiHasil::whereHas('hasilCs.rekapCs', function ($query) use ($cs) {
                $query->where('karyawan_id', $cs->id_karyawan);
            });

            if ($request->bulan) {
                $bagiHasilQuery->whereMonth('created_at', $request->bulan)
                                ->whereYear('created_at', $request->tahun);
            }

            // Group by bulan dan hitung total
            $bagiHasilGrouped = $bagiHasilQuery->get()
                ->groupBy(function ($item) {
                    return Carbon::parse($item->created_at)->format('Y-m');
                })
                ->map(function ($group) {
                    return $group->sum('bagi_hasil');
                })
                ->sortKeys();

            // Menyusun data untuk ditampilkan
            $cs->bagi_hasil_per_bulan = $bagiHasilGrouped->mapWithKeys(function ($total, $month) {
                $formattedMonth = Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y');
                return [$formattedMonth => $total];
            });

            return $cs->bagi_hasil_per_bulan->isNotEmpty() ? $cs : null;
        });

        // Hapus nilai null (karyawan tanpa data bagi hasil) dari array
        $karyawanWithBagiHasil = $karyawanWithBagiHasil->filter();

        // Ambil tahun unik dari tabel bagi hasil
        $tahunList = BagiHasil::selectRaw('YEAR(created_at) as year')
                    ->distinct()
                    ->orderBy('year', 'desc')
                    ->pluck('year');


        // Menghitung data cr
        $karyawanWithTargetCr = $karyawan->map(function ($cr) use ($request, $persenTarget) {
            $crQuery = HasilCs::whereHas('rekapCs', function ($query) use ($cr) {
                $query->where('karyawan_id', $cr->id_karyawan);
            });

            if ($request->bulan) {
                $crQuery->whereMonth('created_at', $request->bulan)
                                ->whereYear('created_at', $request->tahun);
            }

            // Group by bulan dan hitung total
            $crGrouped = $crQuery->get()
                ->groupBy(function ($itemCr) {
                    return Carbon::parse($itemCr->created_at)->format('Y-m');
                })
                ->map(function ($groupCr) {
                    return $groupCr->sum('cr_new');
                })
                ->sortKeys();

            // Menyusun data untuk ditampilkan
            $cr->cr_per_bulan = $crGrouped->mapWithKeys(function ($totalCr, $monthCr) use ($persenTarget) {
                $formattedMonthCr = Carbon::createFromFormat('Y-m', $monthCr)->translatedFormat('F Y');

                // Bandingkan total CR dengan persen target
                $status = $totalCr >= $persenTarget ? 'Memenuhi' : 'Warning';
                $statusColor = $totalCr >= $persenTarget ? 'green' : 'red';

                return [$formattedMonthCr => [
                'total' => $totalCr,
                'status' => $status,
                'color' => $statusColor,
            ]];
            });

            return $cr->cr_per_bulan->isNotEmpty() ? $cr : null;
        });

        // Hapus nilai null (karyawan tanpa data cr) dari array
        $karyawanWithTargetCr = $karyawanWithTargetCr->filter();

        // Ambil tahun unik dari tabel cr
        $tahunListCr = HasilCs::selectRaw('YEAR(created_at) as year')
                    ->distinct()
                    ->orderBy('year', 'desc')
                    ->pluck('year');

        return view('rekap.dashboardRekap', compact('perusahaan', 'karyawanWithBagiHasil', 'request', 'tahunList', 'karyawanWithTargetCr', 'tahunListCr', 'persenTarget'));
    }
}
