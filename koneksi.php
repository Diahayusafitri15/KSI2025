<?php
// Konfigurasi koneksi MySQL/Laragon
$host='127.0.0.1';
$db='ksi2025'; // Pastikan database 'ksi2025' sudah ada
$user = 'root'; // Username default
$pass = ''; // Password default (Laragon/XAMPP seringkali kosong)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
    exit;
}
?>