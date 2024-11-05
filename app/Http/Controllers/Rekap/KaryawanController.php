<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with('jabatan')->get();
        $jabatan = Jabatan::all();
        return view('rekap.pegawai.tambahpegawai', compact('karyawan', 'jabatan'));
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id); // Find Karyawan by ID
        $jabatan = Jabatan::all(); // Fetch all Jabatan data
        return view('rekap.pegawai.editpegawai', compact('karyawan', 'jabatan')); // Return the edit view
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'jabatan_id' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:tb_karyawan',
            'email' => 'required|string|email|max:255|unique:tb_karyawan',
            'password' => 'required|string|min:8',
            'no_telepon' => 'nullable|string|max:15',
            'profile_karyawan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:proses,aktif,tidak aktif',
            'mulai_bekerja' => 'nullable|date',
        ]);

        // Handle file upload if there's a file
        $profilePath = null;
        if ($request->hasFile('profile_karyawan')) {
            $file = $request->file('profile_karyawan');
            $profilePath = $file->store('profiles', 'public');
        }

        // Create a new Karyawan instance
        Karyawan::create([
            'jabatan_id' => $request->jabatan_id,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'profile_karyawan' => $profilePath,
            'password' => Hash::make($request->password),
            'status' => $request->status ?? 'proses',
            'mulai_bekerja' => $request->mulai_bekerja,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('informasipegawai')->with('success', 'Data karyawan berhasil disimpan.');
    }

    public function update(Request $request, $id_karyawan)
    {
        // Validasi input data
        $request->validate([
            'jabatan_id' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:tb_karyawan,username,' . $id_karyawan . ',id_karyawan',
            'email' => 'required|string|email|max:255|unique:tb_karyawan,email,' . $id_karyawan . ',id_karyawan',
            'password' => 'nullable|string|min:8',
            'no_telepon' => 'nullable|string|max:15',
            'profile_karyawan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:proses,aktif,tidak aktif',
            'mulai_bekerja' => 'nullable|date',
        ]);


        // Find the Karyawan by ID
        $karyawan = Karyawan::findOrFail($id_karyawan);

        // Handle file upload if there's a file
        $profilePath = $karyawan->profile_karyawan; // Keep the existing file
        if ($request->hasFile('profile_karyawan')) {
            $file = $request->file('profile_karyawan');
            $profilePath = $file->store('profiles', 'public');
        }

        // Update the Karyawan instance
        $karyawan->update([
            'jabatan_id' => $request->jabatan_id,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'profile_karyawan' => $profilePath,
            'status' => $request->status ?? 'proses',
            'mulai_bekerja' => $request->mulai_bekerja,
            'updated_at' => now(),
        ]);

        // Update password only if provided
        if ($request->filled('password')) {
            $karyawan->password = Hash::make($request->password);
            $karyawan->save();
        }

        return redirect()->route('informasipegawai')->with('success', 'Data karyawan berhasil diperbarui.');
    }
}
