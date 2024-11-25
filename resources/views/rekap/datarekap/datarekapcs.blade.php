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
                <img src="{{ asset('storage/profile_karyawan/' . ($karyawan->profile_karyawan ?? 'default/profile.png')) }}" alt="Foto {{ $karyawan->nama_lengkap }}" class="w-8 h-8 rounded-full mr-4">       
                
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
            <div id="errorMessage" class="text-red-500 mb-4 hidden text-sm">Data karyawan sudah di inputkan.</div>

            <form action="{{ route('hasilcs.store') }}" method="POST">
                @csrf
                <input type="hidden" name="rekapcs_id" id="rekapcs_id">
                <input type="hidden" name="rekap_produk_id" id="rekap_produk_id">
            
                <div class="flex gap-x-6">
                    <!-- Form 1 - Closing -->
                    <div class="flex-1">
                        <label for="closing" class="block text-xs font-medium text-gray-500">Closing</label>
                        <input type="number" id="closing" name="closing" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Form 2 - Lead -->
                    <div class="flex-1">
                        <label for="lead" class="block text-xs font-medium text-gray-500">Lead</label>
                        <input type="number" id="lead" name="lead" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Calculated Result - CR New -->
                    <div class="flex-1">
                        <label for="crNew" class="block text-xs font-semibold text-gray-700">CR New</label>
                        <input type="text" id="crNew" name="cr_new" class="w-full h-10 px-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                    </div>
                </div><br>
            
                <div class="flex gap-x-6">
                    <!-- Form - Total Botol -->
                    <div class="flex-1">
                        <label for="totalBotol" class="block text-xs font-medium text-gray-500">Total Botol</label>
                        <input type="number" id="totalBotol" name="totalBotol" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Form - Total Closing -->
                    <div class="flex-1">
                        <label for="closingRatio" class="block text-xs font-medium text-gray-500">Closing</label>
                        <input type="number" id="closingRatio" name="closingRatio" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Calculated Result - Ratio Botol -->
                    <div class="flex-1">
                        <label for="ratioBotol" class="block text-xs font-semibold text-gray-700">Ratio Botol</label>
                        <input type="text" id="ratioBotol" name="ratio_botol" class="w-full h-10 px-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                    </div>
                </div><br>
            
                <div class="flex gap-x-6">
                    <!-- Form - Total Botol -->
                    <div class="flex-1">
                        <label for="totalBotolOmzet" class="block text-xs font-medium text-gray-500">Total Botol</label>
                        <input type="number" id="totalBotolOmzet" name="totalBotolOmzet" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Form - Total Closing -->
                    <div class="flex-1">
                        <label for="hargaBotol" class="block text-xs font-medium text-gray-500">Harga</label>
                        <input type="number" id="hargaBotol" name="hargaBotol" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Calculated Result - Omzet -->
                    <div class="flex-1">
                        <label for="omzet" class="block text-xs font-semibold text-gray-700">Omzet</label>
                        <input type="text" id="omzet" name="omzet" class="w-full h-10 px-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                    </div>
                </div><br>

                <div class="flex gap-x-6">
                    {{-- coba --}}
                    <div class="flex-1">
                      <label for="omzet" id="omzet" class="block text-xs font-medium text-gray-700">Omzet</label>
                      <input type="text" id="omzet2" name="omzet2" class="w-full h-10 px-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                    </div>
                    <!-- Form - Total Closing -->
                    <div class="flex-1">
                        <label for="hargaBotol" class="block text-xs font-medium text-gray-500">%</label>
                        <input type="number" id="persen" name="persen" class="w-full h-10 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
                    <!-- Calculated Result - Omzet -->
                    <div class="flex-1">
                        <label for="omzet" class="block text-xs font-semibold text-gray-700">Bagi Hasil</label>
                        <input type="text" id="hasil" name="hasil" class="w-full h-10 px-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                    </div>

                </div>
                {{-- <button type="submit" class="mt-4 w-full bg-blue-500 text-gray py-2 rounded-lg hover:bg-blue-600">Simpan Hasil</button> --}}
                <div class="flex justify-center mt-4">
                  <button type="submit" class="inline-flex items-center gap-2 rounded-full border border-purple-400 px-6 py-2 text-sm font-semibold text-purple-600 transition-all hover:bg-purple-400 hover:text-black   hover:shadow-lg active:scale-95">
                      Submit
                  </button>
              </div>
            </form>

          </div>
          </div>
          
          <!-- persamaan per target 70%-->
          <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
            <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border p-4">
              <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-0">Target</h6>
              </div>
              <form action="{{ route('search.karyawan') }}" method="GET" class="p-4 flex items-center">
                <div class="relative w-full flex items-center">
                  <input type="text" name="searchTarget" id="searchInput" class="pl-6 rounded-lg pr-10 text-sm focus:shadow-soft-primary-outline ease-soft w-full leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-l-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
                  <button type="submit" class="absolute rounded-lg right-0 top-0 bottom-0 flex items-center justify-center px-3 py-2 text-gray-500 bg-gray-200 rounded-r-lg border-l border-gray-300 hover:bg-gray-300">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
              @foreach ($karyawanTarget as $karyawan)
              <div class="flex items-center mb-4 leading-normal text-sm">
                <input type="hidden" name="{{$karyawan->id_karyawan}}">
                <img src="{{ asset('storage/profile_karyawan/' . ($karyawan->profile_karyawan ?? 'default/profile.png')) }}" alt="Foto {{ $karyawan->nama_lengkap }}" class="w-8 h-8 rounded-full mr-4">       
                <button type="button" class="text-left" onclick="fetchKaryawanDataTarget({{ $karyawan->id_karyawan }})">
                  <p class="mb-0 leading-normal text-sm font-semibold">{{ $karyawan->nama_lengkap }}</p>
                </button>
              </div>
              @endforeach
              <form action="{{ route('notifikasi.cs.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_karyawan" id="id_karyawan" value="">
                <div class="flex gap-x-6">
                    <!-- CR New -->
                    <div class="flex-1">
                        <label for="crNew" class="block text-xs font-medium text-gray-700">CrNew</label>
                        <input type="text" id="crNewTarget" name="cr_new" class="w-full h-10 px-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                    </div>
            
                    <!-- Status Target -->
                    <div class="flex-1">
                        <label for="target" class="block text-xs font-medium text-gray-700">Target</label>
                        <input type="text" id="targetStatus" name="target" class="w-full h-10 px-3 border rounded-lg bg-gray-100 readonly" readonly>
                    </div>
                </div>
            
                <div class="flex justify-center mt-4">
                    <button type="submit" class="inline-flex items-center gap-2 rounded-full border border-purple-400 px-6 py-2 text-sm font-semibold text-purple-600 transition-all hover:bg-purple-400 hover:text-black hover:shadow-lg active:scale-95">
                        Submit
                    </button>
                </div>
            </form>            
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
            console.log('coba aja', data); // Debug untuk memastikan data diterima

            if (data.rekapcs_id) {
                // Jika data sudah ada di HasilCs, jangan tampilkan lagi
                if (data.rekapcs_id === null) {
                    alert('Data sudah terinput.');
                    return;
                }
                

                document.getElementById('rekapcs_id').value = data.rekapcs_id;
                document.getElementById('rekap_produk_id').value = data.rekap_produk_id;

                document.getElementById('closing').value = data.closing;
                document.getElementById('lead').value = data.lead;
                document.getElementById('closingRatio').value = data.closing;

                var closing = parseFloat(data.closing) || 0;
                var lead = parseFloat(data.lead) || 0;
                var crNew = lead !== 0 ? Math.round((closing / lead) * 100) + "%" : "N/A";
                document.getElementById('crNew').value = crNew;

                var totalBotol = parseFloat(data.totalBotol) || 0;
                var ratioBotol = closing !== 0 ? (totalBotol / closing).toFixed(2) : "N/A";
                document.getElementById('totalBotol').value = totalBotol;
                document.getElementById('ratioBotol').value = ratioBotol;

                var hargaBotol = parseFloat(data.hargaBotol) || 0;
                var omzet = totalBotol * hargaBotol;
                document.getElementById('totalBotolOmzet').value = totalBotol;
                document.getElementById('hargaBotol').value = hargaBotol;
                document.getElementById('omzet').value = omzet;
                document.getElementById('omzet2').value = omzet;
                document.getElementById('persen').value = data.persen_bagi;
                
                var hasil = omzet * data.persen_bagi / 100;
                document.getElementById('hasil').value = hasil;

                // Perbarui gambar dan nama karyawan di div
                document.getElementById('profileImage').src = `{{ asset('storage/profile_karyawan/') }}/${data.profile_karyawan || 'default/profile.png'}`;
                document.getElementById('karyawanName').textContent = data.nama_lengkap;

                // Hide error message if data is found
                document.getElementById('errorMessage').classList.add('hidden');
            } else {
                // Show error message if data not found
                document.getElementById('errorMessage').classList.remove('hidden');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function fetchKaryawanDataTarget(karyawanId) {
    fetch(`{{ route('rekap.search.karyawan.target') }}?search=${karyawanId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('id_karyawan').value = karyawanId;
            document.getElementById('crNewTarget').value = data.crNew;

            const targetInput = document.getElementById('targetStatus');
            targetInput.value = data.isTargetMet ? 'Memenuhi' : 'Warning';

            // Atur warna berdasarkan status
            if (data.isTargetMet) {
                targetInput.classList.remove('bg-red-100', 'text-red-500', 'border-red-300');
                targetInput.classList.add('bg-green-100', 'text-green-500', 'border-green-300');
            } else {
                targetInput.classList.remove('bg-green-100', 'text-green-500', 'border-green-300');
                targetInput.classList.add('bg-red-100', 'text-red-500', 'border-red-300');
            }
        })
        .catch(error => console.error('Error:', error));
}

function submitTargetNotification() {
        // Ambil nilai dari input CrNew dan Target Status
        const crNewValue = document.getElementById('crNewTarget')?.value || "N/A";
        const targetStatusValue = document.getElementById('targetStatus')?.textContent || "N/A";

        if (!crNewValue || !targetStatusValue) {
            alert('Pastikan data CrNew dan Target Status telah terisi.');
            return;
        }

        const notificationContainer = document.getElementById('notification-container');
        if (!notificationContainer) {
            alert('Notification container tidak ditemukan di DOM!');
            return;
        }

        // Hapus notifikasi sebelumnya jika ada
        const existingNotification = document.getElementById('notification-content');
        if (existingNotification) {
            existingNotification.remove();
        }

        const notificationMessage = `CrNew: ${crNewValue}, Status: ${targetStatusValue}`;
        const notificationList = document.createElement('div');
        notificationList.classList.add(
            'absolute', 'top-12', 'right-0', 'bg-white', 'shadow-lg',
            'p-4', 'rounded-lg', 'w-64', 'z-50'
        );
        notificationList.innerHTML = `
            <div class="flex items-center space-x-2">
                <span class="text-purple-600 font-bold">Notifikasi Baru</span>
            </div>
            <div class="mt-2 text-gray-800 text-sm">
                ${notificationMessage}
            </div>
        `;
        notificationList.id = 'notification-content';
        notificationContainer.appendChild(notificationList);

        document.querySelector('.relative').addEventListener('click', function (e) {
            e.preventDefault();
            const notificationContent = document.getElementById('notification-content');
            if (notificationContent) {
                notificationContent.classList.toggle('hidden');
            }
            });

    }  
  </script>
@endsection
