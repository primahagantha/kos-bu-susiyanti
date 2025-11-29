<?php
include 'auth_check.php';
// Mengimport (menggunakan) file koneksi.php untuk terhubung ke database
include_once "koneksi.php";

// Ambil ID penyewa yang akan dihapus dari parameter URL
$no = $_GET['no'];

// Lakukan query DELETE untuk menghapus data penyewa dari database menggunakan Prepared Statement
$stmt = $conn->prepare("DELETE FROM nama_penyewa WHERE no=?");
$stmt->bind_param("i", $no);
$query = $stmt->execute();

// Periksa apakah query berhasil dieksekusi
if ($query) {
    // Jika berhasil, tampilkan pesan sukses dan redirect menggunakan SweetAlert2
    echo "<!DOCTYPE html>
    <html>
    <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <style>body { font-family: 'Poppins', sans-serif; }</style>
    </head>
    <body>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data penyewa berhasil dihapus!',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location.href = 'daftar_penyewa.php';
            });
        </script>
    </body>
    </html>";
} else {
    // Jika gagal, tampilkan pesan kesalahan menggunakan SweetAlert2
    echo "<!DOCTYPE html>
    <html>
    <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <style>body { font-family: 'Poppins', sans-serif; }</style>
    </head>
    <body>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Hapus data penyewa gagal: " . addslashes($stmt->error) . "',
                icon: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Kembali'
            }).then((result) => {
                window.history.back();
            });
        </script>
    </body>
    </html>";
}
$stmt->close();
?>
