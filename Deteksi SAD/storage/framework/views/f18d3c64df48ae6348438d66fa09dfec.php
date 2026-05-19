<?php $__env->startSection('title','Riwayat Semua User'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Riwayat Diagnosa Semua User</h2>
    <table id="riwayatTable" class="w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Nama User</th>
                <th class="p-2 border">NIM</th>
                <th class="p-2 border">Umur</th>
                <th class="p-2 border">Prodi</th>
                <th class="p-2 border">Hasil</th>
                <th class="p-2 border">Keterangan</th>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-gray-50">
                <td class="p-2 border"><?php echo e($r->user->nama ?? '-'); ?></td>
                <td class="p-2 border"><?php echo e($r->user->name ?? '-'); ?></td>
                <td class="p-2 border"><?php echo e($r->user->umur ?? '-'); ?></td>
                <td class="p-2 border"><?php echo e($r->user->prodi ?? '-'); ?></td>
                <td class="p-2 border"><?php echo e($r->hasil); ?></td>
                <td class="p-2 border"><?php echo e($r->keterangan); ?></td>
                <td class="p-2 border"><?php echo e($r->created_at->format('d-m-Y H:i')); ?></td>
                <td class="p-2 border text-center flex justify-center gap-2">
                    <a href="<?php echo e(route('diagnosa.hasil', $r->id)); ?>" 
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                       Lihat Hasil
                    </a>
                    <form action="<?php echo e(route('admin.riwayat.destroy', $r->id)); ?>" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="8" class="p-2 border text-center text-gray-500">
                    Belum ada riwayat diagnosa.
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/admin/riwayat.blade.php ENDPATH**/ ?>