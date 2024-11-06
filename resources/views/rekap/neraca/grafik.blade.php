@extends('rekap.includes.master')
@section('title', 'Grafik Transaksi Per Bulan')
@include('rekap.includes.sidenav')
@section('content')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-xl font-semibold mb-4">Grafik Transaksi Per Bulan</h2>
    <canvas id="transaksiChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('transaksiChart').getContext('2d');
    var transaksiData = @json($transaksiPerBulan);

    var labels = transaksiData.map(function(item) {
        return item.year + '-' + String(item.month).padStart(2, '0');
    });

    var data = transaksiData.map(function(item) {
        return item.total;
    });

    var transaksiChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Transaksi',
                data: data,
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
</script>
@endsection
