<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.loginrekap');
    }
    public function login(Request $request)
    {
        $accountType = $request->input('account_type'); // Mendapatkan tipe akun dari dropdown
        $credentials = $request->only('email', 'password');

        // Cek apakah email terdaftar
        $user = null;
        switch ($accountType) {
            case 'direktur-login':
                $user = \App\Models\Karyawan::where('email', $credentials['email'])->first();
                if ($user && Auth::guard('direktur')->attempt($credentials)) {
                    return redirect()->route('informasi');
                }
                break;

            case 'manager-login':
                $user = \App\Models\Karyawan::where('email', $credentials['email'])->first();
                if ($user && Auth::guard('manager')->attempt($credentials)) {
                    return redirect()->route('informasi');
                }
                break;

            case 'karyawan-login':
                $user = \App\Models\Karyawan::where('email', $credentials['email'])->first();
                if ($user && Auth::guard('karyawan')->attempt($credentials)) {
                    return redirect()->route('dashboard-karyawan');
                }
                break;

            case 'cs-login':
                $user = \App\Models\Karyawan::where('email', $credentials['email'])->first();
                if ($user && Auth::guard('cs')->attempt($credentials)) {
                    return redirect()->route('dashboardcs');
                }
                break;

            case 'advertiser-login':
                $user = \App\Models\Karyawan::where('email', $credentials['email'])->first();
                if ($user && Auth::guard('advertiser')->attempt($credentials)) {
                    return redirect()->route('dashboard-advertiser');
                }
                break;

            default:
                return back()->withErrors([
                    'message' => 'Account type not recognized!',
                ]);
        }

        // Jika email tidak terdaftar
        if (!$user) {
            return back()->withErrors([
                'message' => 'Email belum terdaftar.',
            ]);
        }

        // Jika login gagal (password salah)
        return back()->withErrors([
            'message' => 'Password salah. Silakan coba lagi.',
        ]);
    }

    public function logout(Request $request)
    {
        // Mengeluarkan pengguna dari semua guard yang digunakan
        Auth::logout();

        // Jika menggunakan session, bisa juga menambahkan ini
        $request->session()->invalidate();

        // Regenerasi session untuk keamanan
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lain setelah logout
        return redirect()->route('loginrekap')->with('message', 'You have been logged out successfully.');
    }
}
