@extends('rekap.includes.master')
@section('title', 'datarekapcs')
@include('rekap.includes.sidenav')
@section('content')
<div class="w-full px-6 py-6 mx-auto">
<div class="flex flex-wrap -mx-3 justify-center items-center">
    <div class="w-full p-6 mx-auto">
      <div class="flex flex-wrap -mx-3">
          <!-- Search Form and Profile -->
          <div class="w-full max-w-full px-3 xl:w-4/12">
              <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                  <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                      <h6 class="mb-0">Profile Cs</h6>
                  </div>
                  <form action="{{ route('rekapdata') }}" method="GET" class="p-4 flex items-center">
                      <div class="relative w-full flex items-center">
                          <input type="text" name="search" id="searchInput" class="pl-6 rounded-lg pr-10 text-sm focus:shadow-soft-primary-outline ease-soft w-full leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-l-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
                          <button type="submit" class="absolute rounded-lg right-0 top-0 bottom-0 flex items-center justify-center px-3 py-2 text-gray-500 bg-gray-200 rounded-r-lg border-l border-gray-300 hover:bg-gray-300">
                              <i class="fas fa-search"></i>
                          </button>
                      </div>
                  </form>
                  <div class="p-4">
                    @foreach ($karyawanCS as $karyawan)
                      <div class="flex items-center mb-4 leading-normal text-sm">
                        <img src="{{ asset('storage/profile_karyawan/' . ($karyawan->profile_karyawan ?? 'default/profile.png')) }}" 
                        alt="Foto {{ $karyawan->nama_lengkap }}" 
                        class="w-8 h-8 rounded-full mr-4">       

                          <!-- Tombol untuk setiap karyawan -->
                          <button type="button" class="text-left" onclick="fetchKaryawanData({{ $karyawan->id_karyawan }})">
                              <p class="mb-0 leading-normal text-sm font-semibold">{{ $karyawan->nama_lengkap }}</p>
                          </button>
                      </div>
                  @endforeach
                </div>
                
              </div>
          </div>
  
          <!-- Forms for Closing, Lead, and CR New -->
          <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
            <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border p-4">
                <div class="flex items-center mb-4">
                    <img id="profileImage" src="" alt="Profile Image" class="w-10 h-10 rounded-full mr-4">
                    <p id="karyawanName" class="font-semibold text-gray-700"></p>
                </div>
                <div class="flex gap-x-6">
                    <!-- Form 1 - Closing -->
                    <div class="flex-1">
                        <label for="closing" class="block text-xs font-medium text-gray-700">Closing</label>
                        <input type="number" id="closing" name="closing" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Form 2 - Lead -->
                    <div class="flex-1">
                        <label for="lead" class="block text-xs font-medium text-gray-700">Lead</label>
                        <input type="number" id="lead" name="lead" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Calculated Result - CR New -->
                    <div class="flex-1">
                        <label for="crNew" class="block text-xs font-medium text-gray-700">CR New</label>
                        <input type="text" id="crNew" name="crNew" class="w-full h-10 px-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                    </div>
                </div>
            </div>
        </div>        
      </div>
  </div>
  
  <script>
    function fetchKaryawanData(karyawanId) {
          fetch(`{{ route('rekap.search.karyawan') }}?search=${karyawanId}`)
              .then(response => response.json())
              .then(data => {
                  // Isi data profil dan nama karyawan
                  document.getElementById('profileImage').src = `{{ asset('storage/') }}/${data.profile_karyawan}`;
                  document.getElementById('karyawanName').textContent = data.nama_lengkap;

                  // Isi data closing, lead, dan hitung CR New
                  document.getElementById('closing').value = data.closing;
                  document.getElementById('lead').value = data.lead;

                  // Hitung CR New sebagai persentase bulat
                  const closing = parseFloat(data.closing) || 0;
                  const lead = parseFloat(data.lead) || 0;
                  const crNew = lead !== 0 ? Math.round((closing / lead) * 100) + "%" : "N/A";
                  document.getElementById('crNew').value = crNew;
              })
              .catch(error => console.error('Error:', error));
      }
  </script>
@endsection