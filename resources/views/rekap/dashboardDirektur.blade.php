@extends('rekap.includes.sidenav')
@section('title', 'Dashboard Rekap')
@section('content')

<!-- Content Data -->
<div class="flex flex-wrap lg:flex-nowrap px-6 py-6 justify-end items-center gap-4">
    <!-- Card Jumlah Manager -->
    <div class="border p-6 rounded-xl shadow-sm mr-2 bg-white lg:order-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" id="managerCard">
        <label for="manager" class="mr-2 text-md font-semibold text-slate-600">Jumlah Manager: {{ $jumlahManager }}</label>
    </div>

    <!-- Card Jumlah Karyawan yang dapat diklik -->
    <div class="border p-6 rounded-xl shadow-sm mr-2 bg-white lg:order-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" id="karyawanCard">
        <label for="karyawan" class="mr-2 text-md font-semibold text-slate-600">Jumlah Karyawan: {{ $jumlahKaryawan }}</label>
    </div>

    <!-- Card Jumlah Customer Service -->
    <div class="border p-6 rounded-xl shadow-sm mr-2 bg-white lg:order-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" id="csCard">
        <label for="cs" class="mr-2 text-md font-semibold text-slate-600">Jumlah Customer Service: {{ $jumlahCS }}</label>
    </div>

    <!-- Card Jumlah Advertiser -->
    <div class="border p-6 rounded-xl shadow-sm mr-2 bg-white lg:order-2 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" id="advertiserCard">
        <label for="advertiser" class="mr-2 text-md font-semibold text-slate-600">Jumlah Advertiser: {{ $jumlahAdvertiser }}</label>
    </div>
</div>

<!-- Dropdown Tahun -->
<div class="flex flex-wrap lg:flex-nowrap px-6 py-6 justify-end items-center gap-4" id="tahunGrafik">
    <div class="border p-4 rounded-xl shadow-sm mr-2 bg-white lg:order-2">
        <label for="tahun" class="mr-2 text-md font-semibold text-slate-600">Tahun:</label>
        <select id="tahun"  name="tahun" class="border rounded-md text-sm p-1">
            <option value="">Pilih Tahun</option>
            @foreach($availableYears as $year)
                <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </select>
    </div>
</div>

<!-- Display Grafik or Data Karyawan -->
<div class="w-full px-6 py-6 mx-auto -mt-2">
    <div class="flex flex-wrap -mx-3" id="graphContainer">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-2 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                    <h6>Diagram Bagi Hasil per Tahun</h6>
                </div>
                <div class="flex justify-center items-center text-sm font-semibold">
                    <span>Tahun: </span>
                    <span id="selectedYear" class="ml-2 font-semibold">{{ $tahun }}</span>
                </div>
                <div class="p-6">
                    <canvas id="barChart" width="300" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Display manager Data (hidden by default) -->
<div class="w-full px-6 py-6 mx-auto -mt-2" id="managerDataContainer" style="display:none;">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-2 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                    <h6>Data Manager</h6>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table id="managerTable" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b">Nama</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b">Email</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b">No Telepon</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b">Status</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b">Mulai Bekerja</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b">Akhir Bekerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data Karyawan akan diisi di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Display Karyawan Data (hidden by default) -->
<div class="w-full px-6 py-6 mx-auto -mt-2" id="karyawanDataContainer" style="display:none;">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-2 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                    <h6>Data Karyawan</h6>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table id="karyawanTable" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b border-gray-200">Nama</th>
                                    <th class="px-4 py-2 border-b border-gray-200">Email</th>
                                    <th class="px-4 py-2 border-b border-gray-200">No Telepon</th>
                                    <th class="px-4 py-2 border-b border-gray-200">Status</th>
                                    <th class="px-4 py-2 border-b border-gray-200">Mulai Bekerja</th>
                                    <th class="px-4 py-2 border-b border-gray-200">Akhir Bekerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data Karyawan akan diisi di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Display Customer Service Data (hidden by default) -->
<div class="w-full px-6 py-6 mx-auto -mt-2" id="csDataContainer" style="display:none;">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-2 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                    <h6>Data Customer Service</h6>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table id="csTable" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b border-gray-200">Nama</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b border-gray-200">Email</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b border-gray-200">No Telepon</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b border-gray-200">Status</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b border-gray-200">Mulai Bekerja</th>
                                    <th class="px-4 py-2 border-b border-gray-200 border-b border-gray-200">Akhir Bekerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data Karyawan akan diisi di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Display Advertiser Data (hidden by default) -->
<div class="w-full px-6 py-6 mx-auto -mt-2" id="advertiserDataContainer" style="display:none;">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-2 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                    <h6>Data Advertiser</h6>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table id="advertiserTable" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b border-gray-200">Nama</th>
                                    <th class="px-4 py-2 border-b border-gray-200">Email</th>
                                    <th class="px-4 py-2 border-b border-gray-200">No Telepon</th>
                                    <th class="px-4 py-2 border-b border-gray-200">Status</th>
                                    <th class="px-4 py-2 border-b border-gray-200">Mulai Bekerja</th>
                                    <th class="px-4 py-2 border-b border-gray-200">Akhir Bekerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data Karyawan akan diisi di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Menambahkan event listener untuk managerCard
    $('#managerCard').on('click', function() {
        var graphContainer = $('#graphContainer');
        var managerDataContainer = $('#managerDataContainer');
        var karyawanDataContainer = $('#karyawanDataContainer'); // Menambahkan container untuk data Karyawan
        var csDataContainer = $('#csDataContainer');
        var advertiserDataContainer = $('#advertiserDataContainer');
        var tahunGrafikDropdown = $('#tahunGrafik');

        // Toggle tampilan
        graphContainer.toggle();
        managerDataContainer.toggle();
        // Menyembunyikan card tahun
        tahunGrafikDropdown.toggle();

        // Mengambil dan menampilkan data Manager
        if (managerDataContainer.is(':visible')) {
            // Ambil data manager
            $.ajax({
                url: '{{ route('getManagerData') }}',  // Ganti dengan route yang sesuai untuk mengambil data Manager
                method: 'GET',
                success: function(response) {
                    var managerTable = $('#managerTable tbody');
                    managerTable.empty(); // Clear table sebelum menambah data baru

                    response.manager.forEach(function(manager) {
                        // Cek jika data kosong
                        var namaLengkap = manager.nama_lengkap || 'Belum ada Nama';
                        var username = manager.username || 'Belum ada Username';
                        var email = manager.email || 'Belum ada Email';
                        var noTelepon = manager.no_telepon || 'Belum ada No Telepon';
                        var profileImageUrl = manager.profile_karyawan
                            ? '{{ Storage::url("profile_karyawan/") }}' + manager.profile_karyawan
                            : '{{ asset("images/profile.png") }}'; // Gambar default jika tidak ada profil
                        var status = manager.status || 'Belum ada Status';
                        var mulaiBekerja = manager.mulai_bekerja || 'Belum ada Mulai Bekerja';
                        var akhirBekerja = manager.akhir_bekerja || 'Belum ada Akhir Bekerja';

                        managerTable.append(`
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div>
                                            <img src="${profileImageUrl}" alt="Profile Image" class="h-12 w-12 rounded-full mr-4">
                                        </div>
                                        <div>
                                            <h6 class="font-medium text-sm">${namaLengkap}</h6>
                                            <p class="text-xs text-slate-400">${username}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200">${email}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${noTelepon}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${status}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${mulaiBekerja}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${akhirBekerja}</td>
                            </tr>
                        `);
                    });
                }
            });
        }
    });


        // Toggle antara data karyawan dan grafik
    $('#karyawanCard').on('click', function() {
        var graphContainer = $('#graphContainer');
        var karyawanDataContainer = $('#karyawanDataContainer');
        var managerDataContainer = $('#managerDataContainer'); // Menambahkan container untuk data Manager
        var csDataContainer = $('#csDataContainer');
        var advertiserDataContainer = $('#advertiserDataContainer');
        var tahunGrafikDropdown = $('#tahunGrafik');

        // Toggle tampilan
        graphContainer.toggle();
        karyawanDataContainer.toggle();
        // Menyembunyikan card tahun
        tahunGrafikDropdown.toggle();

        // Mengambil dan menampilkan data Karyawan
        if (karyawanDataContainer.is(':visible')) {
            // Ambil data karyawan
            $.ajax({
                url: '{{ route('getKaryawanData') }}',  // Ganti dengan route yang sesuai
                method: 'GET',
                success: function(response) {
                    var karyawanTable = $('#karyawanTable tbody');
                    karyawanTable.empty(); // Clear table sebelum menambah data baru

                    response.karyawan.forEach(function(karyawan) {
                        // Cek jika data kosong
                        var namaLengkap = karyawan.nama_lengkap || 'Belum ada Nama';
                        var username = karyawan.username || 'Belum ada Username'; ;
                        var email = karyawan.email || 'Belum ada Email';
                        var noTelepon = karyawan.no_telepon || 'Belum ada No Telep';
                        var profileImageUrl = karyawan.profile_karyawan
                            ? '{{ Storage::url("profile_karyawan/") }}' + karyawan.profile_karyawan
                            : '{{ asset("images/profile.png") }}'; // Gambar default jika tidak ada profil
                        var status = karyawan.status || 'Belum ada Status';
                        var mulaiBekerja = karyawan.mulai_bekerja || 'Belum ada Mulai Bekerja';
                        var akhirBekerja = karyawan.akhir_bekerja || 'Belum ada Akhir Bekerja';
                        karyawanTable.append(`
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div>
                                            <img src="${profileImageUrl}" alt="Profile Image" class="h-12 w-12 rounded-full mr-4">
                                        </div>
                                        <div>
                                            <h6 class="font-medium text-sm">${namaLengkap}</h6>
                                            <p class="text-xs text-slate-400">${username}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200">${email}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${noTelepon}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${status}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${mulaiBekerja}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${akhirBekerja}</td>
                            </tr>
                        `);
                    });
                }
            });
        }
    });


    $('#csCard').on('click', function() {
        var graphContainer = $('#graphContainer');
        var csDataContainer = $('#csDataContainer');
        var managerDataContainer = $('#managerDataContainer');
        var karyawanDataContainer = $('#karyawanDataContainer'); // Menambahkan container untuk data Karyawan
        var advertiserDataContainer = $('#advertiserDataContainer');
        var tahunGrafikDropdown = $('#tahunGrafik');

        // Toggle tampilan
        graphContainer.toggle();
        csDataContainer.toggle();
        // Menyembunyikan card tahun
        tahunGrafikDropdown.toggle();

        // Mengambil dan menampilkan data Manager
        if (csDataContainer.is(':visible')) {
            // Ambil data manager
            $.ajax({
                url: '{{ route('getCsData') }}',
                method: 'GET',
                success: function(response) {
                    var csTable = $('#csTable tbody');
                    csTable.empty(); // Clear table sebelum menambah data baru

                    response.cs.forEach(function(cs) {
                        // Cek jika data kosong
                        var namaLengkap = cs.nama_lengkap || 'Belum ada Nama';
                        var username = cs.username || 'Belum ada Username';
                        var email = cs.email || 'Belum ada Email';
                        var noTelepon = cs.no_telepon || 'Belum ada No Telepon';
                        var profileImageUrl = cs.profile_karyawan
                            ? '{{ Storage::url("profile_karyawan/") }}' + cs.profile_karyawan
                            : '{{ asset("images/profile.png") }}'; // Gambar default jika tidak ada profil
                        var status = cs.status || 'Belum ada Status';
                        var mulaiBekerja = cs.mulai_bekerja || 'Belum ada Mulai bekerja';
                        var akhirBekerja = cs.akhir_bekerja || 'Belum ada Akhir bekerja';

                        csTable.append(`
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div>
                                            <img src="${profileImageUrl}" alt="Profile Image" class="h-12 w-12 rounded-full mr-4">
                                        </div>
                                        <div>
                                            <h6 class="font-medium text-sm">${namaLengkap}</h6>
                                            <p class="text-xs text-slate-400">${username}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200">${email}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${noTelepon}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${status}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${mulaiBekerja}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${akhirBekerja}</td>
                            </tr>
                        `);
                    });
                }
            });
        }
    });


    $('#advertiserCard').on('click', function() {
        var graphContainer = $('#graphContainer');
        var csDataContainer = $('#csDataContainer');
        var managerDataContainer = $('#managerDataContainer');
        var karyawanDataContainer = $('#karyawanDataContainer'); // Menambahkan container untuk data Karyawan
        var advertiserDataContainer = $('#advertiserDataContainer');
        var tahunGrafikDropdown = $('#tahunGrafik');

        // Toggle tampilan
        graphContainer.toggle();
        advertiserDataContainer.toggle();
        // Menyembunyikan card tahun
        tahunGrafikDropdown.toggle();

        // Mengambil dan menampilkan data Manager
        if (advertiserDataContainer.is(':visible')) {
            // Ambil data manager
            $.ajax({
                url: '{{ route('getAdvertiserData') }}',  // Ganti dengan route yang sesuai untuk mengambil data Manager
                method: 'GET',
                success: function(response) {
                    var advertiserTable = $('#advertiserTable tbody');
                    advertiserTable.empty(); // Clear table sebelum menambah data baru

                    response.advertiser.forEach(function(advertiser) {
                        // Cek jika data kosong
                        var namaLengkap = advertiser.nama_lengkap || 'Belum ada Nama';
                        var username = advertiser.username || 'Belum ada Username';
                        var email = advertiser.email || 'Belum ada Email';
                        var noTelepon = advertiser.no_telepon || 'Belum ada No Telepon';
                        var profileImageUrl = advertiser.profile_karyawan
                            ? '{{ Storage::url("profile_karyawan/") }}' + advertiser.profile_karyawan
                            : '{{ asset("images/profile.png") }}'; // Gambar default jika tidak ada profil
                        var status = advertiser.status || 'Belum ada Status';
                        var mulaiBekerja = advertiser.mulai_bekerja || 'Belum ada Mulai Bekerja';
                        var akhirBekerja = advertiser.akhir_bekerja || 'Belum ada Akhir Bekerja';
                        advertiserTable.append(`
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div>
                                            <img src="${profileImageUrl}" alt="Profile Image" class="h-12 w-12 rounded-full mr-4">
                                        </div>
                                        <div>
                                            <h6 class="font-medium text-sm">${namaLengkap}</h6>
                                            <p class="text-xs text-slate-400">${username}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200">${email}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${noTelepon}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${status}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${mulaiBekerja}</td>
                                <td class="px-4 py-2 border-b border-gray-200">${akhirBekerja}</td>
                            </tr>
                        `);
                    });
                }
            });
        }
    });


    $('#tahun').on('change', function() {
        const tahun = $(this).val();

        if (tahun) {
            $.ajax({
                url: '{{ route('dashboardDirektur') }}',  // Replace with the correct route for AJAX
                method: 'GET',
                data: {
                    tahun: tahun
                },
                success: function(response) {
                    // Update chart data with the new data
                    const chartData = response.chartData;
                    const labels = Object.keys(chartData);
                    const data = Object.values(chartData);

                    // Update the chart
                    barChart.data.labels = labels;
                    barChart.data.datasets[0].data = data;
                    barChart.update();

                    $('#selectedYear').text(tahun);
                }
            });
        }
    });


    // Inisialisasi grafik
    const chartData = @json($chartData);
    const labels = Object.keys(chartData);
    const data = Object.values(chartData);

    const ctx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Bagi Hasil',
                data: data,
                backgroundColor: '#42A5F5',
                borderColor: '#1E88E5',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
