<?php

namespace App\Http\Controllers\Rekap;

use App\Models\Produk;
use App\Models\Karyawan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PembagianProdukController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::find(1);
        // Retrieve all CS employees with their related products
        $csList = Karyawan::with('produk')->whereHas('jabatan', function($query) {
            $query->where('nama_jabatan', 'cs');
        })->get();

        return view('rekap.cs.pembagianProduk', compact('csList', 'perusahaan'));
    }


    public function indexTambah()
    {
        $perusahaan = Perusahaan::find(1);
        // Mendapatkan karyawan CS yang belum memiliki pembagian produk
        $cs = Karyawan::whereHas('jabatan', function($query) {
            $query->where('nama_jabatan', 'cs');
        })->whereDoesntHave('produk')->get();
        dd($cs);
        $produk = Produk::whereDoesntHave('karyawan')->get();

        return view('rekap.cs.tambahPembagian', compact('cs', 'produk', 'perusahaan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'karyawan_id' => 'required|exists:tb_karyawan,id_karyawan',
            'produk_ids' => 'required|array|max:5',
            'produk_ids.*' => 'exists:tb_produk,id_produk',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update karyawan_id untuk setiap produk yang dipilih
        foreach ($request->produk_ids as $produkId) {
            $produk = Produk::find($produkId);
            $produk->karyawan_id = $request->karyawan_id;
            $produk->save();
        }

        return redirect()->route('pembagianProdukCS.index')->with('success', 'Pembagian produk berhasil disimpan.');
    }

    public function indexEdit($id)
    {
        $perusahaan = Perusahaan::find(1);
        // Retrieve the CS employee and their associated products
        $karyawan = Karyawan::with('produk')->findOrFail($id);

        // Retrieve all available products to allow for replacement
        $allProducts = Produk::whereDoesntHave('karyawan')->get();

        return view('rekap.cs.editPembagian', compact('karyawan', 'allProducts', 'perusahaan'));
    }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'produk_ids' => 'required|array|max:5',
    //         'produk_replacement.*' => 'nullable|exists:tb_produk,id_produk',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $karyawan = Karyawan::findOrFail($id);

    //     // Hapus produk yang ditandai dalam produk_delete
    //     if ($request->filled('produk_delete')) {
    //         foreach ($request->produk_delete as $deleteId) {
    //             $produk = Produk::find($deleteId);
    //             if ($produk) {
    //                 $produk->karyawan_id = null; // Hilangkan relasi dengan karyawan
    //                 $produk->save();
    //             }
    //         }
    //     }

    //     // Update atau ganti produk jika ada penggantian yang dipilih
    //     foreach ($request->produk_ids as $produkId) {
    //         $produk = Produk::find($produkId);
    //         if ($request->filled("produk_replacement.$produkId")) {
    //             $replacementId = $request->input("produk_replacement.$produkId");
    //             $replacementProduk = Produk::find($replacementId);
    //             $replacementProduk->karyawan_id = $karyawan->id_karyawan;
    //             $replacementProduk->save();

    //             $produk->karyawan_id = null;
    //             $produk->save();
    //         }
    //     }

    //     return redirect()->route('pembagianProdukCS.index')->with('success', 'Pembagian produk berhasil diperbarui.');
    // }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'produk_ids' => 'array|max:5',
            'produk_replacement.*' => 'nullable|exists:tb_produk,id_produk',
            'produk_tambah.*' => 'nullable|exists:tb_produk,id_produk',
            'produk_hapus.*' => 'nullable|exists:tb_produk,id_produk', // New validation rule for deleted products
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $karyawan = Karyawan::findOrFail($id);

        // Hapus produk yang ditandai untuk dihapus
        if ($request->filled('produk_hapus')) {
            foreach ($request->produk_hapus as $deleteId) {
                $produk = Produk::find($deleteId);
                if ($produk) {
                    $produk->karyawan_id = null; // Remove the relationship
                    $produk->save();
                }
            }
        }

        // Update or replace products
        if ($request->filled('produk_ids')) {
            foreach ($request->produk_ids as $produkId) {
                $produk = Produk::find($produkId);

                // Check for a replacement product
                if ($request->filled("produk_replacement.$produkId")) {
                    $replacementId = $request->input("produk_replacement.$produkId");
                    $replacementProduk = Produk::find($replacementId);
                    $replacementProduk->karyawan_id = $karyawan->id_karyawan; // Set new relationship
                    $replacementProduk->save();

                    $produk->karyawan_id = null; // Remove the old product's relationship
                    $produk->save();
                }
            }
        }

        // Add new products if provided
        if ($request->filled('produk_tambah')) {
            foreach ($request->produk_tambah as $tambahId) {
                $produk = Produk::find($tambahId);
                if ($produk) {
                    $produk->karyawan_id = $karyawan->id_karyawan; // Assign new relationship
                    $produk->save();
                }
            }
        }

        return redirect()->route('pembagianProdukCS.index')->with('success', 'Pembagian produk berhasil diperbarui.');
    }




}
