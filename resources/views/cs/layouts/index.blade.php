@extends('cs.layouts.main')
@section('title', 'Dashbord CS')

<main class="profile-page">
    <section class="relative py-16 bg-blueGray-200 block h-[250px]">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-64" >
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

                            <!-- Form Dropdown di atas Produk -->
                            <div class="mt-6">
                                <!-- Label Produk -->
                                <div class="mb-2">
                                    <label for="selectOption" class="block text-sm font-medium">Produk</label>
                                </div>
                                <!-- Dropdown -->
                                <select id="selectOption" class="block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                    <option value="kategori1">Kategori 1</option>
                                    <option value="kategori2">Kategori 2</option>
                                    <option value="kategori3">Kategori 3</option>
                                </select>
                            </div>

                            <div class="mt-6">
                                <div class="flex items-start justify-between space-x-4">
                                    <div class="flex items-center space-x-2">
                                        <img src="profile-pic.jpg" alt="Kathy Miller" class="w-8 h-8 rounded-full">
                                        <div>
                                            <p class="text-sm font-medium">Kathy Miller</p>
                                            <p class="text-xs text-gray-500">@KittyKatmills</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Penempatan Tombol Submit di Tengah -->
                            <div class="flex justify-center mt-4">
                                <button class="inline-flex items-center gap-2 rounded-full border border-blue-400 px-6 py-2 text-sm font-semibold text-blue-500 transition-all hover:bg-blue-400 hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

