@extends('layouts.app')

@section('title','Import Rules')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Import Rules dari File</h2>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- ========================= --}}
    {{-- FORM UPLOAD FILE RULE     --}}
    {{-- ========================= --}}
    <form action="{{ route('admin.rules.import') }}" method="POST" enctype="multipart/form-data" class="mb-8">
        @csrf
        <label class="font-semibold">Pilih File Excel / CSV</label>
        <input type="file" name="file" class="border p-2 mb-3 w-full rounded" required>

        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded">
            Upload & Simpan
        </button>
    </form>

    <hr class="my-6">

    {{-- ========================= --}}
    {{-- FORM INPUT RULE MANUAL   --}}
    {{-- ========================= --}}
    <h3 class="text-xl font-bold mb-4">Tambah Rule Secara Manual</h3>

<form action="{{ route('admin.rules.store') }}" method="POST">
    @csrf

    <div class="grid grid-cols-4 gap-4">

        {{-- Dropdown Pilihan untuk semua G01–G07 --}}
        @foreach(['G01','G02','G03','G04','G05','G06','G07'] as $g)
        <div>
            <label class="font-semibold">{{ $g }}</label>
            <select name="{{ $g }}" class="border p-2 w-full rounded" required>
                <option value="">-- Pilih --</option>
                <option value="Normal">Normal</option>
                <option value="Ringan">Ringan</option>
                <option value="Sedang">Sedang</option>
                <option value="Berat">Berat</option>
            </select>
        </div>
        @endforeach

        {{-- Hasil --}}
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
@endsection
