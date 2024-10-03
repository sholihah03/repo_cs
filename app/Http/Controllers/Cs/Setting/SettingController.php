<?php

namespace App\Http\Controllers\Cs\Setting;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    // Show the CS settings profile page
    public function index()
    {
        // Fetch the authenticated user with jabatan_id = 4 (CS)
        $csKaryawan = Karyawan::where('jabatan_id', 4)->where('id_karyawan', Auth::id())->first();

        if (!$csKaryawan) {
            return redirect()->back()->withErrors('You are not authorized to access this page.');
        }

        return view('cs.setting.settingProfile', compact('csKaryawan'));
    }

    // Update the profile data
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:15',
            'profile_karyawan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Image upload validation
        ]);

        $csKaryawan = Karyawan::where('jabatan_id', 4)->where('id_karyawan', Auth::id())->first();

        if (!$csKaryawan) {
            return redirect()->back()->withErrors('You are not authorized to update this profile.');
        }

        // Update profile data
        $csKaryawan->nama_lengkap = $request->nama_lengkap;
        $csKaryawan->username = $request->username;
        $csKaryawan->email = $request->email;
        $csKaryawan->no_telepon = $request->no_telepon;

        // Handle profile image upload
        if ($request->hasFile('profile_karyawan')) {
            $profileImage = $request->file('profile_karyawan')->store('profile_images', 'public');
            $csKaryawan->profile_karyawan = $profileImage;
        }

        $csKaryawan->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    // Update the password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $csKaryawan = Karyawan::where('jabatan_id', 4)->where('id_karyawan', Auth::id())->first();

        if (!$csKaryawan) {
            return redirect()->back()->withErrors('You are not authorized to update this password.');
        }

        // Verify current password
        if (!Hash::check($request->current_password, $csKaryawan->password)) {
            return redirect()->back()->withErrors('Current password is incorrect.');
        }

        // Update with new password
        $csKaryawan->password = Hash::make($request->new_password);
        $csKaryawan->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
