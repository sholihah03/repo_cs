@extends('rekap.includes.master')
@section('title', 'transaksi')
@include('rekap.includes.sidenav')
@section('content')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <!-- Input Transaksi Form -->
        <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
            <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                            <h6 class="mb-0">Input Transaksi</h6>
                        </div>             
                    </div>
                </div>
                <div class="flex-auto p-4">
                    <!-- Form Start -->
                    <form action="{{ route('rekap.neraca.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_transaksi" class="block text-sm font-medium text-gray-700">Nama Transaksi:</label>
                            <input type="text" name="nama_transaksi" id="nama_transaksi" 
                                   style="background-color: white; padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #d1d5db; width: 100%;" required>
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type Transaksi:</label>
                            <select name="type" id="type" 
                                    style="background-color: white; color: black; padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #d1d5db; width: 100%; cursor: pointer;" required>
                                <option value="" disabled selected>Pilih Type Transaksi</option>
                                <option value="debit">Debit</option>
                                <option value="kredit">Kredit</option>
                            </select>
                        </div>
                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" 
                                style="width: 100%; background-color: #3B82F6; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer;"
                                onmouseover="this.style.backgroundColor='#2563EB'" 
                                onmouseout="this.style.backgroundColor='#3B82F6'">
                                Submit
                            </button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </div>

        <!-- Input Detail Transaksi Form -->
        <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
            <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                            <h6 class="mb-0">Input Detail Transaksi</h6>
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-4">
                    <!-- Form Start -->
                    <form action="{{ route('rekap.transaksi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_transaksi" class="block text-sm font-medium text-gray-700">Nama Transaksi:</label>
                            <input type="text" name="nama_transaksi" id="nama_transaksi" 
                            value="{{ old('nama_transaksi', session('nama_transaksi')) }}" 
                            style="background-color: white; padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #d1d5db; width: 100%;" required readonly>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Transaksi:</label>
                            <input type="date" name="tanggal" id="tanggal" 
                                   style="background-color: white; padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #d1d5db; width: 100%;" required>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah" class="block text-sm font-medium text-gray-700">Total Transaksi:</label>
                            <input type="text" name="jumlah" id="jumlah" 
                                   style="background-color: white; padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #d1d5db; width: 100%;" required>
                        </div>
                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan Transaksi:</label>
                            <input type="text" name="keterangan" id="keterangan" 
                                   style="background-color: white; padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #d1d5db; width: 100%;" required>
                        </div>
                        <!-- Tombol Kirim -->
                        <div class="mt-6">
                            <button type="submit" 
                                style="width: 100%; background-color: #3B82F6; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer;"
                                onmouseover="this.style.backgroundColor='#2563EB'" 
                                onmouseout="this.style.backgroundColor='#3B82F6'">
                                Kirim
                            </button>
                        </div>
                    </form>                        
                    <!-- Form End -->
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
