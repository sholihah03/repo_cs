@extends('rekap.includes.master')
@section('title', 'Grafik Transaksi Per Bulan')
@include('rekap.includes.sidenav')
@section('content')

<div class="container mx-auto p-6">
    <h2 class="text-xl font-semibold mb-4">Grafik Transaksi Per Bulan</h2>
    
    <!-- Dropdown Tahun -->
    <div class="mb-4">
        <label for="tahunSelect" class="mr-2">Pilih Tahun:</label>
        <select id="tahunSelect" class="border border-gray-300 rounded px-2 py-1">
            <!-- Dropdown akan diisi oleh JavaScript -->
        </select>
    </div>

    <canvas id="transaksiChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('transaksiChart').getContext('2d');
    var transaksiData = @json($transaksiPerBulan);

    // Mendapatkan tahun unik dari transaksiData
    var uniqueYears = [...new Set(transaksiData.map(item => item.year))];
    
    // Mengisi dropdown tahun
    var tahunSelect = document.getElementById('tahunSelect');
    uniqueYears.forEach(function(year) {
        var option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        tahunSelect.appendChild(option);
    });

    // Fungsi untuk memfilter data berdasarkan tahun
    function updateChartByYear(selectedYear) {
        var filteredData = transaksiData.filter(function(item) {
            return item.year == selectedYear;
        });

        // Urutkan data per bulan
        filteredData.sort(function(a, b) {
            return new Date(a.year, a.month - 1) - new Date(b.year, b.month - 1);
        });

        // Perbarui label dan data grafik
        transaksiChart.data.labels = filteredData.map(function(item) {
            return String(item.month).padStart(2, '0') + '-' + item.year;
        });
        transaksiChart.data.datasets[0].data = filteredData.map(function(item) {
            return item.total;
        });

        transaksiChart.update();
    }

    // Event listener untuk dropdown tahun
    tahunSelect.addEventListener('change', function() {
        updateChartByYear(this.value);
    });

    // Inisialisasi Chart
    var transaksiChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],  // Label akan diisi oleh updateChartByYear
            datasets: [{
                label: 'Jumlah Transaksi',
                data: [],
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return 'Total: Rp ' + tooltipItem.raw.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Set default tahun pada dropdown dan perbarui grafik pertama kali
    if (uniqueYears.length > 0) {
        tahunSelect.value = uniqueYears[0];
        updateChartByYear(uniqueYears[0]);
    }
</script>
@endsection
