<?php

namespace App\Http\Controllers\Cs\Setting;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingProfileController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::find(1);
        $cs = Auth::guard('cs')->user(); // Mengambil data pengguna yang sedang login
        return view('cs.setting.settingProfile', compact('cs', 'perusahaan'));
    }

    // Update profile photo
    public function updateProfilePhoto(Request $request)
    {
        $cs = Auth::guard('cs')->user();

        // Validate the uploaded file
        $request->validate([
            'profile_karyawan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Delete old photo if exists
        if ($cs->profile_karyawan && Storage::exists('profile_karyawan/' . $cs->profile_karyawan)) {
            Storage::delete('profile_karyawan/' . $cs->profile_karyawan);
        }

        // Store new profile photo
        $fileName = time() . '.' . $request->file('profile_karyawan')->extension();
        $request->file('profile_karyawan')->storeAs('profile_karyawan', $fileName);

        // Update profile photo in the database
        $cs->profile_karyawan = $fileName;
        $cs->save();

        return redirect()->back()->with('success', 'Profile photo berhasil diupdate');
    }

    // Delete profile photo
    public function deleteProfilePhoto()
    {
        $cs = Auth::guard('cs')->user();

        // Check if a profile photo exists
        if ($cs->profile_karyawan && Storage::exists('profile_karyawan/' . $cs->profile_karyawan)) {
            // Delete the profile photo
            Storage::delete('profile_karyawan/' . $cs->profile_karyawan);

            // Set profile photo to null in the database
            $cs->profile_karyawan = null;
            $cs->save();
        }

        return redirect()->back()->with('success', 'Profile photo berhasil dihapus');
    }
}
