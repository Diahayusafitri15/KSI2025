//tambah

<?php
// tambah.php
require 'koneksi.php';

$status = ''; // Untuk menyimpan pesan sukses/gagal

// Cek jika ada pengiriman data (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $jurusan = $_POST['jurusan'] ?? '';
    $angkatan = $_POST['angkatan'] ?? '';

    // Validasi sederhana
    if (empty($nim) || empty($nama) || empty($jurusan) || empty($angkatan)) {
        $status = '<div class="alert alert-danger">Semua field harus diisi.</div>';
    } else {
        try {
            // Gunakan prepared statement untuk keamanan (mencegah SQL Injection)
            $sql = "INSERT INTO mahasiswa (nim, nama, jurusan, angkatan) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nim, $nama, $jurusan, $angkatan]);

            $status = '<div class="alert alert-success">Data mahasiswa **' . htmlspecialchars($nama) . '** berhasil ditambahkan!</div>';

            // Opsional: Redirect ke index.php setelah sukses
            // header('Location: index.php?status=success');
            // exit;

        } catch (\PDOException $e) {
            $status = '<div class="alert alert-danger">Gagal menambahkan data: ' . $e->getMessage() . '</div>';
        }
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Mahasiswa - KSI2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">KSI2025</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-3">Tambah Mahasiswa Baru</h1>
        <p><a href="index.php" class="btn btn-secondary">Kembali ke Daftar</a></p>

        <?= $status ?>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="tambah.php">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                    </div>
                    <div class="mb-3">
                        <label for="angkatan" class="form-label">Angkatan</label>
                        <input type="number" class="form-control" id="angkatan" name="angkatan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
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