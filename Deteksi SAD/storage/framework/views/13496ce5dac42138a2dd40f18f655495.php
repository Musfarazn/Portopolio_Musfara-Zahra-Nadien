
<?php $__env->startSection('title','Edit Gejala'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold mb-4">Edit Gejala</h2>

  <form method="POST" action="<?php echo e(route('admin.update_gejala', $gejala->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

     <div class="mb-3">
      <label class="block mb-1">Kode Gejala</label>
      <input type="text" name="kode" value="<?php echo e(old('nama_gejala', $gejala->kode)); ?>"
             class="w-full p-2 border rounded">
    </div>

    <div class="mb-3">
      <label class="block mb-1">Nama Gejala</label>
      <input type="text" name="nama_gejala" value="<?php echo e(old('nama_gejala', $gejala->nama_gejala)); ?>"
             class="w-full p-2 border rounded">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    <a href="<?php echo e(route('admin.gejala')); ?>" class="ml-2 text-gray-600">Batal</a>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/admin/edit_gejala.blade.php ENDPATH**/ ?>