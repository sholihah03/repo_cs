<?php

namespace App\Http\Controllers\Cs;

use App\Models\NotifikasiCs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotifikasiCsController extends Controller
{

    public function index(){
        $notifications = NotifikasiCs::where('created_at', '>=', now()->subDay())->latest()->take(5)->get();
        

        // Kirim notifikasi ke view 
        return view('cs.layouts.main', compact('notifications'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_karyawan' => 'required|exists:tb_karyawan,id_karyawan',
            'target' => 'required|string',
            'id_hasilcs' => 'required',
        ]);

        NotifikasiCs::create([
            'id_karyawan' => $validatedData['id_karyawan'],
            'id_hasilcs' => $validatedData['id_hasilcs'],
            'target' => $validatedData['target'],
            'is_read' => 0,
        ]);

        return redirect()->back()->with('success', 'Notifikasi berhasil disimpan.');
    }

    

}
