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
    $accountType = $request->input('account_type');
    $credentials = $request->only('email', 'password');

    // Cek apakah email terdaftar
    $user = \App\Models\Karyawan::where('email', $credentials['email'])->first();
    if (!$user) {
        return back()->withErrors(['message' => 'Email belum terdaftar.']);
    }

    // Cek jabatan dan otentikasi
    switch ($accountType) {
        case 'direktur':
            if ($user->jabatan_id !== 1) { // Misalnya 1 adalah ID untuk direktur
                return back()->withErrors(['message' => 'Akun ini bukan untuk Direktur.']);
            }
            break;

        case 'manager':
            if ($user->jabatan_id !== 2) { // Misalnya 2 adalah ID untuk manajer
                return back()->withErrors(['message' => 'Akun ini bukan untuk Manajer.']);
            }
            break;

        case 'karyawan':
            if ($user->jabatan_id !== 3) { // Misalnya 3 adalah ID untuk karyawan
                return back()->withErrors(['message' => 'Akun ini bukan untuk Karyawan.']);
            }
            break;

        case 'cs':
            if ($user->jabatan_id !== 4) { // Misalnya 4 adalah ID untuk CS
                return back()->withErrors(['message' => 'Akun ini bukan untuk Customer Service.']);
            }
            break;

        case 'advertiser':
            if ($user->jabatan_id !== 5) { // Misalnya 5 adalah ID untuk advertiser
                return back()->withErrors(['message' => 'Akun ini bukan untuk Advertiser.']);
            }
            break;

        default:
            return back()->withErrors(['message' => 'Tipe akun tidak dikenali!']);
    }

    // Jika verifikasi jabatan berhasil, coba login
    if (Auth::guard($accountType)->attempt($credentials)) {
        // Redirect ke dashboard sesuai dengan tipe akun
        switch ($accountType) {
            case 'direktur':
                return redirect()->route('dashboardRekap'); // Ubah sesuai dengan rute dashboard direktur
            case 'manager':
                return redirect()->route('dashboardRekap'); // Ubah sesuai dengan rute dashboard manajer
            case 'karyawan':
                return redirect()->route('dashboardRekap'); // Ubah sesuai dengan rute dashboard karyawan
            case 'cs':
                return redirect()->route('dashboardcs'); // Ubah sesuai dengan rute dashboard CS
            case 'advertiser':
                return redirect()->route('dashboardRekap'); // Ubah sesuai dengan rute dashboard advertiser
            default:
                return redirect()->route('home'); // Redirect default jika tipe akun tidak dikenali
        }
    }

    // Jika login gagal (password salah)
    return back()->withErrors(['message' => 'Password salah. Silakan coba lagi.']);
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
