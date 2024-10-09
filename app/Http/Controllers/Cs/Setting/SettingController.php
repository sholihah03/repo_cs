<?php

namespace App\Http\Controllers\Cs\Setting;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    // public function index()
    // {
    //     // Ambil data karyawan yang sedang login
    //     $cs = Auth::guard('cs')->user();

    //     // Cek apakah karyawan memiliki jabatan CS (id_jabatan = 4)
    //     if ($cs && $cs->jabatan_id == 4) {
    //         return view('cs.setting.settingProfile', compact('cs'));
    //     } else {
    //         return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    //     }
    // }

    public function index()
    {
        // Ambil data karyawan yang sedang login
        $cs = Auth::guard('cs')->user();

        return view('cs.setting.settingProfile', compact('cs'));
    }

    public function storeOrUpdateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        // $anggota = Auth::user();
        $cs = Auth::guard('cs')->user();
        $cs->username = $request->username;
        $cs->nama_lengkap = $request->nama_lengkap;
        $cs->email = $request->email;
        $cs->no_telepon = $request->no_telepon;
        $cs->save();

        return redirect()->back()->with('success', 'Profil berhasil diupdate.');
    }


    // public function storeOrUpdateProfile(Request $request, $id = null)
    // {
    //     $request->validate([
    //         'username' => 'required|string|max:255',
    //         'nama_lengkap' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'no_telepon' => 'required|string|max:20',
    //     ]);

    //     // Jika $id tidak ada, maka lakukan store (penyimpanan data baru)
    //     if ($id == null) {
    //         Karyawan::create([
    //             'username' => $request->username,
    //             'nama_lengkap' => $request->nama_lengkap,
    //             'email' => $request->email,
    //             'no_telepon' => $request->no_telepon,
    //             'jabatan_id' => 4, // Atur ID jabatan CS
    //         ]);

    //         return redirect()->back()->with('success', 'Profil berhasil disimpan.');
    //     }

    //     // Jika $id ada, lakukan update (pembaruan data)
    //     $cs = Karyawan::findOrFail($id);
    //     $cs->update([
    //         'username' => $request->username,
    //         'nama_lengkap' => $request->nama_lengkap,
    //         'email' => $request->email,
    //         'no_telepon' => $request->no_telepon,
    //     ]);

    //     return redirect()->back()->with('success', 'Profil berhasil diupdate.');
    // }

    // Update password
    public function updatePassword(Request $request)
    {
        $karyawan = Auth::guard('karyawan')->user();

        if ($karyawan && $karyawan->jabatan_id == 4) {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            // Cek apakah password lama cocok
            if (!Hash::check($request->current_password, $karyawan->password)) {
                return redirect()->back()->with('error', 'Password saat ini salah.');
            }

            // Update password baru
            $karyawan->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->back()->with('success', 'Password berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}
