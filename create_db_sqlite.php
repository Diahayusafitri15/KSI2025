<?php
// create_db_sqlite.php
// Jalankan sekali untuk membuat file database SQLite

$dbfile = __DIR__ . '/db_sqlite.sqlite';

// Cek apakah database sudah ada
if (file_exists($dbfile)) {
    echo "Database sudah ada: $dbfile\n";
    exit;
}

// Buat koneksi SQLite
$db = new PDO('sqlite:' . $dbfile);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Buat tabel mahasiswa
$db->exec("
CREATE TABLE mahasiswa (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nim TEXT NOT NULL,
    nama TEXT NOT NULL,
    jurusan TEXT,
    angkatan INTEGER
);
");

// Isi data awal
$insert = $db->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, angkatan) VALUES (?, ?, ?, ?)");
$insert->execute(['20231001', 'Ana Putri', 'Teknik Informatika', 2023]);
$insert->execute(['20231002', 'Budi Santoso', 'Sistem Informasi', 2023]);
$insert->execute(['20221005', 'Citra Dewi', 'Teknik Informatika', 2022]);

echo "✅ Database SQLite berhasil dibuat: $dbfile\n";
