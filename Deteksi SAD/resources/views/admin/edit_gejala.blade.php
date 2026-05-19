@extends('layouts.app')
@section('title','Edit Gejala')

@section('content')
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-xl font-bold mb-4">Edit Gejala</h2>

  <form method="POST" action="{{ route('admin.update_gejala', $gejala->id) }}">
    @csrf
    @method('PUT')

     <div class="mb-3">
      <label class="block mb-1">Kode Gejala</label>
      <input type="text" name="kode" value="{{ old('nama_gejala', $gejala->kode) }}"
             class="w-full p-2 border rounded">
    </div>

    <div class="mb-3">
      <label class="block mb-1">Nama Gejala</label>
      <input type="text" name="nama_gejala" value="{{ old('nama_gejala', $gejala->nama_gejala) }}"
             class="w-full p-2 border rounded">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    <a href="{{ route('admin.gejala') }}" class="ml-2 text-gray-600">Batal</a>
  </form>
</div>
@endsection
