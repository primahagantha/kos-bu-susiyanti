<?php
// Mulai sesi PHP untuk mengakses variabel sesi
session_start();

// Hapus semua data dari variabel sesi
session_unset();

// Hancurkan sesi, menghapus semua data sesi dari server
session_destroy();

// Arahkan pengguna kembali ke halaman login setelah logout
header("Location: login.php");

// Hentikan eksekusi skrip setelah melakukan pengalihan halaman
exit();
?>
