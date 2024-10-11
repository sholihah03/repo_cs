@extends('rekap.includes.master')
@section('title', 'kontak perusahaan')

@section('content')
@include('rekap.includes.sidenav')
<div class="w-full px-6 py-6 mx-auto">
  <!-- table 1 -->
  <div class="container z-10">
    <div class="flex flex-wrap mt-0 -mx-3">
      <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0" style="padding-top: 2px;">
        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
            <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Welcome back</h3>
          </div>
          <div class="flex-auto p-6">
            <form action="{{ route('kontakperusahaan.store') }}" method="POST">
              @csrf
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">No .Telp</label>
              <div class="mb-4">
                  <input type="text" name="no_telepon" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="No Telepon" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
              <div class="mb-4">
                  <input type="email" name="email" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Email" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Instagram</label>
              <div class="mb-4">
                  <input type="text" name="instagram" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Instagram" />
              </div>
              <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Wa</label>
              <div class="mb-4">
                  <input type="text" name="wa" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="WhatsApp" />
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
