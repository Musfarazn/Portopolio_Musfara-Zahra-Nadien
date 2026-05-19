@extends('layouts.app')
@section('title','Hasil Diagnosa')

@section('content')

<div class="bg-white p-6 rounded-lg shadow mt-4">
  <h2 class="text-xl font-bold mb-2">Hasil Diagnosa</h2>
  <p class="mb-2"><strong>Hasil:</strong> {{ $diagnosa->hasil }}</p>
  <p class="mb-4 text-gray-600">{{ $diagnosa->keterangan }}</p>

  {{-- === Dua Kolom Saran === --}}
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
    
    {{-- Kolom 1: Saran Otomatis Lokal --}}
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
      <h3 class="font-bold text-lg mb-2 text-blue-700">🧠 Saran </h3>
      <p class="text-gray-700 text-justify leading-relaxed">
        {{ $saran_otomatis }}
      </p>
    </div>

    {{-- Kolom 2: Saran dari AI --}}
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
      <h3 class="font-bold text-lg mb-2 text-green-700">🤖 Saran by AI</h3>
      <p class="text-gray-700 text-justify leading-relaxed">
        {{ $saran_ai }}
      </p>
    </div>

  </div>
</div>

{{-- === Form Jawaban === --}}
<div class="mb-6 p-4 bg-gray-100 rounded mt-6">
  <h3 class="font-semibold mb-2">Form Jawaban</h3>
  <table class="w-full border border-gray-200 text-sm">
    <thead>
      <tr class="bg-gray-200">
        <th class="p-2 border text-center">No.</th>
        <th class="p-2 border text-left">Gejala</th>
        <th class="p-2 border text-center">Skala</th>
      </tr>
    </thead>
    <tbody>
      @foreach($diagnosa->jawaban as $index => $j)
      <tr>
        <td class="p-2 border text-center">{{ $index+1 }}</td>
        <td class="p-2 border">{{ $j->gejala->nama_gejala }}</td>
        <td class="p-2 border text-center">
          {{ $j->nilai }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
