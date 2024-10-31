@extends('rekap.includes.master')
@section('title', 'Edit Produk')

@section('content')
@include('rekap.includes.sidenav')

<div class="flex-auto px-0 pt-0 pb-2">
    <h2 class="text-lg font-semibold mb-4">Edit Data Produk</h2>

    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        
        <!-- Gambar Produk -->
        <div class="mb-4">
            <label for="gambar_produk" class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
            <input type="file" name="gambar_produk" id="gambar_produk" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <!-- Display existing image -->
            <img src="{{ asset('storage/' . $produk->gambar_produk) }}" class="h-16 w-16 mt-2" alt="{{ $produk->nama_produk }}">
        </div>
        
        <!-- Nama Produk -->
        <div class="mb-4">
            <label for="nama_produk" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" value="{{ $produk->nama_produk }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        
        <!-- Stok -->
        <div class="mb-4">
            <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ $produk->stok }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        
        <!-- Harga -->
        <div class="mb-4">
            <label for="harga_botol" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
            <input type="text" name="harga_botol" id="harga_botol" value="{{ $produk->harga_botol }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        
        <!-- Buttons (Update and Cancel) -->
        <div class="flex justify-start">
            <!-- Update Button -->
            <button type="submit" style="background-color: #4caaf2; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; display: inline-block;"
                class="hover:bg-blue-600 transition duration-300 ease-in-out">
                Update
            </button>
            
            <!-- Cancel Button -->
            <button type="button" onclick="window.location='{{ route('rekap.produk') }}';" 
                    style="background-color: #ee2525; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; margin-left: 1rem; display: inline-block;"
                    class="hover:bg-red-600 transition duration-300 ease-in-out">
                Batal
            </button>
        </div>
    </form>
</div>

@endsection
