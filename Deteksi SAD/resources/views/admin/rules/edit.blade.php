@extends('layouts.app')

@section('title','Edit Rule')

@section('content')
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold mb-4">Edit Rule</h2>

  {{-- Form update rule --}}
  <form action="{{ route('admin.rules.update', $rule->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Psikis --}}
    <div class="mb-3">
      <label class="block font-semibold">Psikis</label>
      <select name="psikis" class="border p-2 w-full rounded">
        <option value="ringan" {{ old('psikis', $rule->psikis) == 'ringan' ? 'selected' : '' }}>Ringan</option>
        <option value="sedang" {{ old('psikis', $rule->psikis) == 'sedang' ? 'selected' : '' }}>Sedang</option>
        <option value="berat" {{ old('psikis', $rule->psikis) == 'berat' ? 'selected' : '' }}>Berat</option>
      </select>
    </div>

    {{-- Somatik --}}
    <div class="mb-3">
      <label class="block font-semibold">Somatik</label>
      <select name="somatik" class="border p-2 w-full rounded">
        <option value="ringan" {{ old('somatik', $rule->somatik) == 'ringan' ? 'selected' : '' }}>Ringan</option>
        <option value="sedang" {{ old('somatik', $rule->somatik) == 'sedang' ? 'selected' : '' }}>Sedang</option>
        <option value="berat" {{ old('somatik', $rule->somatik) == 'berat' ? 'selected' : '' }}>Berat</option>
      </select>
    </div>

    {{-- Perilaku --}}
    <div class="mb-3">
      <label class="block font-semibold">Perilaku</label>
      <select name="perilaku" class="border p-2 w-full rounded">
        <option value="ringan" {{ old('perilaku', $rule->perilaku) == 'ringan' ? 'selected' : '' }}>Ringan</option>
        <option value="sedang" {{ old('perilaku', $rule->perilaku) == 'sedang' ? 'selected' : '' }}>Sedang</option>
        <option value="berat" {{ old('perilaku', $rule->perilaku) == 'berat' ? 'selected' : '' }}>Berat</option>
      </select>
    </div>

    {{-- Hasil --}}
    <div class="mb-3">
      <label class="block font-semibold">Hasil</label>
      <select name="hasil" class="border p-2 w-full rounded">
        <option value="ringan" {{ old('hasil', $rule->hasil) == 'ringan' ? 'selected' : '' }}>Ringan</option>
        <option value="sedang" {{ old('hasil', $rule->hasil) == 'sedang' ? 'selected' : '' }}>Sedang</option>
        <option value="berat" {{ old('hasil', $rule->hasil) == 'berat' ? 'selected' : '' }}>Berat</option>
      </select>
    </div>

    {{-- Tombol aksi --}}
    <div class="mt-4">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
        Update
      </button>
      <a href="{{ route('admin.rules.index') }}" class="ml-3 text-gray-600 hover:underline">Kembali</a>
    </div>
  </form>
</div>
@endsection
