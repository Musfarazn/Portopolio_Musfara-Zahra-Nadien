<?php $__env->startSection('title','Daftar Gejala'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold mb-4">Daftar Gejala</h2>

  
  <?php if(session('success')): ?>
    <div class="mb-3 p-2 bg-green-100 rounded"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  
  <form method="POST" action="<?php echo e(route('admin.store_gejala')); ?>" class="mb-6 flex flex-wrap gap-2 items-center">
      <?php echo csrf_field(); ?>

      
      <select name="kode" class="p-2 border rounded" required>
          <option value="">-- Pilih Kode --</option>
          <option value="G01">G01</option>
          <option value="G02">G02</option>
          <option value="G03">G03</option>
          <option value="G04">G04</option>
          <option value="G05">G05</option>
          <option value="G06">G06</option>
          <option value="G07">G07</option>
      </select>

      
      <input type="text" name="nama_gejala" placeholder="Pertanyaan gejala" class="w-1/3 p-2 border rounded" required>

      <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">Tambah</button>
  </form>

  
  <table class="w-full border text-sm">
    <thead>
      <tr class="bg-gray-200 text-left">
        <th class="p-2 border w-12 text-center">No.</th>
        <th class="p-2 border">Kode Gejala</th>
        <th class="p-2 border">Pertanyaan</th>
        <th class="p-2 border w-32 text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $gejalas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr class="hover:bg-gray-50">
        <td class="p-2 border text-center"><?php echo e($index + 1); ?></td>
        <td class="p-2 border"><?php echo e($g->kode); ?></td>
        <td class="p-2 border"><?php echo e($g->nama_gejala); ?></td>
        <td class="p-2 border text-center flex justify-center gap-1">
          <a href="<?php echo e(route('admin.edit_gejala', $g->id)); ?>" 
             class="bg-blue-500 text-white px-2 py-1 rounded text-xs hover:bg-blue-600">
             Edit
          </a>
          <form action="<?php echo e(route('admin.delete_gejala', $g->id)); ?>" 
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus gejala ini?')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" 
                    class="bg-red-500 text-white px-2 py-1 rounded text-xs hover:bg-red-600">
              Hapus
            </button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr>
        <td colspan="4" class="p-2 text-center">Belum ada gejala</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/admin/daftar_gejala.blade.php ENDPATH**/ ?>