@extends('rekap.includes.sidenav')
@section('title', 'Dashboard Manager')
@section('content')
<!-- Dropdown -->
<div class="flex flex-wrap lg:flex-nowrap px-6 py-6 justify-end items-center gap-4">
    <!-- Dropdown untuk Nama Customer Service -->
    <div class="border p-4 rounded-xl shadow-sm mr-2 bg-white lg:order-3">
        <label for="jabatan" class="mr-2 text-md font-semibold text-slate-600">Nama CS:</label>
        <select id="jabatan" name="jabatan_id" class="border rounded-md text-sm p-1" onchange="filterTable()">
            <option value="">Pilih CS</option>
            @foreach($karyawanWithBagiHasil as $cs)
                <option value="{{ $cs->id_karyawan }}">{{ $cs->nama_lengkap }}</option>
            @endforeach
        </select>
    </div>
    <!-- Dropdown untuk Bulan -->
    <div class="border p-4 rounded-xl shadow-sm mr-2 bg-white lg:order-1">
        <label for="bulan" class="mr-2 text-md font-semibold text-slate-600">Bulan:</label>
        <select id="bulan" name="bulan" class="border rounded-md text-sm p-1" onchange="filterTable()">
            <option value="">Pilih Bulan</option>
            @foreach (range(1, 12) as $month)
                <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}</option>
            @endforeach
        </select>
    </div>
    <!-- Dropdown untuk Tahun -->
    <div class="border p-4 rounded-xl shadow-sm mr-2 bg-white lg:order-2">
        <label for="tahun" class="mr-2 text-md font-semibold text-slate-600">Tahun:</label>
        <select id="tahun" name="tahun" class="border rounded-md text-sm p-1" onchange="filterTable()">
            <option value="">Pilih Tahun</option>
            @foreach ($tahunList as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="w-full px-6 py-6 mx-auto -mt-2">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-2 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                    <h6>Diagram Bagi Hasil per CS</h6>
                </div>

                <div id="selectedDate" class="text-center font-bold mt-4">
                    <!-- Menampilkan bulan dan tahun yang dipilih -->
                </div>

                <div id="selectedCS" class="text-center font-bold mt-2">
                    <!-- Menampilkan nama CS yang dipilih -->
                </div>

                {{-- <div id="selectedMonth" class="text-center font-bold mt-4">
                    <!-- Menampilkan bulan dan tahun yang dipilih -->
                </div> --}}

                {{-- <div id="selectedYear" class="text-center font-bold mt-4">
                    <!-- Menampilkan bulan dan tahun yang dipilih -->
                </div> --}}

                <!-- Grafik Batang -->
                <div class="p-6">
                    <canvas id="barChart" width="300" height="150"></canvas>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <!-- Header -->
                <div class="p-6 pb-0 mb-0 bg-gray-100 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center z-20">
                    <h6 class="font-bold text-slate-700">Data Bagi Hasil per CS</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0">
                        <!-- Kontainer dengan scrollbar -->
                        <div id="scrollableContainer" class="bg-white rounded-lg border border-gray-300 overflow-y-auto" style="max-height: 24rem; display: flex; flex-direction: column; padding: 0; margin: 0;">
                            <table class="items-center w-full mb-0 align-top border-collapse text-slate-500" id="karyawanTable" style="margin-bottom: 0;">
                                <thead class="align-bottom sticky top-0 z-10 bg-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle text-xxs tracking-none text-slate-700">Nama</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle text-xxs tracking-none text-slate-700">Bulan / Tahun</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle text-xxs tracking-none text-slate-700">Total Bagi Hasil</th>
                                    </tr>
                                </thead>
                                <tbody id="karyawanBody">
                                    @foreach($karyawanWithBagiHasil as $cs)
                                        @foreach($cs->bagi_hasil_per_bulan as $bulan => $totalBagiHasil)
                                            <tr data-cs="{{ $cs->id_karyawan }}" data-bulan="{{ Carbon\Carbon::parse($bulan)->month }}" data-tahun="{{ Carbon\Carbon::parse($bulan)->year }}">
                                                <td class="p-2 align-middle bg-transparent border-b border-gray-200 whitespace-nowrap">
                                                    <div class="flex px-2 py-1">
                                                        <div>
                                                            @if ($cs->profile_karyawan)
                                                                <img src="{{ asset('storage/profile_karyawan/' . $cs->profile_karyawan) }}" class="inline-flex items-center justify-center mr-4 h-9 w-9 rounded-xl" alt="user1" />
                                                            @else
                                                                <img src="{{ asset('images/profile.png') }}" class="inline-flex items-center justify-center mr-4 h-9 w-9 rounded-xl" alt="user1" />
                                                            @endif
                                                        </div>
                                                        <div class="flex flex-col justify-center">
                                                            <h6 class="mb-0 text-sm leading-normal">{{ $cs->nama_lengkap }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-2 align-middle bg-transparent border-b border-gray-200 whitespace-nowrap">
                                                    <h6 class="mb-0 text-sm leading-normal">{{ $bulan }}</h6>
                                                </td>
                                                <td class="p-2 align-middle bg-transparent border-b border-gray-200 whitespace-nowrap">
                                                    <h6 class="mb-0 text-sm leading-normal">{{ number_format($totalBagiHasil, 0) }}</h6>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="emptyMessage" class="text-center text-red-500 font-semibold mt-4" style="display: none;">
                            Data di bulan yang Anda pilih tidak tersedia.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <!-- Header -->
                <div class="p-6 pb-0 mb-0 bg-gray-100 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center z-20">
                    <h6 class="font-bold text-slate-700">Data Target per CS</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0">
                        <!-- Kontainer dengan scrollbar -->
                        <div id="scrollableContainer" class="bg-white rounded-lg border border-gray-300 overflow-y-auto" style="max-height: 24rem; display: flex; flex-direction: column; padding: 0; margin: 0;">
                            <table class="items-center w-full mb-0 align-top border-collapse text-slate-500" id="karyawanTable" style="margin-bottom: 0;">
                                <thead class="align-bottom sticky top-0 z-10 bg-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle text-xxs tracking-none text-slate-700">Nama</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle text-xxs tracking-none text-slate-700">Bulan / Tahun</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle text-xxs tracking-none text-slate-700">Total CR New</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle text-xxs tracking-none text-slate-700">Target</th>
                                    </tr>
                                </thead>
                                <tbody id="karyawanBody">
                                    @foreach($karyawanWithTargetCr as $data)
                                        <tr>
                                            <td class="p-2 align-middle bg-transparent border-b border-gray-200 whitespace-nowrap">
                                                <div class="flex px-2 py-1">
                                                    <!-- Gambar Profile Karyawan -->
                                                    <div>
                                                        {{-- <img src="{{ asset('images/profile.png') }}" class="inline-flex items-center justify-center mr-4 h-9 w-9 rounded-xl" alt="user1" /> --}}
                                                        @if ($data->profile_karyawan)
                                                            <img src="{{ asset('storage/profile_karyawan/' . $data->profile_karyawan) }}" class="inline-flex items-center justify-center mr-4 h-9 w-9 rounded-xl" alt="user1" />
                                                        @else
                                                            <img src="{{ asset('images/profile.png') }}" class="inline-flex items-center justify-center mr-4 h-9 w-9 rounded-xl" alt="user1" />
                                                        @endif
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <!-- Menampilkan Nama Karyawan -->
                                                        <h6 class="mb-0 text-sm leading-normal">{{ $data->nama_lengkap }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b border-gray-200 whitespace-nowrap">
                                                <!-- Menampilkan Bulan/Tahun -->
                                                <h6 class="mb-0 text-sm leading-normal">
                                                    @foreach($data->cr_per_bulan as $bulan => $total)
                                                        {{ $bulan }} <br>
                                                    @endforeach
                                                </h6>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b border-gray-200 whitespace-nowrap">
                                                <!-- Menampilkan Total CR New -->
                                                <h6 class="mb-0 text-sm leading-normal">
                                                    @foreach($data->cr_per_bulan as $bulan => $info)
                                                        {{ number_format($info['total'], 0, ',', '.') }} <br>
                                                    @endforeach
                                                </h6>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b border-gray-200 whitespace-nowrap">
                                                @foreach ($data->cr_per_bulan as $month => $data)
                                                    <div style="color: {{ $data['color'] }}">
                                                        {{ $data['status'] }}
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="emptyMessage" class="text-center text-red-500 font-semibold mt-4" style="display: none;">
                            Data di bulan yang Anda pilih tidak tersedia.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var chart = null; // Initialize the chart outside the function to be reused

    function filterTable() {
        var csId = document.getElementById("jabatan").value;
        var bulan = document.getElementById("bulan").value;
        var tahun = document.getElementById("tahun").value;

        var rows = document.querySelectorAll('#karyawanBody tr');
        var visibleRowCount = 0;

        var labels = [];
        var data = [];

        // Array nama bulan
        var namaBulan = [
            "Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
            "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
        ];

        // Dapatkan teks nama CS dari dropdown
        var csDropdown = document.getElementById("jabatan");
        var selectedCSName = csDropdown.options[csDropdown.selectedIndex].text;
        var selectedText = "";

        // Tampilkan nama CS di elemen #selectedCS
        var selectedCSElement = document.getElementById('selectedCS');
        if (csId === "") {
            selectedCSElement.innerText = ""; // Kosongkan jika tidak ada CS yang dipilih
        } else {
            selectedCSElement.innerText = `Customer Service: ${selectedCSName}`; // Tampilkan nama CS
        }

        // Tampilkan bulandi elemen #selectedMonth
            // var selectedMonthElement = document.getElementById('selectedMonth');
            // if (bulan === "") {
            //     selectedMonthElement.innerText = ""; // Kosongkan jika tidak ada bulan yang dipilih
            // } else {
            //     var bulanNama = bulan ? namaBulan[bulan - 1] : "Semua Bulan";
            //     selectedMonthElement.innerText = `Bulan : ${bulanNama}`; // Tampilkan bulan
            // }

        // Tampilkan tahun di elemen #selectedYear
            // var selectedYearElement = document.getElementById('selectedYear');
            // if (tahun === "") {
            //     selectedYearElement.innerText = ""; // Kosongkan jika tidak ada tahun yang dipilih
            // } else {
            //     var tahunNama = tahun || "Semua Tahun";
            //     selectedYearElement.innerText = `Tahun : ${tahunNama}`; // Tampilkan tahun
            // }

        rows.forEach(function(row) {
            var rowCsId = row.getAttribute("data-cs");
            var rowBulan = row.getAttribute("data-bulan");
            var rowTahun = row.getAttribute("data-tahun");

            // Filter rows based on selected CS, bulan, and tahun
            if ((csId === "" || rowCsId == csId) &&
                (bulan === "" || rowBulan == bulan) &&
                (tahun === "" || rowTahun == tahun)) {

                row.style.display = "";
                visibleRowCount++;

                // Konversi angka bulan ke nama bulan
                var bulanNama = namaBulan[rowBulan - 1];
                labels.push(bulanNama + " " + rowTahun);
                data.push(parseFloat(row.cells[2].innerText.trim()));
            } else {
                row.style.display = "none";
            }
        });

        // Display message if no data is available
        document.getElementById('emptyMessage').style.display = (visibleRowCount === 0) ? 'block' : 'none';

        // Update the chart with filtered data
        if (chart) {
            chart.destroy();  // Destroy the previous chart instance
        }

        if (visibleRowCount > 0) {
            var ctx = document.getElementById('barChart').getContext('2d');
            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Bagi Hasil',
                        data: data,
                        backgroundColor: '#42A5F5',
                        borderColor: '#1E88E5',
                        borderWidth: 1,
                        barThickness: 65
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        } else {
            // Update chart with "no data" message
            var ctx = document.getElementById('barChart').getContext('2d');
            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Bagi Hasil',
                        data: [],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        barThickness: 65
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        },
                        title: {
                            display: true,
                            text: 'Data bulan yang Anda pilih tidak tersedia.',
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            color: 'red'
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }

    // Call filterTable on page load to display all data initially
    document.addEventListener('DOMContentLoaded', function() {
        filterTable();
    });
</script>

@endsection
