$(document).ready(function() {
  // Memastikan bahwa elemen tabel #diagnosaTable ada di halaman
  if ($('#diagnosaTable').length) {
    $('#diagnosaTable').DataTable({
      paging: true,           // Menampilkan pagination
      searching: true,        // Menampilkan fitur pencarian
      info: false,            // Menyembunyikan info bar
      lengthChange: false,    // Menyembunyikan opsi jumlah item per halaman
        lengthMenu: [           // Menentukan pilihan jumlah baris per halaman
        [10, 20, 50, -1],     // -1 artinya tidak ada batas (semua baris ditampilkan)
        [10, 20, 50, "All"]   // Menampilkan teks "All" untuk pilihan semua baris
      ],
      pageLength: 20,
      columnDefs: [
        { orderable: false, targets: [1, 2] } // Kolom Gejala dan Skala tidak bisa diurutkan
      ]
    });
  }
});

$(document).ready(function() {
  // Memastikan bahwa elemen tabel #diagnosaTable ada di halaman
  if ($('#riwayatTable').length) {
    $('#riwayatTable').DataTable({
      paging: true,           // Menampilkan pagination
      searching: true,        // Menampilkan fitur pencarian
      info: false,            // Menyembunyikan info bar
      lengthChange: false,    // Menyembunyikan opsi jumlah item per halaman
      columnDefs: [
        { orderable: false, targets: [1, 2] } // Kolom Gejala dan Skala tidak bisa diurutkan
      ]
    });
  }
});