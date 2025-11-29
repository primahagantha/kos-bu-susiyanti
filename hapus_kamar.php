<?php
include 'auth_check.php';
// menggunakan file koneksi.php untuk terhubung ke database
include_once "koneksi.php";

// Mendapatkan nomor kamar dari parameter URL menggunakan metode GET
// Ambil ID kamar yang akan dihapus dari parameter URL
$no_kamar = $_GET['no_kamar'];

// Lakukan query DELETE untuk menghapus data kamar dari database menggunakan Prepared Statement
$stmt = $conn->prepare("DELETE FROM daftar_kamar WHERE no_kamar=?");
$stmt->bind_param("s", $no_kamar);
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
                text: 'Data kamar berhasil dihapus!',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location.href = 'daftar_kamar.php';
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
                text: 'Hapus data kamar gagal: " . addslashes($stmt->error) . "',
                icon: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Kembali'
            }).then((result) => {
                window.location.href = 'daftar_kamar.php';
            });
        </script>
    </body>
    </html>";
}
$stmt->close();
?>
