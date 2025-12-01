<?php
// =========================================================
// KONFIGURASI KONEKSI DATABASE MENGGUNAKAN PDO
// =========================================================
$host='127.0.0.1';      // alamat server database
$db='ksi2025';          // nama database
$user = 'root';         // username MySQL
$pass = "";             // password MySQL
$charset = 'utf8mb4';   // karakter unicode supaya mendukung semua huruf

// DSN = Data Source Name → format koneksi PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opsi tambahan untuk PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // tampilkan error jika query salah
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // hasil query berupa array associatif
];

try {
    // Membuat koneksi PDO ke database
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Jika koneksi gagal
    echo "Koneksi database gagal: " . $e->getMessage();
    exit; // hentikan script agar tidak error ke bagian lain
}

// =========================================================
// AMBIL DATA DARI TABEL MAHASISWA
// =========================================================
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id ASC");  
// Query untuk mengambil semua data mahasiswa urut berdasarkan ID

$mahasiswas = $stmt->fetchAll();  
// Simpan semua data ke dalam array
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Mahasiswa - KSI2025</title>

  <!-- Memanggil Bootstrap CSS dari CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- =========================================================
     NAVBAR (Bagian Atas Website)
========================================================= -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">
      KSI2025  <!-- Judul navbar -->
    </a>
  </div>
</nav>

<!-- =========================================================
     KONTEN UTAMA
========================================================= -->
<div class="container">

  <!-- Judul Halaman -->
  <h1 class="mb-3">Daftar Mahasiswa</h1>

  <!-- Deskripsi Singkat -->
  <p class="text-muted">Contoh tampilan data mahasiswa menggunakan PHP native + Bootstrap</p>

  <div class="card">
    <div class="card-body">

      <?php
      // Jika tidak ada data mahasiswa
      if (count($mahasiswas) === 0): ?>
      
        <div class="alert alert-warning">
          Data mahasiswa kosong.
        </div>

      <?php else: ?>
      
      <!-- =========================================================
           TABEL DATA MAHASISWA
      ========================================================= -->
      <table class="table table-striped table-bordered">
        <thead class="table-primary">  <!-- Warna biru header tabel -->
          <tr>
            <th>#</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          // Perulangan untuk menampilkan semua data mahasiswa
          foreach ($mahasiswas as $i => $m): ?>
          <tr>
            <td><?= $i+1 ?></td> <!-- Nomor urut -->
            <td><?= htmlspecialchars($m['nim']) ?></td>       <!-- Mencegah XSS -->
            <td><?= htmlspecialchars($m['nama']) ?></td>
            <td><?= htmlspecialchars($m['jurusan']) ?></td>
            <td><?= htmlspecialchars($m['angkatan']) ?></td>
          </tr>
          <?php endforeach; ?>

        </tbody>
      </table>

      <?php endif; ?> <!-- Penutup pengecekan data kosong -->

    </div>
  </div>
</div>

<!-- =========================================================
     FOOTER WEBSITE
========================================================= -->
<footer class="bg-light py-3 mt-4">
  <div class="container text-center text-muted">
    &copy; <?= date('Y') ?> - Praktikum KSI2025
    <!-- Menampilkan tahun otomatis -->
  </div>
</footer>

</body>
</html>
