@extends('rekap.includes.master')
@section('title', 'Edit Pembagian Produk')
@section('PembagianprodukActive','shadow-soft-xl',)
@section('content')

<div class="flex-auto px-6 pt-6 pb-4">
    <h2 class="text-lg font-semibold mb-4">Edit Pembagian Produk</h2>

    <form action="{{ route('pembagianProdukCS.update', $karyawan->id_karyawan) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        
        <!-- Nama CS (read-only) -->
        <div class="mb-6">
            <label for="nama_cs" class="block font-semibold text-gray-700 mb-2">Nama Customer Service</label>
            <input type="text" name="nama_cs" id="nama_cs" value="{{ $karyawan->nama_lengkap }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
        </div>

        <!-- Produk yang Dapat Dihapus atau Diganti serta Ditambahkan -->
        <div class="mb-6">
            <label class="block font-semibold text-gray-700 mb-2">Produk yang Dapat Dihapus atau Diganti</label>
            <div class="space-y-2">
                @foreach ($karyawan->produk as $produk)
                    <div class="flex items-center bg-blue-50 p-4 rounded-md shadow-sm border border-blue-100">
                        <span class="flex-1 text-gray-700 mr-4">{{ $produk->nama_produk }}</span>
                        <input type="hidden" name="produk_ids[]" value="{{ $produk->id_produk }}">
                        <select name="produk_replacement[{{ $produk->id_produk }}]" class="form-select w-48 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-400 mr-2">
                            <option value="">Ganti dengan...</option>
                            @foreach ($allProducts as $item)
                                <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="bg-red-500 text-black px-3 py-1 rounded hover:bg-red-600 transition duration-200 delete-button" onclick="markForDeletion(this, {{ $produk->id_produk }})">
                            Hapus
                        </button>
                    </div>
                @endforeach
        
                <!-- Opsi Produk Tambahan -->
                @if (count($karyawan->produk) < 5)
                    {{-- <div id="produkTambahanContainer">
                        <label class="block font-semibold text-gray-700 mt-4">Tambah Produk</label>
                        <p class="text-sm text-red-500 mb-3">Maksimal pemilihan 5 produk.</p>
                        <select id="produkTambahSelect" class="form-select w-48 border border-gray-300 rounded-md px-3 py-2 mb-2 focus:outline-none focus:ring focus:border-blue-400">
                            <option value="">Pilih Produk...</option>
                            @foreach ($allProducts as $item)
                                <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                            @endforeach
                        </select>
                        <button type="button" id="addProductBtn" class="bg-blue-500 text-black p-2 rounded-md hover:bg-blue-600 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="M0 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4 7h5V4h2v5h5v2h-5v5H9v-5H4z"/></svg>
                        </button>
                    </div> --}}
                    <div id="produkTambahanContainer" class="mt-4">
                        <!-- Label Tambah Produk -->
                        <label class="block font-semibold text-gray-700">Tambah Produk</label>
                        
                        <!-- Peringatan Maksimal Produk -->
                        <p class="text-sm text-red-500 mb-3">Maksimal pemilihan 5 produk.</p>
                        
                        <!-- Kontainer Dropdown dan Tombol Tambah Produk -->
                        <div class="flex items-center gap-2 mb-4">
                            <select id="produkTambahSelect" class="form-select w-48 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                                <option value="">Pilih Produk...</option>
                                @foreach ($allProducts as $item)
                                    <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                                @endforeach
                            </select>
                            
                            <!-- Tombol Tambah Produk -->
                            <button type="button" id="addProductBtn" class="bg-blue-500 text-black p-2 rounded-md hover:bg-blue-600 transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                    <path d="M0 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4 7h5V4h2v5h5v2h-5v5H9v-5H4z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                @endif

                <div id="addedProductsList"></div> <!-- Tempat menampilkan produk yang ditambahkan -->
            </div>
        </div>

        <!-- Buttons (Update and Cancel) -->
        <div class="flex justify-start">
            <button type="submit" style="background-color: #4caaf2; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; display: inline-block;" class="hover:bg-blue-600 transition duration-300 ease-in-out">
                Update
            </button>
            
            <button type="button" onclick="window.location='{{ route('pembagianProdukCS.index') }}';"  style="background-color: #ee2525; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; margin-left: 1rem; display: inline-block;" class="hover:bg-red-600 transition duration-300 ease-in-out">
                Kembali
            </button>
        </div>
    </form>
</div>

<script>
    const maxProducts = 5; // Batas maksimal produk
    const currentProductCount = {{ count($karyawan->produk) }}; // Hitung produk yang sudah ada

    document.getElementById('addProductBtn').addEventListener('click', function() {
        const select = document.getElementById('produkTambahSelect');
        const selectedValue = select.value;
        const selectedText = select.options[select.selectedIndex].text;

        if (selectedValue) {
            // Hitung jumlah produk yang sudah ditambahkan
            const addedProductsCount = document.querySelectorAll('#addedProductsList > div').length;

            if (currentProductCount + addedProductsCount < maxProducts) {
                const addedProductsList = document.getElementById('addedProductsList');
                const newProductDiv = document.createElement('div');
                newProductDiv.className = 'flex items-center bg-green-50 p-2 rounded-md shadow-sm border border-green-100';
                newProductDiv.innerHTML = `
                    <span class="flex-1 text-gray-700 mr-4">${selectedText}</span>
                    <input type="hidden" name="produk_tambah[]" value="${selectedValue}">
                    <button type="button" class="bg-red-500 text-black px-2 py-1 rounded hover:bg-red-600 transition duration-200" onclick="removeProduct(this, '${selectedValue}')">
                        Hapus
                    </button>
                `;
                addedProductsList.appendChild(newProductDiv);

                // Hapus opsi dari dropdown
                removeOptionFromDropdown(select, selectedValue);

                // Reset dropdown
                select.value = '';
            } else {
                alert('Anda tidak dapat menambahkan lebih dari 5 produk.');
            }
        } else {
            alert('Silakan pilih produk untuk ditambahkan.');
        }
    });

    // Fungsi untuk menghapus opsi dari dropdown
    function removeOptionFromDropdown(select, value) {
        const options = select.options;
        for (let i = 0; i < options.length; i++) {
            if (options[i].value === value) {
                options[i].style.display = 'none'; // Sembunyikan opsi yang sudah dipilih
                break;
            }
        }
    }

    // Fungsi untuk menandai produk untuk dihapus
    function markForDeletion(button, produkId) {
        // Menyimpan ID produk yang akan dihapus di input hidden
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'produk_hapus[]'; // Ganti nama sesuai kebutuhan
        input.value = produkId;

        // Menambahkan input ke dalam form
        button.closest('form').appendChild(input);

        // Hapus elemen produk dari tampilan
        button.closest('.flex').remove();

        // Memperbarui hitungan produk yang ditambahkan
        updateProductCount();
    }

    // Fungsi untuk memperbarui hitungan produk
    function updateProductCount() {
        const addedProductsCount = document.querySelectorAll('#addedProductsList > div').length; // Hitung produk yang ditambahkan
        const totalProductCount = currentProductCount + addedProductsCount;

        // Logika untuk membatasi penambahan produk
        const select = document.getElementById('produkTambahSelect');
        if (totalProductCount >= maxProducts) {
            // Jika sudah mencapai batas, sembunyikan dropdown
            select.style.display = 'none';
            alert('Anda tidak dapat menambahkan lebih dari 5 produk.');
        } else {
            select.style.display = 'block'; // Tampilkan dropdown jika belum penuh
        }
    }

    // Fungsi untuk menghapus produk yang ditambahkan
    function removeProduct(button, value) {
        // Hapus opsi dari dropdown
        const select = document.getElementById('produkTambahSelect');
        const options = select.options;
        for (let i = 0; i < options.length; i++) {
            if (options[i].value === value) {
                options[i].style.display = 'block'; // Tampilkan kembali opsi jika dihapus
                break;
            }
        }

        // Hapus elemen produk dari daftar yang ditambahkan
        button.closest('div').remove();

        // Memperbarui hitungan produk yang ditambahkan
        updateProductCount();
    }
</script>
@endsection
