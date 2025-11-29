<?php
include 'auth_check.php';
// Sertakan file koneksi.php untuk menghubungkan ke database
include_once "koneksi.php";

// Ambil data dari formulir pengeditan penyewa yang dikirim melalui metode POST
$no = $_POST['no'];
$nama_penyewa = $_POST['nama_penyewa'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$lantai = $_POST['lantai'];
$no_kamar = $_POST['no_kamar'];
$no_hp = $_POST['no_hp'];

// Lakukan query UPDATE untuk mengedit data penyewa di database menggunakan Prepared Statement
$stmt = $conn->prepare("UPDATE nama_penyewa SET nama_penyewa=?, jenis_kelamin=?, lantai=?, no_kamar=?, no_hp=? WHERE no=?");
$stmt->bind_param("ssissi", $nama_penyewa, $jenis_kelamin, $lantai, $no_kamar, $no_hp, $no);
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
                text: 'Data penyewa berhasil diperbarui!',
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
                text: 'Edit data penyewa gagal: " . addslashes($stmt->error) . "',
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
