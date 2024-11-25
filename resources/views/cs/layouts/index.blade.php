@extends('cs.layouts.main')
@section('title', 'Dashboard CS')

<main class="profile-page">
    <section class="relative py-16 bg-blueGray-200 block h-[250px]">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
        </div>
            <div class="relative flex flex-col min-w-0 break-words bg-purple-100 w-full mb-6 shadow-xl rounded-lg mt-60 px-6 py-10 max-w-4xl mx-auto">
                <div class="px-6">
                    <div class="flex flex-wrap flex-col justify-center items-center relative">
                        {{-- Gambar Profil --}}
                        <div class="absolute -top-20">
                            <div class="bg-purple-100 p-2 rounded-full shadow-lg">
                                @if ($cs->profile_karyawan)
                                    <img src="{{ asset('storage/profile_karyawan/' . $cs->profile_karyawan) }}" alt="Foto Profil" class="rounded-full h-40 w-40 object-cover">
                                @else
                                    <img src="{{ asset('images/profile.png') }}" alt="Foto Profil" class="rounded-full h-40 w-40 object-cover">
                                @endif
                            </div>
                        </div>

                        {{-- Nama Lengkap dan Jabatan --}}
                        <div class="w-full text-center mt-24">
                            <h3 class="text-2xl font-semibold leading-normal mb-2 text-blueGray-700">
                                {{ $cs->nama_lengkap ? old('nama_lengkap', $cs->nama_lengkap) : 'Name' }}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                {{ $jabatan->nama_jabatan }}
                            </div>
                            {{-- Jam --}}
                            <div class="text-lg font-semibold text-blueGray-700">
                                @include('cs.layouts.jam')
                            </div>
                        </div>
                    </div>

                    <!-- Form Pemasukan Harian -->
                    <div class="bg-white shadow-xl rounded-lg p-6 max-w-md w-full mx-auto mb-8">
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
                            <div class="flex justify-center mt-4">
                                <button class="inline-flex items-center gap-2 rounded-full border border-purple-400 px-6 py-2 text-sm font-semibold text-purple-600 transition-all hover:bg-purple-400 hover:text-white hover:shadow-lg active:scale-95">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Form Produk Terpilih -->
                    <div class="bg-white shadow-xl rounded-lg p-6 max-w-md w-full mx-auto">
                        <form action="{{ route('cs.rekap.store') }}" method="POST">
                            @csrf
                            <h2 class="text-xl font-semibold mb-4 text-gray-700 text-center">Rekap Produk</h2>
                            <div class="mt-6">
                                <label for="produk" class="block text-sm font-medium mb-2">Pilih Produk</label>
                                <div class="flex items-center space-x-2">
                                    <select id="produk" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                        <option value="" disabled selected>Pilih produk...</option>
                                        @foreach ($produkList as $produkItem)
                                            <option value="{{ $produkItem->id_produk }}">{{ $produkItem->nama_produk }}</option>
                                        @endforeach
                                    </select> 
                                    <button id="add-product" class="p-2 bg-purple-200 shadow-lg rounded-md flex items-center justify-center ml-2 focus:outline-none">
                                        <i class="fas fa-plus-circle text-purple-500 text-2xl"></i>
                                    </button>
                                </div>
                            </div>

                            <div id="produk-detail" class="mt-4"></div>
                            <div id="total-jumlah" class="flex justify-end mt-4 hidden">
                                <div class="p-2 border border-gray-300 bg-purple-100 rounded-md shadow-md"></div>
                            </div>

                            <div class="flex justify-center mt-4">
                                <button type="submit" class="inline-flex items-center gap-2 rounded-full border border-purple-400 px-6 py-2 text-sm font-semibold text-purple-600 transition-all hover:bg-purple-400 hover:text-white hover:shadow-lg active:scale-95">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Script for Handling Product Details -->
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
                                                    <p>Rp ${parseFloat(data.harga_botol).toLocaleString('id-ID')}</p>
                                                </div>
                                                <div class="ml-auto w-1/4 flex flex-col items-end">
                                                    <label class="block text-xs font-medium">Jumlah</label>
                                                    <input type="number" name="jumlah[${data.id_produk}]" class="jumlah-input mt-1 w-full px-2 py-1 text-sm border border-gray-300 rounded-md" required>
                                                </div>
                                            </div>
                                        `;
                                        produkSelect.querySelector(`option[value="${produkId}"]`).remove();
                                        updateJumlahListeners();
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
                                    const totalJumlahDiv = document.getElementById('total-jumlah');
                                    totalJumlahDiv.classList.toggle('hidden', Array.from(jumlahInputs).every(input => input.value <= 0));
                                });
                            });
                        }

                        function updateTotalJumlah() {
                            let totalJumlah = 0;
                            document.querySelectorAll('.jumlah-input').forEach(input => {
                                totalJumlah += parseInt(input.value) || 0;
                            });
                            document.getElementById('total-jumlah').querySelector('div').innerHTML = `
                                <span class="text-gray-500 text-sm">Total: </span>
                                <span class="text-purple-600 text-sm font-semibold">${totalJumlah}</span>
                            `;
                        }
                        
                    </script>
                </div>
            </div>
        </div>
    </section>
</main>