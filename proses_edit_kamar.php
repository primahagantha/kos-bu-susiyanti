<?php
include 'auth_check.php';
// Sertakan file koneksi.php untuk menghubungkan ke database
include_once "koneksi.php";

// Ambil data dari formulir pengeditan kamar yang dikirim melalui metode POST
$no_kamar = $_POST['no_kamar'];
$lantai = $_POST['lantai'];
$fasilitas = $_POST['fasilitas'];
$harga_sewa = $_POST['harga_sewa'];

// Lakukan query UPDATE untuk mengedit data kamar di database menggunakan Prepared Statement
$stmt = $conn->prepare("UPDATE daftar_kamar SET lantai=?, fasilitas=?, harga_sewa=? WHERE no_kamar=?");
$stmt->bind_param("isss", $lantai, $fasilitas, $harga_sewa, $no_kamar);
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
                text: 'Data kamar berhasil diperbarui!',
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
                text: 'Edit data kamar gagal: " . addslashes($stmt->error) . "',
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
