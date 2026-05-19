@extends('layouts.app')
@section('title','Dashboard Admin')
@section('content')
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold mb-4">Admin Dashboard</h2>

  <!-- Grid Card -->
  <div class="grid grid-cols-3 gap-4 mb-6">
    
    <!-- Card Jumlah Pengguna -->
    <div class="bg-blue-500 text-white p-6 rounded shadow">
      <h3 class="text-lg font-bold">Jumlah Pengguna</h3>
      <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
    </div>

    <!-- Card Total Gejala (tanpa link) -->
    <div class="bg-green-500 text-white p-6 rounded shadow">
      <h3 class="text-lg font-bold">Total Gejala</h3>
      <p class="text-3xl font-bold mt-2">{{ $totalGejala }}</p>
    </div>

    <!-- Card Total Riwayat Pengguna (tanpa link) -->
    <div class="bg-yellow-500 text-white p-6 rounded shadow">
      <h3 class="text-lg font-bold">Total Riwayat</h3>
      <p class="text-3xl font-bold mt-2">{{ $totalRiwayat }}</p>
    </div>
  </div>

  <!-- Line Chart Diagnosa -->
  <div class="bg-white p-6 rounded shadow w-full md:w-1/2 mx-auto">
    <h3 class="text-lg font-bold mb-4 text-center">Distribusi Diagnosa</h3>
    <canvas id="diagnosaChart"></canvas>
  </div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('diagnosaChart').getContext('2d');
const diagnosaChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            label: 'Jumlah Diagnosa',
            data: @json($chartData),
            fill: false,
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            tension: 0.3,
            pointBackgroundColor: 'rgba(54, 162, 235, 1)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>
@endsection
