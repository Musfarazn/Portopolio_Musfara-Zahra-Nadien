@extends('layouts.app')
@section('title','Riwayat Semua User')
@section('content')
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
            @forelse($riwayat as $r)
            <tr class="hover:bg-gray-50">
                <td class="p-2 border">{{ $r->user->nama ?? '-' }}</td>
                <td class="p-2 border">{{ $r->user->name ?? '-' }}</td>
                <td class="p-2 border">{{ $r->user->umur ?? '-' }}</td>
                <td class="p-2 border">{{ $r->user->prodi ?? '-' }}</td>
                <td class="p-2 border">{{ $r->hasil }}</td>
                <td class="p-2 border">{{ $r->keterangan }}</td>
                <td class="p-2 border">{{ $r->created_at->format('d-m-Y H:i') }}</td>
                <td class="p-2 border text-center flex justify-center gap-2">
                    <a href="{{ route('diagnosa.hasil', $r->id) }}" 
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                       Lihat Hasil
                    </a>
                    <form action="{{ route('admin.riwayat.destroy', $r->id) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="p-2 border text-center text-gray-500">
                    Belum ada riwayat diagnosa.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
