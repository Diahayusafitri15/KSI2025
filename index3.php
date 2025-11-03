<?php
// index.php - PHP native + Bootstrap
require 'koneksi.php'; // Menggunakan file koneksi.php yang baru

// Ambil data mahasiswa
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id ASC");
$mahasiswas = $stmt->fetchAll();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Mahasiswa - KSI2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">KSI2025</a>
  </div>
</nav>

<div class="container">
  <h1 class="mb-3">Daftar Mahasiswa</h1>
  <p class="text-muted">Contoh tampilan data mahasiswa menggunakan PHP native + Bootstrap</p>

  <div class="card">
    <div class="card-body">
      <?php if (count($mahasiswas) === 0): ?>
        <div class="alert alert-warning">Data mahasiswa kosong.</div>
      <?php else: ?>
        <table class="table table-striped table-bordered">
          <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Angkatan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mahasiswas as $i => $m): ?>
            <tr>
              <td><?= $i+1 ?></td>
              <td><?= htmlspecialchars($m['nim']) ?></td>
              <td><?= htmlspecialchars($m['nama']) ?></td>
              <td><?= htmlspecialchars($m['jurusan']) ?></td>
              <td><?= htmlspecialchars($m['angkatan']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>

<footer class="bg-light py-3 mt-4">
  <div class="container text-center text-muted">
    &copy; <?= date('Y') ?> - Praktikum KSI2025
  </div>
</footer>

</body>
</html>