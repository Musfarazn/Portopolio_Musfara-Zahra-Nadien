<?php $__env->startSection('title', 'Riwayat Diagnosa'); ?>
<?php $__env->startSection('content'); ?>
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Riwayat Diagnosa</h2>
    <table id="riwayatTable" class="w-full border">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-2 border text-center">Tanggal</th>
          <th class="p-2 border text-center">Hasil</th>
          <th class="p-2 border text-center">Keterangan</th>
          <th class="p-2 border text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="p-2 border text-center"><?php echo e($r->created_at->format('d-m-Y H:i')); ?></td>
            <td class="p-2 border text-center"><?php echo e($r->hasil); ?></td>
            <td class="p-2 border"><?php echo e($r->keterangan); ?></td>
            <td class="p-2 border text-center flex justify-center gap-2">
              <a href="<?php echo e(route('diagnosa.hasil', $r->id)); ?>" 
                 class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                Lihat Hasil
              </a>
              <form action="<?php echo e(route('riwayat.destroy', $r->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat ini?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="4" class="p-2 text-center">Belum ada riwayat</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/user/riwayat.blade.php ENDPATH**/ ?>