

<?php $__env->startSection('title', 'Daftar Rules DASS Anxiety'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Daftar Rules DASS Anxiety</h2>

    
    <div class="flex items-center justify-between mb-4">
        <a href="<?php echo e(route('admin.rules.create')); ?>" 
           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
           Tambah Rule
        </a>

        
        <button id="toggleDeleteMode" 
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
            Hapus
        </button>
    </div>

    
    <form id="bulkDeleteForm" 
          action="<?php echo e(route('admin.rules.destroyMultiple')); ?>" 
          method="POST" 
          onsubmit="return confirm('Yakin ingin menghapus data terpilih?')">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>

        <div class="overflow-x-auto">
            <table class="w-full border text-sm" id="rulesTable">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border text-center w-12 delete-checkbox hidden">
                            <input type="checkbox" id="selectAll" class="cursor-pointer">
                        </th>
                        <th class="p-2 border text-center">G01</th>
                        <th class="p-2 border text-center">G02</th>
                        <th class="p-2 border text-center">G03</th>
                        <th class="p-2 border text-center">G04</th>
                        <th class="p-2 border text-center">G05</th>
                        <th class="p-2 border text-center">G06</th>
                        <th class="p-2 border text-center">G07</th>
                        <th class="p-2 border text-center">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border text-center delete-checkbox hidden">
                            <input type="checkbox" name="ids[]" value="<?php echo e($rule->id); ?>" class="ruleCheckbox cursor-pointer">
                        </td>
                        <td class="p-2 border text-center"><?php echo e($rule->G01); ?></td>
                        <td class="p-2 border text-center"><?php echo e($rule->G02); ?></td>
                        <td class="p-2 border text-center"><?php echo e($rule->G03); ?></td>
                        <td class="p-2 border text-center"><?php echo e($rule->G04); ?></td>
                        <td class="p-2 border text-center"><?php echo e($rule->G05); ?></td>
                        <td class="p-2 border text-center"><?php echo e($rule->G06); ?></td>
                        <td class="p-2 border text-center"><?php echo e($rule->G07); ?></td>
                        <td class="p-2 border text-center font-semibold"><?php echo e($rule->hasil); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="p-4 text-center text-gray-500">
                            Belum ada data rule yang tersimpan.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div id="confirmDeleteContainer" class="hidden mt-4 text-center">
            <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                Hapus Terpilih
            </button>
        </div>
    </form>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleDeleteBtn = document.getElementById('toggleDeleteMode');
    const deleteCheckboxCols = document.querySelectorAll('.delete-checkbox');
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.ruleCheckbox');
    const confirmContainer = document.getElementById('confirmDeleteContainer');

    let deleteMode = false;

    // Tombol "Hapus" -> tampilkan kolom checkbox dan tombol konfirmasi
    toggleDeleteBtn.addEventListener('click', function () {
        deleteMode = !deleteMode;
        deleteCheckboxCols.forEach(col => col.classList.toggle('hidden', !deleteMode));
        confirmContainer.classList.toggle('hidden', !deleteMode);
        toggleDeleteBtn.textContent = deleteMode ? 'Batal' : 'Hapus';
    });

    // Checkbox "Pilih Semua"
    selectAll?.addEventListener('change', function () {
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/admin/rules/index.blade.php ENDPATH**/ ?>