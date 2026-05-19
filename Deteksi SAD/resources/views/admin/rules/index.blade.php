@extends('layouts.app')

@section('title', 'Daftar Rules DASS Anxiety')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Daftar Rules DASS Anxiety</h2>

    {{-- Tombol Aksi Atas --}}
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin.rules.create') }}" 
           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
           Tambah Rule
        </a>

        {{-- Tombol untuk aktifkan mode hapus --}}
        <button id="toggleDeleteMode" 
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
            Hapus
        </button>
    </div>

    {{-- Form Hapus Banyak --}}
    <form id="bulkDeleteForm" 
          action="{{ route('admin.rules.destroyMultiple') }}" 
          method="POST" 
          onsubmit="return confirm('Yakin ingin menghapus data terpilih?')">
        @csrf
        @method('DELETE')

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
                    @forelse($rules as $rule)
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border text-center delete-checkbox hidden">
                            <input type="checkbox" name="ids[]" value="{{ $rule->id }}" class="ruleCheckbox cursor-pointer">
                        </td>
                        <td class="p-2 border text-center">{{ $rule->G01 }}</td>
                        <td class="p-2 border text-center">{{ $rule->G02 }}</td>
                        <td class="p-2 border text-center">{{ $rule->G03 }}</td>
                        <td class="p-2 border text-center">{{ $rule->G04 }}</td>
                        <td class="p-2 border text-center">{{ $rule->G05 }}</td>
                        <td class="p-2 border text-center">{{ $rule->G06 }}</td>
                        <td class="p-2 border text-center">{{ $rule->G07 }}</td>
                        <td class="p-2 border text-center font-semibold">{{ $rule->hasil }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="p-4 text-center text-gray-500">
                            Belum ada data rule yang tersimpan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Tombol hapus terpilih muncul hanya saat mode hapus aktif --}}
        <div id="confirmDeleteContainer" class="hidden mt-4 text-center">
            <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                Hapus Terpilih
            </button>
        </div>
    </form>
</div>

{{-- JavaScript --}}
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
@endsection
