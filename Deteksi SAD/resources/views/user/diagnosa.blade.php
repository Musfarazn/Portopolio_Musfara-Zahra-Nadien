@extends('layouts.app')
@section('title','Diagnosa')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
  <h2 class="text-2xl font-bold mb-2">Diagnosa</h2>
  <p class="text-gray-600 mb-6">
    Aturan Pengisian:
    <br> 
    Silakan pilih skor untuk setiap gejala dengan ketentuan berikut:
    <br>
    <span class="block mt-2">0 = Tidak Ada</span>
    <span class="block">1 = jarang</span>
    <span class="block">2 = Sering</span>
    <span class="block">3 = Sangat Sering</span>
  </p>
  <form method="POST" action="{{ route('diagnosa.store') }}">
    @csrf
    <div class="overflow-x-auto">
      <table id="diagnosaTable" class="w-full border border-gray-200 text-sm">
        <thead>
          <tr class="bg-gray-100 text-center">
            <th class="w-12 px-2 py-2 border">No.</th>
            <th class="px-4 py-2 border text-left">Gejala</th>
            <th class="px-4 py-2 border">Skala</th>
          </tr>
        </thead>
        <tbody>
          @foreach($gejala as $index => $g)
            <tr class="hover:bg-gray-50">
              <td class="px-2 py-2 border text-center">{{ $index+1 }}</td>
              <td class="px-4 py-2 border">{{ $g->nama_gejala }}</td>
              <td class="px-4 py-2 border text-center">
                <div class="flex justify-center space-x-3">
                  <label><input type="radio" name="jawaban[{{ $g->id }}]" value="0"> 0</label>
                  <label><input type="radio" name="jawaban[{{ $g->id }}]" value="1"> 1</label>
                  <label><input type="radio" name="jawaban[{{ $g->id }}]" value="2"> 2</label>
                  <label><input type="radio" name="jawaban[{{ $g->id }}]" value="3"> 3</label>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-6 text-right">
      <button type="submit"
        class="bg-yellow-400 hover:bg-yellow-500 text-black font-medium px-6 py-2 rounded-lg">
        Kirim
      </button>
    </div>
  </form> 
</div>

<script>
  $(document).ready(function() {
    $('#diagnosaTable').DataTable({
      // Ini bisa diatur lebih lanjut sesuai kebutuhan
      paging: true, // Menampilkan pagination
      searching: true, // Menampilkan fitur pencarian
      info: false, // Menyembunyikan info bar
      lengthChange: false, // Menyembunyikan opsi jumlah item per halaman
      columnDefs: [
        { orderable: false, targets: [1, 2] } // Kolom Gejala dan Skala tidak bisa diurutkan
      ]
    });
  });
</script>

@endsection

