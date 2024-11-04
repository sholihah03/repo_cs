@extends('rekap.includes.master')
@section('title', 'Tambah Produk')

@section('content')
@include('rekap.includes.sidenav')

<div class="flex-auto px-0 pt-0 pb-2">
    <h2 class="text-lg font-semibold mb-4">Tambah Produk</h2>

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="mb-4">
            <label for="gambar_produk" class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
            <input type="file" name="gambar_produk" id="gambar_produk" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>
        <div class="mb-4">
            <label for="nama_produk" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
            <input type="number" name="stok" id="stok" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="harga_botol" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
            <input type="text" name="harga_botol" id="harga_botol" step="0.01" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="flex justify-start">
            <!-- Simpan Button -->
            <button type="submit" style="background-color: #4caaf2; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; display: inline-block;"
                class="hover:bg-blue-600 transition duration-300 ease-in-out">
                Simpan
            </button>
            
            <!-- Batal Button -->
            <button type="button" onclick="window.history.back();" style="background-color: #ee2525; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; margin-left: 1rem; display: inline-block;"
                class="hover:bg-red-600 transition duration-300 ease-in-out">
                Batal
            </button>
        </div>
        
    </form>
</div>

@endsection
