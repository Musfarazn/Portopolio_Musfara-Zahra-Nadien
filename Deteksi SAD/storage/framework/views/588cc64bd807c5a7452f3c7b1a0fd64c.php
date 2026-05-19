<?php $__env->startSection('title','Dashboard Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold mb-4">Admin Dashboard</h2>

  <!-- Grid Card -->
  <div class="grid grid-cols-3 gap-4 mb-6">
    
    <!-- Card Jumlah Pengguna -->
    <div class="bg-blue-500 text-white p-6 rounded shadow">
      <h3 class="text-lg font-bold">Jumlah Pengguna</h3>
      <p class="text-3xl font-bold mt-2"><?php echo e($totalUsers); ?></p>
    </div>

    <!-- Card Total Gejala (tanpa link) -->
    <div class="bg-green-500 text-white p-6 rounded shadow">
      <h3 class="text-lg font-bold">Total Gejala</h3>
      <p class="text-3xl font-bold mt-2"><?php echo e($totalGejala); ?></p>
    </div>

    <!-- Card Total Riwayat Pengguna (tanpa link) -->
    <div class="bg-yellow-500 text-white p-6 rounded shadow">
      <h3 class="text-lg font-bold">Total Riwayat</h3>
      <p class="text-3xl font-bold mt-2"><?php echo e($totalRiwayat); ?></p>
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
        labels: <?php echo json_encode($chartLabels, 15, 512) ?>,
        datasets: [{
            label: 'Jumlah Diagnosa',
            data: <?php echo json_encode($chartData, 15, 512) ?>,
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>