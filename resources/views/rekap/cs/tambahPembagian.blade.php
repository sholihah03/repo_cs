@extends('rekap.includes.master')
@section('title', 'Tambah Pembagian')
@section('PembagianprodukActive','shadow-soft-xl',)
@section('content')

<div class="flex-auto px-6 pt-6 pb-2">
    <h2 class="text-lg font-semibold mb-4">Tambah Pembagian</h2>

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('pembagianProdukCS.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Filter Karyawan dengan Jabatan CS -->
        <div class="mb-6">
            <label for="cs" class="block font-semibold text-gray-700 mb-2">Pilih Karyawan (CS)</label>
            <select name="karyawan_id" id="cs" class="form-select w-full max-w-xs border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-400">
                <option value="">Pilih Karyawan</option>
                @foreach($cs as $karyawan)
                    <option value="{{ $karyawan->id_karyawan }}">{{ $karyawan->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <!-- Filter Nama Produk dengan Batasan Maksimal 5 Produk -->
        <div class="mb-6">
            <label for="produk" class="block font-semibold text-gray-700 mb-2">Pilih Produk</label>
            <p class="text-sm text-red-500 mb-3">Maksimal pemilihan 5 produk.</p>
            <div class="flex items-center gap-2">
                <select id="produk" class="form-select w-full max-w-xs border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-400">
                    <option value="">Pilih Produk</option>
                    @foreach($produk as $item)
                        <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                    @endforeach
                </select>
                <button type="button" id="addProductBtn" class="bg-blue-500 text-black p-2 rounded-md hover:bg-blue-600 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="M0 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4 7h5V4h2v5h5v2h-5v5H9v-5H4z"/></svg>
                </button>
            </div>

            <!-- Daftar produk yang dipilih dengan kartu -->
            <div id="selectedProducts" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Produk yang dipilih akan ditambahkan di sini -->
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-end">
            <button type="submit" style="background-color: #4caaf2; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; display: inline-block;" class="px-6 py-2 bg-blue-600 text-black rounded-md hover:bg-blue-700 transition duration-200">
                Tambah Pembagian
            </button>

            <button type="button" onclick="window.location='{{ route('pembagianProdukCS.index') }}';"  style="background-color: #ee2525; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; margin-left: 1rem; display: inline-block;" class="hover:bg-red-600 transition duration-300 ease-in-out">
                Kembali
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addProductBtn = document.getElementById('addProductBtn');
        const selectedProducts = document.getElementById('selectedProducts');
        const produkSelect = document.getElementById('produk');
        let selectedProductCount = 0;
        const selectedProductIds = [];

        addProductBtn.addEventListener('click', () => {
            const produkId = produkSelect.value;
            const produkName = produkSelect.options[produkSelect.selectedIndex].text;

            if (produkId && selectedProductCount < 5 && !selectedProductIds.includes(produkId)) {
                selectedProductCount++;
                selectedProductIds.push(produkId);

                const productCard = document.createElement('div');
                productCard.classList.add('bg-blue-100', 'p-4', 'rounded-lg', 'shadow-lg', 'flex', 'justify-between', 'items-center', 'border', 'border-blue-300');
                productCard.innerHTML = `
                    <input type="hidden" name="produk_ids[]" value="${produkId}">
                    <span class="font-medium text-gray-800">${produkName}</span>
                    <button type="button" class="remove-product bg-red-500 text-black px-3 py-1 rounded hover:bg-red-600 transition duration-200">Hapus</button>
                `;
                selectedProducts.appendChild(productCard);

                produkSelect.querySelector(`option[value="${produkId}"]`).disabled = true;
                produkSelect.querySelector(`option[value="${produkId}"]`).style.display = 'none';

                productCard.querySelector('.remove-product').addEventListener('click', () => {
                    productCard.remove();
                    selectedProductCount--;
                    selectedProductIds.splice(selectedProductIds.indexOf(produkId), 1);

                    const option = produkSelect.querySelector(`option[value="${produkId}"]`);
                    option.disabled = false;
                    option.style.display = '';
                });
            } else if (selectedProductCount >= 5) {
                alert("Anda hanya bisa memilih maksimal 5 produk.");
            } else if (selectedProductIds.includes(produkId)) {
                alert("Produk ini sudah dipilih.");
            }
        });
    });
</script>
@endsection
