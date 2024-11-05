@extends('rekap.includes.sidenav')
@section('title', 'History Akun')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                    <h6>Authors Table</h6>
                    <div class="flex justify-between items-center">
                        {{-- <div>
                            <label for="jabatan" class="mr-2 text-xs font-semibold text-slate-600">Jabatan:</label>
                            <select id="jabatan" name="jabatan_id" class="border rounded-md text-xs p-1" onchange="filterTable()">
                                <option value="">Pilih Jabatan</option>
                                @foreach($jabatan as $j)
                                <option value="{{ $j->id_jabatan }}">{{ $j->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="karyawanTable">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Username</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No. Telp</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Mulai Bekerja</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Akhir Bekerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($historyakun as $h)
                                <tr data-jabatan="{{ $h->jabatan_id }}"> <!-- Tambahkan atribut data-jabatan -->
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                @if ($h->profile_karyawan)
                                                        <img src="{{ asset('storage/' . $h->profile_karyawan) }}"
                                                                class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                                alt="user1" />
                                                    @else
                                                        <img src="{{ asset('images/profile.png') }}"
                                                                class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                                alt="user1" />
                                                    @endif
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal">{{ $h->nama_lengkap ?? 'Data tidak tersedia' }}</h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">
                                                    {{ $h->jabatan ? $h->jabatan->nama_jabatan : 'Data tidak tersedia' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $h->username ?? 'Data tidak tersedia' }}</p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $h->email ?? 'Data tidak tersedia' }}</p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $h->no_telepon ?? 'Data tidak tersedia' }}</p>
                                    </td>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $h->status ?? 'Data tidak tersedia' }}</span>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">{{ $h->mulai_bekerja ?? 'Data tidak tersedia' }}</span>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400"></span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    function filterTable() {
        var selectedJabatan = document.getElementById('jabatan').value;
        var rows = document.querySelectorAll('#karyawanBody tr');

        rows.forEach(row => {
            // Mengambil id_jabatan dari atribut data-jabatan
            var jabatanId = row.getAttribute('data-jabatan');
            // Menyembunyikan atau menampilkan baris berdasarkan id_jabatan
            if (selectedJabatan === "" || jabatanId === selectedJabatan) {
                row.style.display = ""; // Tampilkan baris
            } else {
                row.style.display = "none"; // Sembunyikan baris
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        filterTable(); // Panggil filter pada saat halaman dimuat
    });
</script> --}}
@endsection
