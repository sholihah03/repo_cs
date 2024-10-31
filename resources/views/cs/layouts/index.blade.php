@extends('cs.layouts.main')
@section('title', 'Dashboard CS')

<main class="profile-page">
    <section class="relative py-16 bg-blueGray-200 block h-[250px]">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-purple-100 w-full mb-6 shadow-xl rounded-lg mt-64">
                <div class="px-6">
                    <div class="flex flex-wrap flex-col justify-center items-center relative">
                        {{-- Gambar Profil --}}
                        <div class="w-full flex justify-center">
                            <div class="bg-purple-100 p-2 rounded-full shadow-lg relative -top-12">
                                @if ($cs->profile_karyawan)
                                    <img src="{{ asset('storage/profile_karyawan/' . $cs->profile_karyawan) }}" alt="Foto Profil" class="rounded-full h-40 w-40 object-cover">
                                @else
                                    <img src="{{ asset('images/profile.png') }}" alt="Foto Profil" class="rounded-full h-40 w-40 object-cover">
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
                        <div class="bg-white shadow-xl rounded-lg p-6 max-w-md w-full">
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
                                    <button class="inline-flex items-center gap-2 rounded-full border border-purple-400 px-6 py-2 text-sm font-semibold text-purple-600 transition-all hover:bg-purple-400 hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                        Submit
                                    </button>
                                </div>
                            </form>

                            <div class="mt-6">
                                <label for="produk" class="block text-sm font-medium mb-2">Pilih Produk</label>
                                <div class="flex items-center space-x-2">
                                    <!-- Dropdown Produk -->
                                    <select id="produk" name="id_produk" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                        <option value="" disabled selected>Pilih produk...</option>
                                        @foreach ($produkList as $produkItem)
                                            <option value="{{ $produkItem->id_produk }}">{{ $produkItem->nama_produk }}</option>
                                        @endforeach
                                    </select> 
                            
                                    <!-- Tombol Ikon Tambah -->
                                    <button id="add-product" class="p-2 bg-purple-200 shadow-lg rounded-md flex items-center justify-center ml-2 focus:outline-none">
                                        <i class="fas fa-plus-circle text-purple-500 hover:text-purple-500 text-2xl"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Bagian Produk Terpilih -->
                            <div id="produk-detail" class="mt-4"></div>
                            
                            <!-- Bagian Total Jumlah -->
                            <div id="total-jumlah" class="flex justify-end mt-4 hidden">
                                <div class="p-2 border border-gray-300 bg-purple-100 rounded-md shadow-md"></div>
                            </div>
                            
                            <!-- Tombol Submit -->
                            <div class="flex justify-center mt-4">
                                <button type="submit" class="inline-flex items-center gap-2 rounded-full border border-purple-400 px-6 py-2 text-sm font-semibold text-purple-600 transition-all hover:bg-purple-400 hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                    Submit
                                </button>
                            </div>
                            
                            <script>
                                document.getElementById('add-product').addEventListener('click', function(event) {
                                    event.preventDefault();
                                    const produkSelect = document.getElementById('produk');
                                    const produkId = produkSelect.value;
                            
                                    if (produkId) {
                                        fetch(`/cs/produk/${produkId}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                const detailDiv = document.getElementById('produk-detail');
                                                detailDiv.innerHTML += `
                                                    <div class="p-3 border bg-purple-200 shadow-lg rounded-md text-xs flex items-center justify-between mb-2">
                                                        <img src="/storage/${data.gambar_produk}" alt="${data.nama_produk}" class="w-10 h-10 rounded-full object-cover border border-gray-300">
                                                        <div class="pl-4">
                                                            <p class="font-semibold">${data.nama_produk}</p>
                                                            <p>Rp ${parseFloat(data.harga_botol).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}</p>
                                                        </div>
                                                        <div class="ml-auto w-1/4 flex flex-col items-end">
                                                            <label class="block text-xs font-medium">Jumlah</label>
                                                            <input type="number" name="jumlah[${data.id_produk}]" class="jumlah-input mt-1 w-full px-2 py-1 text-sm border border-gray-300 rounded-md" required>
                                                        </div>
                                                    </div>
                                                `;
                            
                                                // Tambahkan event listener pada input jumlah yang baru dibuat untuk menghitung total jumlah
                                                updateJumlahListeners();
                            
                                                // Hapus produk yang dipilih dari dropdown
                                                produkSelect.querySelector(`option[value="${produkId}"]`).remove();
                                            })
                                            .catch(error => console.error('Error fetching product data:', error));
                                    } else {
                                        alert('Pilih produk terlebih dahulu.');
                                    }
                                });
                            
                                function updateJumlahListeners() {
                                    const jumlahInputs = document.querySelectorAll('.jumlah-input');
                                    jumlahInputs.forEach(input => {
                                        input.addEventListener('input', function() {
                                            updateTotalJumlah();
                                            
                                            // Tampilkan kotak total hanya jika ada input yang diisi
                                            const totalJumlahDiv = document.getElementById('total-jumlah');
                                            if (Array.from(jumlahInputs).some(input => input.value > 0)) {
                                                totalJumlahDiv.classList.remove('hidden');
                                            } else {
                                                totalJumlahDiv.classList.add('hidden');
                                            }
                                        });
                                    });
                                }
                            
                                function updateTotalJumlah() {
                                    let totalJumlah = 0;
                                    const jumlahInputs = document.querySelectorAll('.jumlah-input');
                            
                                    jumlahInputs.forEach(input => {
                                        const jumlah = parseInt(input.value) || 0;
                                        totalJumlah += jumlah;
                                    });
                            
                                    const totalJumlahDiv = document.getElementById('total-jumlah');
                                    totalJumlahDiv.querySelector('div').innerHTML = `
                                        <span class="text-gray-500 text-sm">Total: </span>
                                        <span class="text-purple-600 text-sm font-semibold">${totalJumlah}</span>
                                    `;
                                }
                            </script>
                                                            
    </section>
</main>
