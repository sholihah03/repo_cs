@extends('rekap.includes.master')
@section('title', 'Tambah Produk')
@section('ProductActive','shadow-soft-xl',)
@section('content')

<div class="flex-auto px-0 pt-0 pb-2">
    <h2 class="text-lg font-semibold mb-4">Tambah Produk</h2>

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Gambar Produk</label>
        <div class="mb-4">
            <input type="file" name="gambar_produk" accept="image/*" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" />
        </div>
        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Nama Produk</label>
        <div class="mb-4">
            <input type="text" name="nama_produk" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" placeholder="Nama Produk" />
            @error('nama_produk')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Stok</label>
        <div class="mb-4">
            <input type="number" name="stok" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" placeholder="stok" />
            @error('stok')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Harga</label>
        <div class="mb-4">
            <input type="text" name="harga_botol" class="focus:shadow-soft-primary-outline text-sm leading-5.6 block w-full rounded-lg border border-solid border-gray-300 bg-white px-3 py-2" placeholder="Harga" />
            @error('harga_botol')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
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
