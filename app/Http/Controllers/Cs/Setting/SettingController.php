<?php

namespace App\Http\Controllers\Cs\Setting;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $cs = Auth::guard('cs')->user(); // Mengambil data pengguna yang sedang login
        return view('cs.setting.settingProfile', compact('cs'));
    }

    // Proses update data profil pengguna yang sedang login
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_telepon' => 'required|string|max:15',
        ]);

        $cs = Auth::guard('cs')->user(); // Mendapatkan data pengguna yang sedang login

        $cs->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return back()->with('success', 'Profile berhasil diupdate!');
    }

    // Update password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|confirmed',
        ]);

        $cs = Auth::guard('cs')->user();

        if (!Hash::check($request->password_lama, $cs->password)) {
            return back()->withErrors(['password_lama' => 'Password lama tidak cocok.']);
        }

        $cs->password = Hash::make($request->password_baru);
        $cs->save();

        return back()->with('success', 'Password berhasil diubah.');
    }

}
