<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Display the product list
    public function index()
    {
        $produk = Produk::all();
        return view('rekap.produk', compact('produk'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $karyawans = Karyawan::all(); // Ganti dengan model yang sesuai jika menggunakan nama yang berbeda

        // Kembalikan view dengan data karyawan
        return view('rekap.create', compact('karyawans'));
    }

    // Store a new product
    public function store(Request $request)
    {
        $request->validate([
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_produk' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga_botol' => 'required|numeric|min:0',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar_produk')) {
            $imagePath = $request->file('gambar_produk')->store('product_images', 'public');
        }

        // Create product
        Produk::create([
            'karyawan_id' => auth()->id(), // Assuming the product is associated with the currently logged-in user
            'gambar_produk' => $imagePath,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga_botol' => $request->harga_botol,
        ]);

        return redirect()->route('rekap.produk')->with('success', 'Produk berhasil ditambahkan');
    }

    // Show the form to edit a product
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('rekap.editproduk', compact('produk'));
    }

    // Update the product
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_produk' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga_botol' => 'required|numeric|min:0',
        ]);

        // Handle file upload if present
        if ($request->hasFile('gambar_produk')) {
            // Delete old image
            if ($produk->gambar_produk && Storage::disk('public')->exists($produk->gambar_produk)) {
                Storage::disk('public')->delete($produk->gambar_produk);
            }
            $imagePath = $request->file('gambar_produk')->store('product_images', 'public');
        } else {
            $imagePath = $produk->gambar_produk; // Keep the old image if no new image uploaded
        }

        // Update product
        $produk->update([
            'gambar_produk' => $imagePath,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga_botol' => $request->harga_botol,
        ]);

        return redirect()->route('rekap.produk')->with('success', 'Produk berhasil diperbarui');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Produk::findOrFail($id);

        // Delete image if exists
        if ($product->gambar_produk && Storage::disk('public')->exists($product->gambar_produk)) {
            Storage::disk('public')->delete($product->gambar_produk);
        }

        $product->delete();
        return redirect()->route('rekap.produk')->with('success', 'Produk berhasil dihapus');
    }
}
