<?php
// koneksi.php - Koneksi MySQL/PDO (Laragon)

$host='127.0.0.1';
$db='ksi2025';     // Pastikan database ini sudah dibuat di Laragon
$user='root';     // Default Laragon
$pass='';         // Default Laragon (kosong jika tidak ada password)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    // Mengaktifkan exception untuk error mode
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // Menggunakan array asosiatif sebagai default fetch mode
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Menonaktifkan emulasi prepared statements untuk keamanan
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Tampilkan pesan error dan hentikan program jika koneksi gagal
    echo "Koneksi database gagal: " . $e->getMessage();
    exit();
}
// Variabel $pdo sekarang berisi objek koneksi database yang siap digunakan
?>