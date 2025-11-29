<?php
// Program ini melakukan koneksi ke database MySQL menggunakan PHP.

// Definisikan variabel untuk kredensial database
$host = "localhost";      // Alamat server database (dalam hal ini, server lokal)
$username = "root";        // Nama pengguna database
$password = "";            // Kata sandi pengguna database
$database = "kos_bu_susiyanti";  // Nama database yang digunakan

// Buat objek koneksi ke database menggunakan MySQLi
try {
    $conn = new mysqli($host, $username, $password, $database);
    
    // Periksa apakah koneksi berhasil (untuk versi PHP lama atau jika mode exception dimatikan)
    if ($conn->connect_error) {
        throw new Exception("Koneksi gagal: " . $conn->connect_error);
    }
} catch (Throwable $e) {
    // Log error ke file
    error_log("[" . date("Y-m-d H:i:s") . "] Database Connection Error: " . $e->getMessage() . "\n", 3, "d:/production/lawak/error.log");
    
    // Tampilkan pesan user-friendly
    die("Maaf, sistem sedang mengalami gangguan. Silakan coba beberapa saat lagi.");
}

// Koneksi ke database telah berhasil pada titik ini.
// Selanjutnya, objek koneksi ($conn) dapat digunakan untuk menjalankan query dan operasi database lainnya.
?>

