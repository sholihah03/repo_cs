@extends('rekap.includes.master')
@section('title', 'Grafik Transaksi Per Bulan')
@section('NeracaActive','shadow-soft-xl',)
@section('content')

<div class="container mx-auto p-6">
    <h2 class="text-xl font-semibold mb-4">Grafik Transaksi Per Bulan</h2>
    <canvas id="transaksiChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('transaksiChart').getContext('2d');
    var transaksiData = @json($transaksiPerBulan);

    // Format label agar menampilkan bulan dan tahun (misalnya, "Jan 2024")
    var labels = transaksiData.map(function(item) {
        return new Date(item.year, item.month - 1).toLocaleString('id-ID', {
            month: 'short',
            year: 'numeric'
        });
    });

    var debitData = transaksiData.map(function(item) {
        return item.total_debit;
    });

    var kreditData = transaksiData.map(function(item) {
        return item.total_kredit;
    });

    var transaksiChart = new Chart(ctx, {
        type: 'bar', // Ubah tipe menjadi 'bar' untuk grafik batang
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Debit',
                    data: debitData,
                    backgroundColor: '#3B82F6',
                    borderColor: '#3B82F6',
                    borderWidth: 1
                },
                {
                    label: 'Kredit',
                    data: kreditData,
                    backgroundColor: '#EF4444',
                    borderColor: '#EF4444',
                    borderWidth: 1
                }
            ]
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
                            // Format angka untuk menghapus desimal
                            return 'Total: Rp ' + tooltipItem.raw.toLocaleString('id-ID', {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            });
                        }
                    }
                }
            },
            scales: {
                x: {
                    stacked: true, // Untuk menampilkan grafik secara berurutan di sumbu X
                },
                y: {
                    stacked: true, // Jika ingin menumpuk grafik debit dan kredit
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID', {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            });
                        }
                    }
                }
            }
        }
    });
</script>

@endsection