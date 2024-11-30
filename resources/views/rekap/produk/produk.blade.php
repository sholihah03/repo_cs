@extends('rekap.includes.master')
@section('title', 'Produk')

@section('content')
@include('rekap.includes.sidenav')

<div class="flex-auto px-0 pt-0 pb-2">
    <h2 class="text-lg font-semibold mb-4">Daftar Produk</h2>
    <a href="{{ route('rekap.createproduk') }}"
       style="background-color: #4caaf2; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; display: inline-block;">
       Tambah Produk
    </a>
    <div class="p-0 overflow-x-auto">
        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
                <tr>
                    <th class="px-6 py-3 font-semibold text-left uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">Gambar Produk</th>
                    <th class="px-6 py-3 pl-2 font-semibold text-left uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">Nama Produk</th>
                    <th class="px-6 py-3 font-semibold text-center uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">Stok</th>
                    <th class="px-6 py-3 font-semibold text-center uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">Harga</th>
                    <th class="px-6 py-3 font-semibold text-center uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $item)
                <tr>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                        <img src="{{ asset('storage/' . $item->gambar_produk) }}" class="h-16 w-16 rounded-xl" alt="{{ $item->gambar_produk }}" />
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                        <p class="mb-0 text-xs text-slate-400">{{ $item->nama_produk }}</p>
                    </td>
                    <td class="p-2 text-sm text-center align-middle bg-transparent border-b whitespace-nowrap">
                        <p class="mb-0 text-xs text-slate-400">{{ $item->stok }}</p>
                    </td>
                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap">
                        <p class="mb-0 text-xs text-slate-400">{{ number_format($item->harga_botol, 0) }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap text-center">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <a href="{{ route('editproduk', $item->id_produk) }}"
                               style="background-color: #16a34a; padding: 0.5rem 1rem; color: white; font-size: 10px; border-radius: 4px; font-weight: bold; text-transform: uppercase; width: 70px; margin-bottom: 0.5rem; text-align: center;">Edit</a>

                            <form action="{{ route('produk.destroy', $item->id_produk) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="background-color: #dc2626; padding: 0.5rem 1rem; color: white; font-size: 10px; border-radius: 4px; font-weight: bold; text-transform: uppercase; width: 70px;"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
