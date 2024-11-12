@extends('rekap.includes.master')
@section('title', 'alamat perusahaan')

@section('content')
@include('rekap.includes.sidenav')
<div class="w-full px-6 py-6 mx-auto">
  <div class="container z-10">
    <div class="flex flex-wrap mt-0 -mx-3">
      <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0" style="padding-top: 2px;">
        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
            <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Welcome back</h3>
          </div>
          <div class="flex-auto p-6">
            <form action="{{ route('alamatperusahaan.store') }}" method="POST">
              @csrf
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Provinsi</label>
              <div class="mb-4">
                  <input type="text" name="provinsi" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Provinsi" value="{{ old('provinsi', $alamatPerusahaan->provinsi ?? '') }}" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Kabupaten</label>
              <div class="mb-4">
                  <input type="text" name="kabupaten" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Kabupaten" value="{{ old('kabupaten', $alamatPerusahaan->kabupaten ?? '') }}" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Kecamatan</label>
              <div class="mb-4">
                  <input type="text" name="kecamatan" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Kecamatan" value="{{ old('kecamatan', $alamatPerusahaan->kecamatan ?? '') }}" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Kelurahan</label>
              <div class="mb-4">
                  <input type="text" name="kelurahan" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Kelurahan" value="{{ old('kelurahan', $alamatPerusahaan->kelurahan ?? '') }}" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Kode Pos</label>
              <div class="mb-4">
                  <input type="text" name="kode_pos" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Kode Pos" value="{{ old('kode_pos', $alamatPerusahaan->kode_pos ?? '') }}" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">RT</label>
              <div class="mb-4">
                  <input type="text" name="rt" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="RT" value="{{ old('rt', $alamatPerusahaan->rt ?? '') }}" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">RW</label>
              <div class="mb-4">
                  <input type="text" name="rw" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="RW" value="{{ old('rw', $alamatPerusahaan->rw ?? '') }}" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Detail Lainnya</label>
              <div class="mb-4">
                  <input type="text" name="detail_lainnya" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Detail Lainnya" value="{{ old('detail_lainnya', $alamatPerusahaan->detail_lainnya ?? '') }}" />
              </div>
              <div class="text-center">
                  <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Save</button>
              </div>
          </form>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
