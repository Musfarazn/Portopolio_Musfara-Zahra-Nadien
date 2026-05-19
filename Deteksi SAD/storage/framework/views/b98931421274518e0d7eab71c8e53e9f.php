
<?php $__env->startSection('title','Hasil Diagnosa'); ?>

<?php $__env->startSection('content'); ?>

<div class="bg-white p-6 rounded-lg shadow mt-4">
  <h2 class="text-xl font-bold mb-2">Hasil Diagnosa</h2>
  <p class="mb-2"><strong>Hasil:</strong> <?php echo e($diagnosa->hasil); ?></p>
  <p class="mb-4 text-gray-600"><?php echo e($diagnosa->keterangan); ?></p>

  
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
    
    
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
      <h3 class="font-bold text-lg mb-2 text-blue-700">🧠 Saran </h3>
      <p class="text-gray-700 text-justify leading-relaxed">
        <?php echo e($saran_otomatis); ?>

      </p>
    </div>

    
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
      <h3 class="font-bold text-lg mb-2 text-green-700">🤖 Saran by AI</h3>
      <p class="text-gray-700 text-justify leading-relaxed">
        <?php echo e($saran_ai); ?>

      </p>
    </div>

  </div>
</div>


<div class="mb-6 p-4 bg-gray-100 rounded mt-6">
  <h3 class="font-semibold mb-2">Form Jawaban</h3>
  <table class="w-full border border-gray-200 text-sm">
    <thead>
      <tr class="bg-gray-200">
        <th class="p-2 border text-center">No.</th>
        <th class="p-2 border text-left">Gejala</th>
        <th class="p-2 border text-center">Skala</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $diagnosa->jawaban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td class="p-2 border text-center"><?php echo e($index+1); ?></td>
        <td class="p-2 border"><?php echo e($j->gejala->nama_gejala); ?></td>
        <td class="p-2 border text-center">
          <?php echo e($j->nilai); ?>

        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/user/hasil.blade.php ENDPATH**/ ?>