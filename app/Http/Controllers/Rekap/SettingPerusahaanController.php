<?php

namespace App\Http\Controllers\Rekap;

use Illuminate\Http\Request;
use App\Models\AlamatPerusahaan;
use App\Models\KontakPerusahaan;
use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Hash; // Tambahkan Hash

class SettingPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::first();
        $kontakPerusahaan = KontakPerusahaan::first();
        $alamatPerusahaan = AlamatPerusahaan::first();
        // dd('masuk');

        return view('rekap.perusahaan.rekapPerusahaan', compact('perusahaan', 'kontakPerusahaan', 'alamatPerusahaan'));
    }

    //perusahaan
    public function indexEditPerusahaan()
    {
        $perusahaan = Perusahaan::first();

        return view('rekap.perusahaan.editperusahaan', compact('perusahaan'));
    }

    //perusahaan
    public function storePerusahaan(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_direktur' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:tb_perusahaan,username,' . ($request->id_perusahaan ?? 'NULL') . ',id_perusahaan',
            'password' => 'nullable|string|min:6',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Periksa apakah perusahaan ada berdasarkan ID
        $perusahaan = Perusahaan::find($request->id_perusahaan);
    
        // Jika perusahaan ditemukan, ambil data password lama
        $password = $request->password 
            ? bcrypt($validated['password']) 
            : ($perusahaan->password ?? null);
    
        // Proses simpan atau update
        $perusahaan = Perusahaan::updateOrCreate(
            ['id_perusahaan' => $request->id_perusahaan], // Cari berdasarkan ID
            [
                'nama_perusahaan' => $validated['nama_perusahaan'],
                'nama_direktur' => $validated['nama_direktur'],
                'username' => $validated['username'],
                'password' => $password,
                'logo' => $request->hasFile('logo') 
                    ? $request->file('logo')->store('logos', 'public') 
                    : ($perusahaan->logo ?? null), // Gunakan logo lama jika tidak diupload
            ]
        );
    
        // Redirect ke halaman setting perusahaan dengan pesan sukses
        return redirect()->route('settingperusahaan.index')->with('success', 'Data perusahaan berhasil diperbarui.');
    }
     
    //kontak perusahaan
    public function indexEditKontakPerusahaan()
    {
        $perusahaan = Perusahaan::first();
        $kontakPerusahaan = KontakPerusahaan::first();

        return view('rekap.perusahaan.kontakperusahaan', compact('perusahaan','kontakPerusahaan'));
    }

    public function storeKontakPerusahaan(Request $request)
    {
        $validated = $request->validate([
            'no_telepon' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'wa' => 'nullable|string|max:255',
        ]);

        // Periksa apakah perusahaan ada berdasarkan ID
        $perusahaan = Perusahaan::find($request->perusahaan_id);

        if (!$perusahaan) {
            return redirect()->back()->with('error', 'Perusahaan tidak ditemukan.');
        }

        // Update atau buat kontak perusahaan
        $kontakPerusahaan = KontakPerusahaan::updateOrCreate(
            ['perusahaan_id' => $request->perusahaan_id], // Menggunakan perusahaan_id
            [
                'no_telepon' => $validated['no_telepon'],
                'email' => $validated['email'],
                'instagram' => $validated['instagram'],
                'wa' => $validated['wa'],
            ]
        );

        // Redirect ke halaman setting perusahaan dengan pesan sukses
        return redirect()->route('settingperusahaan.index')->with('success', 'Data kontak perusahaan berhasil diperbarui.');
    }

    public function indexEditAlamatPerusahaan()
    {
        $perusahaan = Perusahaan::first();
        $alamatPerusahaan = AlamatPerusahaan::first();

        return view('rekap.perusahaan.alamatperusahaan', compact('perusahaan','alamatPerusahaan'));
    }

    public function storeAlamatPerusahaan(Request $request)
    {
        $validated = $request->validate([
            'provinsi' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'detail_lainnya' => 'nullable|string|max:255',
        ]);

        // Periksa apakah perusahaan ada berdasarkan ID
        $perusahaan = Perusahaan::find($request->perusahaan_id);

        if (!$perusahaan) {
            return redirect()->back()->with('error', 'Perusahaan tidak ditemukan.');
        }

        // Update atau buat kontak perusahaan
            $alamatPerusahaan = AlamatPerusahaan::updateOrCreate(
                ['perusahaan_id' => $request->perusahaan_id], // Menggunakan perusahaan_id
                [
                    'provinsi' => $validated['provinsi'],
                    'kabupaten' => $validated['kabupaten'],
                    'kecamatan' => $validated['kecamatan'],
                    'kelurahan' => $validated['kelurahan'],
                    'kode_pos' => $validated['kode_pos'],
                    'rt' => $validated['rt'],
                    'rw' => $validated['rw'],
                    'detail_lainnya' => $validated['detail_lainnya'],
                ]
        );

        // Redirect ke halaman setting perusahaan dengan pesan sukses
        return redirect()->route('settingperusahaan.index')->with('success', 'Data kontak perusahaan berhasil diperbarui.');
    }

    
}
