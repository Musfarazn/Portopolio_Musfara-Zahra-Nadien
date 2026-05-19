@extends('layouts.app')
@section('title', 'Riwayat Diagnosa')
@section('content')
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Riwayat Diagnosa</h2>
    <table id="riwayatTable" class="w-full border">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-2 border text-center">Tanggal</th>
          <th class="p-2 border text-center">Hasil</th>
          <th class="p-2 border text-center">Keterangan</th>
          <th class="p-2 border text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($riwayat as $r)
          <tr>
            <td class="p-2 border text-center">{{ $r->created_at->format('d-m-Y H:i') }}</td>
            <td class="p-2 border text-center">{{ $r->hasil }}</td>
            <td class="p-2 border">{{ $r->keterangan }}</td>
            <td class="p-2 border text-center flex justify-center gap-2">
              <a href="{{ route('diagnosa.hasil', $r->id) }}" 
                 class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                Lihat Hasil
              </a>
              <form action="{{ route('riwayat.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="p-2 text-center">Belum ada riwayat</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
