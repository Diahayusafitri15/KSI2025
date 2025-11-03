<?php
// index.php - PHP native + Bootstrap
require 'koneksi.php'; // Menggunakan file koneksi.php yang baru

// Ambil data mahasiswa
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id ASC");
$mahasiswas = $stmt->fetchAll();
?>
<!doctype html>