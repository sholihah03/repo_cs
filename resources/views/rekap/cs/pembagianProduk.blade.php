@extends('rekap.includes.master')
@section('title', 'Pembagian Produk')

@section('content')
@include('rekap.includes.sidenav')

<div class="flex-auto px-6 pt-6 pb-2">
    <h2 class="text-lg font-semibold mb-4">Pembagian Produk CS</h2>
    <a href="{{ route('pembagianProdukCS.tambah') }}" 
       style="background-color: #4caaf2; padding: 0.5rem 1rem; color: white; border-radius: 4px; text-transform: uppercase; margin-bottom: 1rem; display: inline-block;">
       Pembagian
    </a>
    <div class="p-0 overflow-x-auto">
        @if($csList->isNotEmpty() && $csList->contains(fn($cs) => $cs->produk->isNotEmpty()))
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-semibold text-left uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">No</th>
                        <th class="px-6 py-3 pl-2 font-semibold text-left uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">Nama Customer Service</th>
                        <th class="px-6 py-3 font-semibold text-center uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">Produk</th>
                        <th class="px-6 py-3 font-semibold text-center uppercase align-middle bg-transparent border-b border-black-200 text-xxs text-black">Aksi</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($csList as $index => $cs)
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap text-center">
                            <p class="mb-0 text-xs text-slate-400">{{ $index + 1 }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                            <p class="mb-0 text-xs text-slate-400">{{ $cs->nama_lengkap }}</p>
                        </td>
                        <td class="p-2 text-sm text-center align-middle bg-transparent border-b whitespace-nowrap">
                            @foreach($cs->produk as $product)
                                <p class="mb-0 text-xs text-slate-400">{{ $product->nama_produk }}</p>
                            @endforeach
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap text-center">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <a href="{{ route('pembagianProdukCS.edit', ['id' => $cs->id_karyawan]) }}" 
                                    style="background-color: #16a34a; padding: 0.5rem 1rem; color: white; font-size: 10px; border-radius: 4px; font-weight: bold; text-transform: uppercase; width: 70px; margin-bottom: 0.5rem; text-align: center;">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-slate-400">Tidak ada data pembagian produk.</p>
        @endif
    </div>
</div>

@endsection
