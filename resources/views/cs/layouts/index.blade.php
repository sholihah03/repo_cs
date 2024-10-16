@extends('cs.layouts.main')
@section('title', 'Dashboard CS')

<main class="profile-page">
    <section class="relative py-16 bg-blueGray-200 block h-[250px]">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-64">
                <div class="px-6">
                    <div class="flex flex-wrap flex-col justify-center items-center relative">
                        {{-- Gambar Profil --}}
                        <div class="w-full flex justify-center">
                            <div class="bg-white p-2 rounded-full shadow-lg relative -top-12">
                                @if ($cs->profile_karyawan)
                                <img src="{{ asset('storage/profile_karyawan/' . $cs->profile_karyawan) }}"
                                     alt="Foto Profil"
                                     class="rounded-full h-40 w-40 object-cover">
                                @else
                                <img src="{{ asset('images/profile.png') }}" 
                                     alt="Foto Profil" 
                                     class="rounded-full h-40 w-40 object-cover">
                                @endif
                            </div>
                            {{-- Jam --}}
                            <div class="absolute" style="right: 50px;">
                                @include('cs.layouts.jam')
                            </div>
                        </div>

                        {{-- Nama Lengkap dan Jabatan --}}
                        <div class="w-full text-center -mt-5">
                            <h3 class="text-2xl font-semibold leading-normal mb-2 text-blueGray-700">
                                {{ $cs->nama_lengkap ? old('nama_lengkap', $cs->nama_lengkap) : 'Name' }}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                {{ $jabatan->nama_jabatan }}
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center items-center min-h-screen">
                        <div class="bg-purple-50 shadow-xl rounded-lg p-6 max-w-md w-full">
                            <h2 class="text-xl font-semibold mb-4 text-gray-700 text-center">Pemasukan Harian</h2>
                            <form action="{{ route('rekap_cs.store') }}" method="POST">
                                @csrf
                                <div class="flex space-x-4">
                                    <div class="w-1/2">
                                        <label for="input1" class="block text-sm font-medium">Lead</label>
                                        <input id="input1" name="total_lead" type="number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                                    </div>

                                    <div class="w-1/2">
                                        <label for="input2" class="block text-sm font-medium">Closing</label>
                                        <input id="input2" name="total_closing" type="number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                                    </div>
                                </div>

                                <!-- Penempatan Tombol Submit di Tengah -->
                                <div class="flex justify-center mt-4">
                                    <button class="inline-flex items-center gap-2 rounded-full border border-blue-400 px-6 py-2 text-sm font-semibold text-blue-500 transition-all hover:bg-blue-400 hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                        Submit
                                    </button>
                                </div>
                            </form>

                                <!-- Dropdown Produk -->
                                <div class="mt-6">
                                    <label for="produk" class="block text-sm font-medium mb-2">Pilih Produk</label>
                                    <select id="produk" name="produk_id" class="mt-1 block w-full p-2 border border-purple-300 rounded-md" required>
                                        <option value="" disabled selected>Pilih produk...</option>
                                        @foreach ($produk as $produk) <!-- Menggunakan variabel $produks yang harus dikirim dari controller -->
                                            <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Menampilkan Produk Tunggal -->
                                <div class="mt-6">
                                    <div class="flex items-start justify-between space-x-4">
                                        <!-- Menampilkan Foto Produk -->
                                        <div class="flex items-center space-x-2">
                                            <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" class="w-8 h-8 rounded-full">
                                            <div>
                                                <!-- Menampilkan Nama Produk -->
                                                <p class="text-sm font-medium">{{ $produk->nama_produk }}</p>
                                                <!-- Menampilkan Harga Produk -->
                                                <p class="text-xs text-gray-500">{{ number_format($produk->harga_botol, 2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

