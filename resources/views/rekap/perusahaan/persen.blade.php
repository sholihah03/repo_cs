@extends('rekap.includes.master')
@section('title', 'rincian')
@section('PersenActive','shadow-soft-xl',)
@section('content')

<!-- Persen Bagian Hasil -->
<div class="flex-none w-full max-w-full px-3 mt-6">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6 class="mb-1">Persen Bagi Hasil</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Perusahaan</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Persen Bagi Hasil</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex px-2 py-1">
                                    <div>
                                        @if ($perusahaan && $perusahaan->logo)
                                            <img src="{{ asset('storage/' . $perusahaan->logo) }}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1">
                                        @else
                                        <img src="{{ asset('Porto/Porto/assets/image/logo-light.svg') }}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1">
                                        @endif
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-0 text-sm leading-normal">{{ $perusahaan->nama_perusahaan ?? 'Nama Perusahaan' }}</h6>
                                        <p class="mb-0 text-xs leading-tight text-slate-400">{{ $kontakPerusahaan->email ?? 'Email Perusahaan' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-xs font-semibold leading-tight">{{ isset($perusahaan->persenBagiHasil->persen) ? number_format($perusahaan->persenBagiHasil->persen, 0) : 'Persen' }}%
                                </p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <a href="{{ route('persen.edit') }}"
                                    style="background-color: #16a34a; padding: 0.5rem 1rem; color: white; font-size: 10px; border-radius: 4px; font-weight: bold; text-transform: uppercase; width: 70px; margin-bottom: 0.5rem; text-align: center;">
                                    Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Persen Target Hasil -->
<div class="flex-none w-full max-w-full px-3 mt-6">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6 class="mb-1">Persen Target Perusahaan</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Perusahaan</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Persen Target Perusahaan</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex px-2 py-1">
                                    <div>
                                        @if ($perusahaan && $perusahaan->logo)
                                            <img src="{{ asset('storage/' . $perusahaan->logo) }}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1">
                                        @else
                                        <img src="{{ asset('Porto/Porto/assets/image/logo-light.svg') }}" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1">
                                        @endif
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-0 text-sm leading-normal">{{ $perusahaan->nama_perusahaan ?? 'Nama Perusahaan' }}</h6>
                                        <p class="mb-0 text-xs leading-tight text-slate-400">{{ $kontakPerusahaan->email ?? 'Email Perusahaan' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 text-xs font-semibold leading-tight">{{ isset($perusahaan->persenTarget->persen_target) ? number_format($perusahaan->persenTarget->persen_target, 0) : 'Persen Target' }}%
                                </p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <a href="{{ route('persen.target.edit') }}"
                                    style="background-color: #16a34a; padding: 0.5rem 1rem; color: white; font-size: 10px; border-radius: 4px; font-weight: bold; text-transform: uppercase; width: 70px; margin-bottom: 0.5rem; text-align: center;">
                                    Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
