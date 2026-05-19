<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $__env->yieldContent('title','Sistem SAD'); ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body class="bg-gray-100 font-sans min-h-screen flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-teal-600 text-white flex flex-col">
    <div class="p-6 flex items-center justify-center">
      
      <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo" class="w-28 h-28 rounded-full">
    </div>
    <nav class="flex flex-col gap-2 p-4">

      
      <a href="<?php echo e(auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard')); ?>"
      class="px-4 py-2 rounded-lg transition
      <?php echo e(request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500'); ?>">
      <?php echo e(auth()->user()->role === 'admin' ? 'Dashboard' : 'Home'); ?>

      </a>


      <?php if(auth()->guard()->check()): ?>
        
        <?php if(auth()->user()->role === 'admin'): ?>
          <a href="<?php echo e(route('admin.gejala')); ?>"
             class="px-4 py-2 rounded-lg transition
             <?php echo e(request()->routeIs('admin.gejala') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500'); ?>">
             Daftar Gejala
          </a>
         <a href="<?php echo e(route('admin.rules.index')); ?>"
            class="px-4 py-2 rounded-lg transition
            <?php echo e(request()->routeIs('admin.rules.*') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500'); ?>">
             Rules
          </a>
          <a href="<?php echo e(route('admin.riwayat')); ?>"
             class="px-4 py-2 rounded-lg transition
             <?php echo e(request()->routeIs('admin.riwayat') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500'); ?>">
             Riwayat Pengguna
          </a>
        <?php else: ?>
        
          <a href="<?php echo e(route('diagnosa.index')); ?>"
             class="px-4 py-2 rounded-lg transition
             <?php echo e(request()->routeIs('diagnosa.index') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500'); ?>">
             Diagnosa
          </a>
          <a href="<?php echo e(route('riwayat.index')); ?>"
             class="px-4 py-2 rounded-lg transition
             <?php echo e(request()->routeIs('riwayat.index') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500'); ?>">
             Riwayat
          </a>
        <?php endif; ?>
      <?php endif; ?>
    </nav>
  </aside>

  <!-- Content -->
  <main class="flex-1 p-6">
    <header class="flex justify-between items-center mb-6 border-b pb-3">
      <h1 class="text-xl font-bold"><?php echo $__env->yieldContent('title'); ?></h1>
      <div>
        <?php if(auth()->guard()->check()): ?>
          <span class="mr-4 font-medium"><?php echo e(auth()->user()->name); ?></span>
          <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
              <?php echo csrf_field(); ?>
              <button class="bg-red-500 px-3 py-1 rounded text-white">Logout</button>
          </form>
        <?php else: ?>
          <a href="<?php echo e(route('login')); ?>" class="mr-3 text-blue-600">Login</a>
          <a href="<?php echo e(route('register')); ?>" class="text-blue-600">Register</a>
        <?php endif; ?>
      </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>
  </main>

<!-- Menyertakan jQuery (pastikan jQuery sudah dimuat sebelumnya) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Menyertakan DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Menyertakan file JS yang kamu buat (diagnosa.js) -->
<script src="<?php echo e(asset('js/datatables.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\deteksi\resources\views/layouts/app.blade.php ENDPATH**/ ?>