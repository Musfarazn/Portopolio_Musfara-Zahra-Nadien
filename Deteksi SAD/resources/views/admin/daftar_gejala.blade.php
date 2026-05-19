@extends('layouts.app')
@section('title','Daftar Gejala')

@section('content')
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold mb-4">Daftar Gejala</h2>

  {{-- Pesan sukses --}}
  @if(session('success'))
    <div class="mb-3 p-2 bg-green-100 rounded">{{ session('success') }}</div>
  @endif

  {{-- Form Tambah Gejala --}}
  <form method="POST" action="{{ route('admin.store_gejala') }}" class="mb-6 flex flex-wrap gap-2 items-center">
      @csrf

      {{-- Pilih Kode Gejala --}}
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

      {{-- Nama Gejala --}}
      <input type="text" name="nama_gejala" placeholder="Pertanyaan gejala" class="w-1/3 p-2 border rounded" required>

      <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">Tambah</button>
  </form>

  {{-- Tabel Gejala --}}
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
      @forelse($gejalas as $index => $g)
      <tr class="hover:bg-gray-50">
        <td class="p-2 border text-center">{{ $index + 1 }}</td>
        <td class="p-2 border">{{ $g->kode }}</td>
        <td class="p-2 border">{{ $g->nama_gejala }}</td>
        <td class="p-2 border text-center flex justify-center gap-1">
          <a href="{{ route('admin.edit_gejala', $g->id) }}" 
             class="bg-blue-500 text-white px-2 py-1 rounded text-xs hover:bg-blue-600">
             Edit
          </a>
          <form action="{{ route('admin.delete_gejala', $g->id) }}" 
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus gejala ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-500 text-white px-2 py-1 rounded text-xs hover:bg-red-600">
              Hapus
            </button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="p-2 text-center">Belum ada gejala</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
