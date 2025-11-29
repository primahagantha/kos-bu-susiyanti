<?php
include 'auth_check.php';
// Sertakan file koneksi.php untuk menghubungkan ke database
include_once "koneksi.php";

// Ambil data dari formulir pengeditan penjaga yang dikirim melalui metode POST
$no = $_POST['no'];
$nama_penjaga = $_POST['nama_penjaga'];
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jadwal_kerja = $_POST['jadwal_kerja'];

// Lakukan query UPDATE untuk mengedit data penjaga di database menggunakan Prepared Statement
$stmt = $conn->prepare("UPDATE nama_penjaga SET nama_penjaga=?, no_hp=?, jenis_kelamin=?, jadwal_kerja=? WHERE no=?");
$stmt->bind_param("ssssi", $nama_penjaga, $no_hp, $jenis_kelamin, $jadwal_kerja, $no);
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
                text: 'Data penjaga berhasil diperbarui!',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location.href = 'daftar_penjaga.php';
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
                text: 'Edit data penjaga gagal: " . addslashes($stmt->error) . "',
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
