

<?php $__env->startSection('title','Import Rules'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Import Rules dari File</h2>

    
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    
    
    
    <form action="<?php echo e(route('admin.rules.import')); ?>" method="POST" enctype="multipart/form-data" class="mb-8">
        <?php echo csrf_field(); ?>
        <label class="font-semibold">Pilih File Excel / CSV</label>
        <input type="file" name="file" class="border p-2 mb-3 w-full rounded" required>

        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded">
            Upload & Simpan
        </button>
    </form>

    <hr class="my-6">

    
    
    
    <h3 class="text-xl font-bold mb-4">Tambah Rule Secara Manual</h3>

<form action="<?php echo e(route('admin.rules.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="grid grid-cols-4 gap-4">

        
        <?php $__currentLoopData = ['G01','G02','G03','G04','G05','G06','G07']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <label class="font-semibold"><?php echo e($g); ?></label>
            <select name="<?php echo e($g); ?>" class="border p-2 w-full rounded" required>
                <option value="">-- Pilih --</option>
                <option value="Normal">Normal</option>
                <option value="Ringan">Ringan</option>
                <option value="Sedang">Sedang</option>
                <option value="Berat">Berat</option>
            </select>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <div>
            <label class="font-semibold">Hasil</label>
            <select name="hasil" class="border p-2 w-full rounded" required>
                <option value="">-- Pilih Output --</option>
                <option value="Normal">Normal</option>
                <option value="Ringan">Ringan</option>
                <option value="Sedang">Sedang</option>
                <option value="Berat">Berat</option>
            </select>
        </div>
    </div>

    <button type="submit"
        class="mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
        Simpan Rule
    </button>
</form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/admin/rules/create.blade.php ENDPATH**/ ?>