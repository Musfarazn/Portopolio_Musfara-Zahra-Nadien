<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title','Sistem SAD')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body class="bg-gray-100 font-sans min-h-screen flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-teal-600 text-white flex flex-col">
    <div class="p-6 flex items-center justify-center">
      {{-- Logo bisa diganti --}}
      <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-28 h-28 rounded-full">
    </div>
    <nav class="flex flex-col gap-2 p-4">

      {{-- Dashboard sesuai role --}}
      <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
      class="px-4 py-2 rounded-lg transition
      {{ request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500' }}">
      {{ auth()->user()->role === 'admin' ? 'Dashboard' : 'Home' }}
      </a>


      @auth
        {{-- Menu khusus admin --}}
        @if(auth()->user()->role === 'admin')
          <a href="{{ route('admin.gejala') }}"
             class="px-4 py-2 rounded-lg transition
             {{ request()->routeIs('admin.gejala') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500' }}">
             Daftar Gejala
          </a>
         <a href="{{ route('admin.rules.index') }}"
            class="px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.rules.*') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500' }}">
             Rules
          </a>
          <a href="{{ route('admin.riwayat') }}"
             class="px-4 py-2 rounded-lg transition
             {{ request()->routeIs('admin.riwayat') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500' }}">
             Riwayat Pengguna
          </a>
        @else
        {{-- Menu khusus user --}}
          <a href="{{ route('diagnosa.index') }}"
             class="px-4 py-2 rounded-lg transition
             {{ request()->routeIs('diagnosa.index') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500' }}">
             Diagnosa
          </a>
          <a href="{{ route('riwayat.index') }}"
             class="px-4 py-2 rounded-lg transition
             {{ request()->routeIs('riwayat.index') ? 'bg-yellow-400 text-black' : 'hover:bg-teal-500' }}">
             Riwayat
          </a>
        @endif
      @endauth
    </nav>
  </aside>

  <!-- Content -->
  <main class="flex-1 p-6">
    <header class="flex justify-between items-center mb-6 border-b pb-3">
      <h1 class="text-xl font-bold">@yield('title')</h1>
      <div>
        @auth
          <span class="mr-4 font-medium">{{ auth()->user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}" class="inline">
              @csrf
              <button class="bg-red-500 px-3 py-1 rounded text-white">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="mr-3 text-blue-600">Login</a>
          <a href="{{ route('register') }}" class="text-blue-600">Register</a>
        @endauth
      </div>
    </header>

    @yield('content')
  </main>

<!-- Menyertakan jQuery (pastikan jQuery sudah dimuat sebelumnya) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Menyertakan DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Menyertakan file JS yang kamu buat (diagnosa.js) -->
<script src="{{ asset('js/datatables.js') }}"></script>
</body>
</html>
